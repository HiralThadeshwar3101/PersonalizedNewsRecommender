<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='../css/w3.css' />
<link rel="stylesheet" href='../css/header.css' />
</head>
<body>
 <?php 
 include('session.php');
 $menu="";
 $user='';
 $logout='';
 $login='';
 if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='Admin')
 {
	 $menu='<a class="w3-btn w3-yellow" href="admin_index.php">Home</a>';
	 $user='<a class="w3-btn w3-orange">'.$_SESSION["fullname"].'</a>';
	 $logout='<a class="w3-btn w3-green" href="logout.php">Log Out</a>';
 }
 else if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='User')
 {
	 $menu='<a class="w3-btn w3-yellow" href="user_index.php">Home</a>';
	 $user='<a class="w3-btn w3-orange">'.$_SESSION["fullname"].'</a>';
	 $menu.='<a class="w3-btn w3-red" href="news_rssfeed.php">RSS Feed</a>';
	 $menu.='<a class="w3-btn w3-purple" href="user_shared.php">Shared News</a>';
	 $logout='<a class="w3-btn w3-green" href="logout.php">Log Out</a>'; 
 }
 else
 {
	$menu='<a class="w3-btn w3-yellow" href="user_index.php">Home</a>';
	$login='<a class="w3-btn w3-red" href="login.php">Log In</a>';
 }

 ?>
<div class="main">
  <div class="main_submenu">
    <img src="../images/news_icon.png" width="200" height="100"/>
  </div>
  <div class="main_submenu" style="margin-top:50px;">
	
	<div class="w3-btn-group">
	<?php echo $user; ?> 
	 <?php echo $menu; ?> 
	  <a class="w3-btn w3-teal" href="contact.php">Contact</a>
	  <?php echo $logout; ?>
	  <?php echo $login; ?>
	</div>
  </div>
 </div>
 
<?php
	include('header_manager.php');
	$message='';
	if(isset($_SESSION["user_type"]))
	{
		if($_SESSION["user_type"]=="User"){
			//echo "Session  ".$_SESSION["userid"];
			$message=getTopLastesNewMessages($_SESSION["userid"]);
		}
	}
	
	if($message=='')
	{
		
	}
	else
	{
		echo '<div id="snackbar">'.$message.'</div>';
		echo "<script></script>";
	
?> 



<script>
 
myFunction();
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
	<?php } ?>