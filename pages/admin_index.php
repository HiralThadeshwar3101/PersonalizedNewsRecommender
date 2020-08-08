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
include('session_admin.php');
?>
<nav class="w3-sidenav w3-light-grey w3-card-2" style="width:130px">
  <div class="w3-container">
    <h5>Latest News </h5>
  </div>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'London')">Top Stories</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Paris')">Technology</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Entertainment</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Sports</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Business</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Science</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Health</a>
</nav>
<div style="margin-left:130px">
<div style="margin-left:20px;padding-bottom:15px;">
<a href='admin_addnews.php' class="w3-btn w3-red w3-text-shadow"><b>+ Add News</b></a> 
</div>
<?php

$select_news_query="SELECT * FROM news_details";
$select_news_result=mysql_query($select_news_query);
$select_news_rows=mysql_num_rows($select_news_result);
for($k=0;$k<$select_news_rows;$k++)
{
	$news_detailid=mysql_result($select_news_result,$k,'news_detailid');
	$title=mysql_result($select_news_result,$k,'news_title');
	$news_source=mysql_result($select_news_result,$k,'news_source');
	$short_details=mysql_result($select_news_result,$k,'news_details');
	$image_loc1=mysql_result($select_news_result,$k,'image_name');
	$short_details=get_words($short_details,40);
	show_SingleNews($title,$news_source,$short_details,$image_loc1,$news_detailid,"admin_detailview.php");
}
?>

</div>