<html>
<head>

</head>
<body>
<?php
include('header.php');
include('web_functions.php');
include('user_functions.php');
include('dropdowns.php');

$request_page='All';
$where_clause='';
 
if(isset($_REQUEST["request_page"]))
{
	$request_page=$_REQUEST["request_page"];
	$where_clause=" WHERE news_type='".$request_page."' ";
}
$options='';
foreach($news_category as $item)
{ 
	if($request_page==$item)
	{
		$options.='<a href="news_rssfeed.php?request_page='.$item.'" class="tablink w3-red" >'.$item.'</a>';
	}
	else
	{
		$options.='<a href="news_rssfeed.php?request_page='.$item.'" class="tablink" >'.$item.'</a>';
	}
}	
?>

<nav class="w3-sidenav w3-light-grey w3-card-2" style="width:130px">
  <div class="w3-container">
    <h5>RSS Feed News </h5>
  </div>
	<!--<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Paris')">Technology</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Entertainment</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Sports</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Business</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Science</a>
	<a hef="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Health</a>-->
	 
	<?php echo $options; ?>
</nav>

<div style="position:relative;left:10%;width:70%;background:white;">
<?php
$request_page='';
 
if(isset($_REQUEST["request_page"]))
{
	$request_page=$_REQUEST["request_page"];
 
}
 
		 if($request_page=="Technology")
		 {
			 echo '<iframe src="http://www.gadgetsnow.com/tech-news" height="550" width="950"></iframe> ';
		 }		
		 else if($request_page=="Sports")
		 {
			  echo '<iframe src="http://www.espncricinfo.com" height="550" width="950"></iframe> ';
		 }
		  else if($request_page=="Business")
		 {
			  echo '<iframe src="http://www.business-standard.com/" height="550" width="950"></iframe> ';
		 }
		  else if($request_page=="Entertainment")
		 {
			  echo '<iframe src="http://news.sky.com/entertainment" height="550" width="950"></iframe> ';
		 }
		  else if($request_page=="Science")
		 {
			  echo '<iframe src="https://www.sciencenews.org/" height="550" width="950"></iframe> ';
		 }
		  else if($request_page=="Health")
		 {
			  echo '<iframe src="http://www.webmd.com/news/" height="550" width="950"></iframe> ';
		 }
		 
		
		
?>
</div>
<!--
<iframe src="http://www.espncricinfo.com" height="800" width="500"></iframe> 


 -->
</body>


</html>