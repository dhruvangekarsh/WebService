<form method="post" enctype="multipart/form-data" name="formUploadFile">		
	<label>Select single file to upload:</label>
	<input type="file" name="files[]" multiple="multiple" />
	<input type="submit" value="Upload File" name="btnSubmit"/>
</form>
<?php
if(isset($_POST["btnSubmit"]))
{
	
	if($_FILES["file"]["error"] == UPLOAD_ERR_NO_FILE){
		echo "Please, Select the file to upload!!!";
	}
	else{
		move_uploaded_file($_FILES["file"]["tmp_name"], "UploadFolder/".$_FILES["file"]["name"]);
		echo "File uploaded successfully!!!";
	}

	
	foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
		$temp = $_FILES["files"]["tmp_name"][$key];
		$name = $_FILES["files"]["name"][$key];
		 
		if(empty($temp))
		{
			break;
		}
		 
		move_uploaded_file($temp,"files/".$name);
	}
	
	
}
?>
