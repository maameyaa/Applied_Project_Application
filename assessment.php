<?php
/**
*Adapted from Aelaf Dafla's Webtech Course Resource
*/
include_once("adb.php");

/**
*Assessment  class
*/
class assessment extends adb{

	/**
	*constructor
	*/
	function __construct(){
	}

	/**
	*gets lesson records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function createassessment($coach_id, $teacher_id, $lesson_id, $lang){
		$strQuery="INSERT into  assessment SET
						coach_id = '$coach_id',
						teacher_id = '$teacher_id',
						lesson_id = '$lesson_id',
						lang = '$lang'";

						return $this->query($strQuery);

	}

    function getassessment($filter=false){

		$strQuery="SELECT * FROM  assessment";
		
		if($filter){
			$strQuery=$strQuery . " where $filter";
			
		}
		
		return $this->query($strQuery);
	}
    
    
	function getquestions($filter=false){

		$strQuery="SELECT * FROM  question";
		
		if($filter){
			$strQuery=$strQuery . " where $filter";
			
		}
		
		return $this->query($strQuery);
	}

	function searchquestions($lang=false, $section=false){
		$filter=false;
		
		if($text){
			$filter = " language like '%$lang%' and section like '%$section%'";
		}
		
		return $this->getquestions($filter);
	}

	function getanswers($filter=false){

		$strQuery="SELECT * FROM  answers";
		
		if($filter){
			$strQuery=$strQuery . " where $filter";
			
		}
		
		return $this->query($strQuery);
	}

	function searchanswers($text=false){
		$filter=false;
		
		if($text){
			$filter = " assessment_id like '%$text%'";
		}
		
		return $this->getanswers($filter);
	}

	

	function addanswers($assessment_id, $question_id, $answer ){
		$strQuery="INSERT into  answers SET
						assessment_id = $assessment_id,
						question_id = $question_id,
						answer = $answer";

						return $this->query($strQuery);

	}

	function getTLMS (){

		$strQuery="SELECT * FROM  uploads";

		return $this->query($strQuery);

	}
}