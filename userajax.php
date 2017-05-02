<?php

/**
*Maame Yaa Afriyie Poku
*Ajax php for the users class
*/  

session_start();

	if(!isset($_REQUEST['cmd'])){

	  echo "Command not provided";
	  exit();

	}

	$cmd=$_REQUEST['cmd'];

	switch($cmd){

		case 1: 
		login();
		break;

		case 2:
		searchTeachers();
		break;

		case 3:
		searchCoaches();
		break;
	}

/**
*This function calls the user's class check if the user exist in the database
*/
	function login(){

		 include_once("users.php");
		 $obj=new users();

		 if(!isset($_REQUEST['username'])||!isset($_REQUEST['password'])){

		 	echo '{"result":0,"message":"Please provide username and password"}';

		 	return;
		 }


	  	$username	=$_REQUEST["username"];
	  	$password=$_REQUEST["password"];

	  	$row=$obj->login($username,$password);
	  	$results=$obj->fetch();

	  	if(!$results){
	  		echo '{"result":0,"message":"Wrong username or password"}';
	  		return;
	  	}

	  else{
	  		echo '{"result":1,"message":"log in complete"}';
	  }
	}


/**
*This function calls the user's class check if the username exist in the database
*/

	function searchTeachers(){

		 include_once("users.php");
		 $obj=new users();

		 if(!isset($_REQUEST['first_name'])){

		 	echo '{"result":0,"message":"Please provide first name and last name"}';

		 	return;
		 }


	  	$username	=$_REQUEST["first_name"];
	  	//$last_name=$_REQUEST["last_name"];

	  	$row=$obj->searchTeachers($username);
	  	$results=$obj->fetch();


	  	if(!$results){
	  		echo '{"result":0,"message":"Cannot find teacher"}';
	  		return;
	  	}

	  else{
	  		
	  		$_SESSION["teacher_id"] = $results['user_id'];


	  		echo '{"result":1,"message":"Teacher found"}';
	  }
	}

/**
*This function calls the user's class check if the username exist in the database
*/

	function searchCoaches(){

		 include_once("users.php");
		 $obj=new users();

		 if(!isset($_REQUEST['first_name'])){

		 	echo '{"result":0,"message":"Please provide first name and last name"}';

		 	return;
		 }


	  	$username	=$_REQUEST["first_name"];
	  	//$last_name=$_REQUEST["last_name"];

	  	$row=$obj->searchTeachers($username);
	  	$results=$obj->fetch();


	  	if(!$results){
	  		echo '{"result":0,"message":"Cannot find coach"}';
	  		return;
	  	}

	  else{
	  		
	  		$_SESSION["coach_id"] = $results['user_id'];


	  		echo '{"result":1,"message":"Coach found"}';
	  }
	}




	function signup(){

	/*	include_once("users.php");
		$obj=new user();

		if (empty($_REQUEST['fname'])||empty($_REQUEST['lname']) || empty($_REQUEST['username']) || empty($_REQUEST['tel']) ||empty($_REQUEST['password'])){
	        echo'{"result":0,"message":"Please provide all sign up details"}';
	  		return;
	  	}

	  	else{
	  		$username	=$_REQUEST["username"];
   			$row=$obj->checkUsername($username);
   			$results=$obj->fetch();

   			if ($results){
   				echo '{"result":0,"message":"Error! Username already exist!"}';
   			}

   			else(){

   			}



	  	}*/


	}


?>