<?php

/**
*Maame Yaa Afriyie Poku
*/

/**
*This is an ajax page for all the functions required for viewing  and add the assessment
*/

	if(!isset($_REQUEST['cmd'])){

	  echo "Command not provided";
	  exit();

	}

	$cmd=$_REQUEST['cmd'];

	switch($cmd){

		case 1: 
		createAssessment();
		break;

		case 2: 
		searchQuestions();
		break;

		case 3: 
		searchAnswers();
		break;

		case 4: 
		addAnswers();
		break;
	}

function createAssessment(){

		include_once("assessment.php");
		 $obj=new assessment();

		 if(!isset($_REQUEST['coach_id'])||!isset($_REQUEST['teacher_id']) ||!isset($_REQUEST['lesson_id'])){

		 	echo '{"result":0,"message":""}';

		 	return;
		 }


	  	$coach_id=$_REQUEST["coach_id"];
	  	$teacher_id=$_REQUEST["teacher_id"];
	  	$lesson_id=$_REQUEST["lesson_id"];


	  	$row=$obj->createassessment($coach_id,$teacher_id, $lesson_id);

	  	// $results=$obj->fetch();

	  	if(!$row){
	  		echo '{"result":0,"message":"Error creating assesment"}';
	  		return;
	  	}

	  else{
	  		echo '{"result":1,"message":"Assessment created"}';
	  	}
	}

function searchQuestions(){

		include_once("assessment.php");
		 $obj=new assessment();

		 if(!isset($_REQUEST['lang'])||!isset($_REQUEST['section'])){

		 	echo '{"result":0,"message":"Section or language not provided"}';

		 	return;
		 }


	  	$lang=$_REQUEST["lang"];
	  	$section=$_REQUEST["section"];

	  	$row=$obj->searchquestions($lang,$section);

	  	$results=$obj->fetch();

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new assessment();
            $obj= $new->searchquestions($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  		//print_r($array)
	}

	function searchAnswers(){

		include_once("assessment.php");
		 $obj=new assessment();

		 if(!isset($_REQUEST['assessment_id'])){

		 	echo '{"result":0,"message":"Assessment id not provided"}';

		 	return;
		 }


	  	$assessment_id=$_REQUEST["assessment_id"];
	  

	  	$row=$obj->searchanswers($lang,$section);

	  	$results=$obj->fetch();

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new assessment();
            $obj= $new->searchanswers($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  		//print_r($array)
	}