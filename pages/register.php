<?php
include('header.php');
//include('web_functions.php');
//echo getTableIncrementValue("users");
include('dropdowns.php');

$options='';
foreach($news_category as $item)
{ 
$options.="<option>".$item."</option>";
}	
?>


<div style="margin-left:130px">
	<div style="position:relative;left:50px;top:100px;width:60%;background:white;">
		<ul class="w3-navbar w3-light-gray">
		  <li id='user_tab'><a href="javascript:void(0)" onclick="openLogin('User')"><h2 >User</h2></a></li>
		 <!-- <li  id='admin_tab'><a href="javascript:void(0)" onclick="openLogin('Admin')"><h2>Admin</h2></a></li>-->
		</ul>
	 
		<form class="w3-container w3-card-2" action="save_data.php">
		  <p>
		  <label class="w3-label w3-text-blue">Username</label>
		  <input class="w3-input w3-animate-input" name="username" style="width:30%" type="text" required></p>
		  <p>
		  <label class="w3-label w3-text-blue">Password</label>
		  <input class="w3-input w3-animate-input"  name="password" style="width:30%" type="password" required></p>
		   <p>
		  <label class="w3-label w3-text-blue">Full Name</label>
		  <input class="w3-input w3-animate-input" name="fullname" style="width:30%" type="text"></p>
		 <p>
			<input class="w3-radio" type="radio" name="gender" value="male" checked>
			<label class="w3-validate">Male</label>

			<input class="w3-radio" type="radio" name="gender" value="female">
			<label class="w3-validate">Female</label> 
		  </p>


		  <p>
		   <p>
		  <label  class="w3-label w3-text-blue">Email</label>
		  <input class="w3-input w3-animate-input" name="email" style="width:30%" type="email" required></p>
		  <p>
		  <label  class="w3-label w3-text-blue">Mobile</label>
		  <input class="w3-input w3-animate-input" name="number" style="width:30%" type="text" required></p>
			<p>
				<select class="w3-select" name="option" id="option">
				  <option value="" disabled selected>Choose your favourite news</option>
				  <?php echo $options; ?>
				</select>
			</p>
		  
		  <p>
		  <button class="w3-btn w3-blue">Register</button>
		  </p>
		  <input type='hidden' name='logic' id='logic' value='User' />
		  <input type='hidden' name='page' id='page' value='user_register' />
		</form>
	</div>
</div>

<script src="../js/jquery.min.js" ></script>
<script>
openLogin('User');
function openLogin(select)
{
	//alert(select);
	document.getElementById('logic').value=select;
	if(select=='User')
	{
		$("#user_tab").addClass("w3-blue");
		$("#admin_tab").removeClass("w3-blue");
	}
	else
	{
		$("#user_tab").removeClass("w3-blue");
		$("#admin_tab").addClass("w3-blue");
	}
}
</script>
</body>
</html>