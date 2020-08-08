<?php
 
if(isset($_SESSION["userid"]))
{
	//echo "<script>alert('hello');</script>";
}
else
{//echo "<script>alert('hello');</script>";
	header('Location: ../session_out.html');
}

?>