<?php
include("../config.php");
include('../pages/web_functions.php');
	$id=getTableIncrementValue("users","userid");
	$email=mysql_real_escape_string($_REQUEST["email"]);
	$username=mysql_real_escape_string($_REQUEST["username"]);
	$password=mysql_real_escape_string($_REQUEST["password"]);
	$fullname=mysql_real_escape_string($_REQUEST["fullname"]);
	$mobile=mysql_real_escape_string($_REQUEST["mobile"]);
	$gender=mysql_real_escape_string($_REQUEST["gender"]);
	$favourite_news=mysql_real_escape_string($_REQUEST["option"]);
	$user_type="User";
	
	$insert_query="INSERT INTO users
	(email,username,password,fullname,mobile,gender,favourite_news,user_type,userid) 
	 VALUES('".$email."','".$username."','".$password."','".$fullname."'
	,'".$mobile."','".$gender."','".$favourite_news."','".$user_type."','".$id."')";
	//echo $insert_query;exit;
	$insert_result=mysql_query($insert_query);
	if($insert_result)
	{
			
			echo "Added";
	}
	else
	{//echo $insert_query;exit;
			echo "Error ".mysql_error();

	}
	
?>