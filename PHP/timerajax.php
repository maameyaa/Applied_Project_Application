<?php
	if(!isset($_REQUEST['cmd'])){

	  echo "Command not provided";
	  exit();

	}

	$cmd=$_REQUEST['cmd'];

	switch($cmd){

		case 1:
		gettime();
		break;

	}

	function gettime(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}


		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getTime($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getTime($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  		//print_r($array)
	  	}
	}


?>