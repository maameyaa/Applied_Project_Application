<?php

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
		signup();
		break;
	}

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