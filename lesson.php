<?php
/**
*Maame Yaa Afriyie Poku
*/
include_once("adb.php");

/**
*Lesson  class
*/
class lessons extends adb{

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
	function getlessons($filter=false){

		$strQuery="SELECT * FROM  lessons";
		
		if($filter){
			$strQuery=$strQuery . " where $filter";
			
		}
		
		return $this->query($strQuery);
	}

	
	/**
	*Searches for lesson by week, day
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function searchLessons($text1=false,$text2=false,$text3=false ){
		$filter=false;
		
		if($text1=='English'){
			$filter = "  language = 'English' AND week = '$text2' and day = '$text3'";
		}
		elseif ($text1=='Twi') {
			$filter = "  language = 'Twi' AND week = '$text2' and day = '$text3'";
		}
		
		return $this->getlessons($filter);
	}

	function getLessonsByLang($text1=false){
		$filter=false;
		
		if($text1=='English'){
			$filter = "  language = 'English'";
		}
		elseif ($text1=='Twi') {
			$filter = "  language = 'Twi'";
		}
		
		return $this->getlessons($filter);
	}

	function getWeekDay($id){
		$strQuery="SELECT * from lessons where lesson_id = '$id'";
		return $this->query($strQuery);
	}

	function getObjectives($id){
		$strQuery="SELECT * from objectives where objectives.lesson_id ='$id'";
		return $this->query($strQuery);
	}

	function getLessonPrep($id){
		$strQuery="SELECT lesson_prep.text from lesson_prep where lesson_prep.lesson_id ='$id'";
		return $this->query($strQuery);
	}
	function getLcbd($id){
		$strQuery="SELECT * from lcbd where lcbd.lesson_id ='$id'";
		return $this->query($strQuery);
	}

	function getRevision($id){
		$strQuery="SELECT * from revision where revision.lesson_id ='$id'";
		return $this->query($strQuery);
	}

	function getPA($id){
		$strQuery="SELECT * from phonemic_a where phonemic_a.lesson_id ='$id'";
		return $this->query($strQuery);
	}


	function getvocabAudio($id){
		$strQuery="SELECT * from vocabulary where vocabulary.lesson_id ='$id'";
		return $this->query($strQuery);
	}

	function getsightWords($id){
		$strQuery="SELECT * from sight_words where sight_words.lesson_id ='$id'";
		return $this->query($strQuery);
	}

	function getPhonics($id){
		$strQuery="SELECT * from phonics where phonics.lesson_id ='$id'";
		return $this->query($strQuery);
	}

	function getReadingComp($id){
		$strQuery="SELECT * from reading_comp where reading_comp.lesson_id ='$id'";
		return $this->query($strQuery);
	}

	function getFluency($id){
		$strQuery="SELECT * from fluency where fluency.lesson_id ='$id'";
		return $this->query($strQuery);
	}

	function getvocablesson($id){
		$strQuery="SELECT * from vocabulary_lesson where vocabulary_lesson.lesson_id ='$id'";
		return $this->query($strQuery);
	}

	function getComprehension($id){
		$strQuery="SELECT * from comprehension where comprehension.lesson_id ='$id'";
		return $this->query($strQuery);
	}

	function getWriting($id){
		$strQuery="SELECT * from writing where writing.lesson_id ='$id'";
		return $this->query($strQuery);
	}
	function getlookingAhead($id){
		$strQuery="SELECT * from looking_ahead where looking_ahead.lesson_id ='$id'";
		return $this->query($strQuery);
	}

	function getTime($id){
		$strQuery="SELECT * from timer where timer.lesson_id ='$id'";
		return $this->query($strQuery);
	}




}
?>