<?php

/**
*Adapted from Aelaf Dafla's Webtech Course Resource
*/
include_once("adb.php");

/**
*upload  class
*/
class uploads extends adb{

	/**
	*constructor
	*/
	function __construct(){
	}


/**
	*gets teaching and learning materials photos
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/

	function getTLMS (){

			$strQuery="SELECT * FROM  uploads";
			

			return $this->query($strQuery);

		}

	/**
	*uploads teaching and learning materials photos to the database
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/

	function uploadfile($uploadname, $week,$day,$image){

		$strQuery= "INSERT into  uploads SET
						uploadname = '$uploadname',
						week = '$week',
						day = '$day',
						image = '$image'";

						return $this->query($strQuery);

	}
}

?>