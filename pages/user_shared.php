<html>
 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='../css/w3.css' />
<link rel="stylesheet" href='../css/user_index.css' />
<title>Welcome to Personalized News </title>


</head>


<body>
<?php 
include('header.php');
include('web_functions.php');
include('user_functions.php');
include('dropdowns.php');

$userid=$_SESSION["userid"];
$request_page='All';
$where_clause='';
if(isset($_SESSION['favourite_news']))
{
	$request_page=$_SESSION['favourite_news'];
	$where_clause=" WHERE news_type='".$request_page."' ";
}
if(isset($_REQUEST["request_page"]))
{
	$request_page=$_REQUEST["request_page"];
	$where_clause=" WHERE news_type='".$request_page."' ";
}
$options='';
foreach($news_menu as $item)
{ 
	if($request_page==$item)
	{
		$options.='<a href="user_index.php?request_page='.$item.'" class="tablink w3-red" >'.$item.'</a>';
	}
	else
	{
		$options.='<a href="user_index.php?request_page='.$item.'" class="tablink" >'.$item.'</a>';
	}
}	
?>
<!--<nav class="w3-sidenav w3-light-grey w3-card-2" style="width:130px">
  <div class="w3-container">
    <h5>Latest News </h5>
  </div>
	<!--<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Paris')">Technology</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Entertainment</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Sports</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Business</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Science</a>
	<a hef="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Health</a>-->
	 
	<?php //echo $options; ?>
<!--</nav>-->



<div style="margin-left:130px">

	 <?php

		 $select_query="SELECT * FROM share 
						INNER JOIN users ON users.userid=share.share_by
						WHERE share_with='".$userid."'";
		//echo $select_query;
		$table='';
		$select_result = mysql_query($select_query);
		$select_rows =mysql_num_rows($select_result);
		for($k=0;$k<$select_rows;$k++)
		{
		 
		  $share_by=mysql_result($select_result,$k,"share_by");
		  $share_with=mysql_result($select_result,$k,"share_with");
		  $news_id=mysql_result($select_result,$k,"news_id");
		  $fullname=mysql_result($select_result,$k,"fullname");

		  echo '<div class="stories">
			<div class="w3-panel w3-pale-green w3-leftbar w3-border-green">
			  <p>Shared By '.$fullname.'</p>
			</div> 
			</div>';
		   
			show_SingleNews2($news_id,"user_detailview.php");
		} 

	
?>
</div>



<script>
</script>

</body>
</html>