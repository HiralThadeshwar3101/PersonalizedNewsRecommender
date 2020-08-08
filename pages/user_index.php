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
<nav class="w3-sidenav w3-light-grey w3-card-2" style="width:130px">
  <div class="w3-container">
    <h5>Latest News </h5>
  </div>
	<!--<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Paris')">Technology</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Entertainment</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Sports</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Business</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Science</a>
	<a hef="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Health</a>-->
	 
	<?php echo $options; ?>
</nav>



<div style="margin-left:130px">

	 <?php

	 if(isset($_SESSION['favourite_news']))
	{
		//$historyid=getTableIncrementValue("user_click_history","historyid");
		$userid=$_SESSION['userid'];
		show_Recommended($userid);
	
	}
	 
	 
	if($request_page!='All')
	{
		echo '<div class="stories">
			<div class="w3-panel w3-pale-green w3-leftbar w3-border-green">
			  <p>'.$request_page.'</p>
			</div> 
			</div>';
		$select_news_query="SELECT * FROM news_details ".$where_clause;
		//echo $select_news_query;
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
			show_SingleNews($title,$news_source,$short_details,$image_loc1,$news_detailid,"user_detailview.php");
		}
	}
	else
	{
		foreach($news_category as $item)
		{
				show_IndivisualNew($item," WHERE news_type='".$item."'");
		}			
	}


	
?>
</div>



<script>
</script>

</body>
</html>