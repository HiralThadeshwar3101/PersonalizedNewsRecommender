<?php
include("web_functions.php");
include("session.php");

$username=mysql_real_escape_string($_REQUEST["username"]);
$password=mysql_real_escape_string($_REQUEST["password"]);

$query="";
 
 
$query="SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
 

	$query_result=mysql_query($query);
	$query_row=mysql_num_rows($query_result);
	
	if($query_row==1)
	{
		
				$_SESSION['userid'] = mysql_result($query_result,0,'userid');
				//echo $_SESSION['userid'];
				//exit;
				$_SESSION['favourite_news']=mysql_result($query_result,0,'favourite_news');
				$_SESSION['fullname']=mysql_result($query_result,0,'fullname');
				$_SESSION['user_type']=mysql_result($query_result,0,'user_type');
				if($_SESSION['user_type']=='Admin')
				{
					header('Location: admin_index.php');
				}
				else
				{
						header('Location: user_index.php');
				}
	}
	else  
	{
				header('Location: login.php?error=Invalid password and username');
	}

?>