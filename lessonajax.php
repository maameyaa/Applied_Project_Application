<?php

	if(!isset($_REQUEST['cmd'])){

	  echo "Command not provided";
	  exit();

	}

	$cmd=$_REQUEST['cmd'];

	switch($cmd){

		case 1: 
		search();
		break;

		case 2:
		getlessons();
		break;

		case 3:
		searchlessons();
		break;

		case 4:
		getWeekDay();
		break;

		case 5:
		getObjectives();
		break;

		case 6:
		getLessonPrep();
		break;

		case 7:
		getRevision();
		break;

		case 8:
		getPA();
		break;

		case 9:
		getvocabAudio();
		break;


	}

	function search(){

		include_once("lesson.php");
		 $obj=new lessons();

		 if(!isset($_REQUEST['week'])||!isset($_REQUEST['day'])){

		 	echo '{"result":0,"message":"Please provide a day and a week"}';

		 	return;
		 }


	  	$week	=$_REQUEST["week"];
	  	$day=$_REQUEST["day"];

	  	$row=$obj->searchLessons($week,$day);
	  	$results=$obj->fetch();

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid Week or Day"}';
	  		return;
	  	}

	  else{
	  		echo '{"result":1,"message":"Lesson found"}';
	  	}
	}

	function getlessons(){
		include_once("lesson.php");
		$obj = new lessons();

		if(!isset($_REQUEST['lang'])){
			echo "lang not provided";

		}

		$lang = $_REQUEST["lang"];
		// $week	=$_REQUEST["week"];
	 //  	$day=$_REQUEST["day"];

	  	$row=$obj->getLessonsByLang($lang);
	  	$results=$obj->fetch();

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid Lang"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getLessonsByLang($lang);
	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function searchlessons(){
		include_once("lesson.php");
		$obj = new lessons();

		if(!isset($_REQUEST['lang'])||!isset($_REQUEST['week'])||!isset($_REQUEST['day'])){

		}

		$lang = $_REQUEST["lang"];
		$week	=$_REQUEST["week"];
	  	$day=$_REQUEST["day"];

	  	$row=$obj->searchLessons($lang,$week,$day);
	  	$results=$obj->fetch();

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid Week or Day"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->searchLessons($lang,$week,$day);
	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function getWeekDay(){

		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){

			echo 'check link';
			return;

		}

		$lesson_id=$_REQUEST["lid"];

	  	$row=$obj->getWeekDay($lesson_id);

	  	$results=$obj->fetch();
	  	// print_r($results);

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  else{
	  		 echo json_encode($results);
	  	}
	}

	function getObjectives(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getObjectives($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getObjectives($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function getLessonPrep(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getLessonPrep($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getLessonPrep($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function getRevision(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getRevision($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getRevision($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function getPA(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getPA($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getPA($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function getvocabAudio(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getvocabAudio($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getvocabAudio($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}



?>