
<?php
include('header.php');
//include('web_functions.php');
//echo getTableIncrementValue("users");

if(isset($_REQUEST["error"]))
{
?>

<div class="w3-panel w3-red">
  <h3>Message</h3>
  <p><?php echo $_REQUEST["error"]; ?></p>
</div>  
<?php
}
?>
<div style="margin-left:130px">
	<div style="position:relative;left:50px;top:100px;width:60%;background:white;">
		<ul class="w3-navbar w3-light-gray">
		  <li class=" w3-blue"><a href="javascript:void(0)" onclick="openLogin('London')"><h2 >Login</h2></a></li>
		</ul>
	 
		<form class="w3-container w3-card-2" method="post" action="validate_users.php" >
		  <p>
		  <label class="w3-label w3-text-blue">Username</label>
		  <input class="w3-input" name="username" type="text"></p>
		  <p>
		  <label class="w3-label w3-text-blue">Password</label>
		  <input class="w3-input" name="password" type="password"></p>
		  <p>
		  
		  <button class="w3-btn w3-blue">Login</button>
		  <a href="register.php" class="w3-btn w3-red">Register</a>
		  </p>
		</form>
	</div>
</div>

<script>
</script>
</body>
</html>