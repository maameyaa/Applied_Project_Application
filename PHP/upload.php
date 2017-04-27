<?php
if(is_array($_FILES)) {
	if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {

		$sourcePath = $_FILES['userImage']['tmp_name'];
		$targetPath = "tlms/".$_FILES['userImage']['name'];
		$filename = $_REQUEST['filename'];
		$week = $_REQUEST['week'];
		$day = $_REQUEST['day'];

		if(move_uploaded_file($sourcePath,$targetPath)) {
			?>
			<img class="image-preview" src="<?php echo $targetPath; ?>" class="upload-preview" />
			<?php

			echo($filename);

			include_once ("uploads.php");
			$obj=new uploads();

			$row=$obj->uploadfile($filename,$week,$day,$targetPath);

			if(!$row){
	  		echo '{"result":0,"message":"Error uploaded"}';
	  		return;
			  	}

			  else{
			  		echo ' Uploaded';
			  	}







		}
	}
}
?>