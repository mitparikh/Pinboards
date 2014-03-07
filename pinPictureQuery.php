

<html>
	<body>
<?php

if(!isset($_FILES['userfile']))
{
    echo '<p>Please select a file</p>';
}
else
{
    try {
    $msg= upload();  //this will upload your image
    echo $msg;  //Message showing success or failure.
    }
    catch(Exception $e) {
    echo $e->getMessage();
    echo 'Sorry, could not upload file';
    }
}

// the upload function

function upload() {
	
	$tags = $_POST['pictureTags'];
	if(isset($_POST['pictureUrl']))
	{
			$url = $_POST['pictureUrl'];
	}
	else {
		$url = "";
	}
	
	
    //include "file_constants.php";
    $maxsize = 100000000; //set to approx 10 MB

    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    

            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {  
  
               //checks whether uploaded file is of image type
              //if(strpos(mime_content_type($_FILES['pictureUpload']['tmp_name']),"image")===0) {
                // $finfo = finfo_open(FILEINFO_MIME_TYPE);
                //if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    

                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));

                    // put the image in the db...
                    // database connection
                    
                    
                    
                    $con = mysqli_connect("localhost","root","","pinboards");
					//echo "connected";
				
					if (mysqli_connect_errno($con))
				  	{
				  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  					}
                    
                    //mysql_connect($host, $user, $pass) OR DIE (mysql_error());

                    // select the db
                    //mysql_select_db ($db) OR DIE ("Unable to select db".mysql_error());

                    // our sql query
                    $query = "INSERT INTO pictures
                    (imagedata,weburl,numoflikes,tags)
                    VALUES
                    ('$imgData','$url','0','$tags');";
					
					$result = mysqli_query($con, $query);
                    echo " Picture upload QUery ran";
                    // insert the image
                    //mysql_query($sql) or die("Error in Query: " . mysql_error());
                    //$msg='<p>Image successfully saved in database with id ='. mysqli_insert_id($con).' </p>';
                    $newPictureId = mysqli_insert_id($con);
					$msg = pinPicture($newPictureId);
                    
						                
                
                }
                //else
                  //  $msg="<p>Uploaded file is not an image.</p>";
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";

	return $msg;    
	}
    //else {
      //  $msg= file_upload_error_message($_FILES['userfile']['error']);
    //}
    
//}

// Function to return error message based on error code

function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}



function pinPicture($newPictureId){
	
	session_start();
	$username = $_SESSION['username'];
	$boardname = $_POST['boardSelect'];
	//echo $boardname;
	
	$con_new = mysqli_connect("localhost","root","","pinboards");
	//echo "connected";
	if (mysqli_connect_errno($con_new))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	
	$query_to_get_board_id = "select boardid from boards where boardname = '$boardname' and uname = '$username';";
	
	$result_new = mysqli_query($con_new, $query_to_get_board_id);
	//echo $result_new;
	//echo "after query";
	
	while($row_new = mysqli_fetch_assoc($result_new)){
		$boardid = $row_new['boardid'];
		//echo "\n";
		//echo $temp_result;
	}
	
	$time = time();
	$pinQuery = "INSERT INTO pin
                   (pid,uname,boardid)
                    VALUES
                    ('$newPictureId','$username','$boardid');";
	$result_pin = mysqli_query($con_new, $pinQuery);
  
  	echo "\n";
	if (!$result_pin)
  	{
  	die('Error: ' . mysqli_error($con_new));
  	}
	else {
		//echo "insert successfull";
		header("location:myPins.php");
	}
	
}

?>

</body>
</html>