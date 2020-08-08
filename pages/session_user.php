<?php

if($_SESSION['usertype']=="Normal")
{
	
}
else
{
		header('Location: ../session_out.html');
}

?>