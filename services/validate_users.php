<?php
include("../config.php");
$username=mysql_real_escape_string($_REQUEST["username"]);
$password=mysql_real_escape_string($_REQUEST["password"]);

$query="";
 
 
	$query="SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
 

	$query_result=mysql_query($query);
	$query_row=mysql_num_rows($query_result);
	
	if($query_row==1)
	{ 
			echo mysql_result($query_result,0,'userid')."|".mysql_result($query_result,0,'user_type');
	}
	else  
	{
			echo "No";
	}

?>