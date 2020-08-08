<?php

//echo $_SESSION['usertype'];
//exit; 
if($_SESSION['user_type']=="Admin")
{
	
}
else
{
		header('Location: session_out.html');
}

?>