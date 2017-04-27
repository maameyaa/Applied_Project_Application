<?php
if(!isset($_REQUEST['cmd'])){

	  echo "Command not provided";
	  exit();

	}

$cmd=$_REQUEST['cmd'];

	switch($cmd){

		case 1: 
		getTlms();
		break;

		case 2: 
		uploadfile();
		break;
}

function getTlms(){

		include_once("uploads.php");
		 $obj=new uploads();

		 // if(!isset($_REQUEST['assessment_id'])){

		 // 	echo '{"result":0,"message":"Error"}';

		 // 	return;
		 // }


	  	// $assessment_id=$_REQUEST["assessment_id"];
	  

	  	$row=$obj->getTLMS();

	  	$results=$obj->fetch();

	  	if(!$results){
	  		echo '{"result":0,"message":"No uploads"}';
	  		return;
	  	}

	  	else{
	  		$new = new uploads();
            $obj= $new->getTLMS();

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}	  		

	  		echo json_encode($array);
        
	  		//print_r($array)
	}
}
?>