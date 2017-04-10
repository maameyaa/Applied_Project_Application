<?php

/**
*Maame Yaa Afriyie Poku
*/

/**
*This is an ajax page for all the functions required for viewing the lessons
*/

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

		case 10:
		getvocabLesson();
		break;

		case 11:
		getComprehension();
		break;

		case 12:
		getLA();
		break;

		case 13:
		getLcbd();
		break;

		case 14:
		getSW();
		break;

		case 15:
		getPhonics();
		break;

		case 16:
		getReadingComp();
		break;

		case 17:
		getFluency();
		break;

		case 17:
		getWriting();
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
	  		//print_r($array)
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
	  			// echo $one['text'];
	  		}
	  		echo json_encode($array);
	  		// print_r($array);
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
	  		// print_r($array);
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
	  		// print_r($array);
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

	function getvocabLesson(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getvocablesson($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getvocablesson($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);

	  	}
	}

	function getComprehension(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getComprehension($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getComprehension($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function getLA(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getlookingAhead($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getlookingAhead($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function getLcbd(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getLcbd($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getLcbd($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  		
	  	}
	}

	function getSW(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getsightWords($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getsightWords($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function getPhonics(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getPhonics($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getPhonics($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function getReadingComp(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getReadingComp($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getReadingComp($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function getFluency(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getFluency($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getFluency($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

	function getWriting(){
		include_once("lesson.php");
		$obj = new lessons();


		if(!isset($_REQUEST['lid'])){
			echo 'check link';
			return;
		}
		$lesson_id=$_REQUEST["lid"];

		$row=$obj->getWriting($lesson_id);
	  	$results=$obj->fetch();	

	  	if(!$results){
	  		echo '{"result":0,"message":"Invalid ID"}';
	  		return;
	  	}

	  	else{
	  		$new = new lessons();
            $obj= $new->getWriting($lesson_id);

	  		while($one=$new->fetch()){
	  			$array[] = $one;
	  		}
	  		echo json_encode($array);
	  	}
	}

?>