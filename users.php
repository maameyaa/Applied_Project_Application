<?php
/**
*Maame Yaa Afriyie Poku
*/
include_once("adb.php");

/**
*Users  class
*/
class users extends adb{

	/**
	*constructor
	*/
	function __construct(){
	}
	
	/**
	*Adds a new user
	*@param string username login name
	*@param string password login password
	*@param string firstname first name
	*@param string lastname last name
	*@return boolean returns true if successful or false 
	*/
	function addUser($username,$password='none',$firstname='none',$lastname='none',$school='none',){
		
		$strQuery="INSERT INTO sweb_user SET
					username = '$username',
					password = '$password',
					firstname = '$firstname',
					school = '$school',
					lastname = '$lastname'";
		return $this->query($strQuery);				
	}
	
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/

	function login($username,$password){
		
		$strQuery="Select * from users where user_name = '$username' and user_password = '$password'";

		return $this->query($strQuery);
	}


	function searchTeachers($text1){
		
		$strQuery="Select * from users where user_name = '$text1'";

		return $this->query($strQuery);
	}



	function getUsers($filter=false){

		$strQuery="SELECT * FROM users";
		
		if($filter){
			$strQuery=$strQuery . " where $filter";
		}
		
		return $this->query($strQuery);
	}
	
	/**
	*Searches for user by username, fristname, lastname 
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function searchUsers($text=false){
		$filter=false;
		
		if($text){
			$filter = " username like '%$text%' or firstname like '%$text%' or lastname like '%$text%' ";
		}

		
		
		return $this->getUsers($filter);
	}
	
	/**
	*delete user
	*@param int usercode the user code to be deleted
	*returns true if the user is deleted, else false
	*/
	function deleteUser($usercode){
		$strQuery = "DELETE FROM users WHERE user_id = '$usercode' ";
		
		return $this->query($strQuery);
	}
	
	/**
	*edit user
	*@param int usercode the user code to be updated
	*returns true if the user is updated, else false
	*/
	function editUser($usercode,$username,$firstname,$lastname,$password,$usergroup,$permission,$status){
		$strQuery = "UPDATE users SET
						username = '$username',
						password = '$password',
						firstname = '$firstname',
						lastname = '$lastname',
						usergroup = '$usergroup', 
						status = '$status',
						permission = '$permission' 
						WHERE user_id = '$usercode' ";
		
		return $this->query($strQuery);
	}
	

}
?>