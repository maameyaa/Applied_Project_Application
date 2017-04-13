<?php

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


	function getTLMS (){

			$strQuery="SELECT * FROM  uploads";

			return $this->query($strQuery);

		}

	}

	function uploadfile($uploadname, $week,$day,$image){

		$strQuery= "INSERT into  uploads SET
						uploadname = '$uploadname',
						week = '$week',
						day = '$day',
						image = '$image'";

						return $this->query($strQuery);

	}

?>