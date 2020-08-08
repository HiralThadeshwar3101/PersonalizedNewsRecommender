<html>
 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='../css/w3.css' />
<link rel="stylesheet" href='../css/user_detailview.css' />
<title>Welcome to Personalized News </title>


</head>


<body>
<?php 

include('header.php');
include('web_functions.php');
include('user_functions.php');
include('session.php');
include('dropdowns.php');
$id=$_REQUEST["id"];

$userid=$_SESSION["userid"];
$historyid=getTableIncrementValue("user_click_history","historyid");
saveClickDetails($id,$historyid,$userid);
//echo "<br>User ID : ".$userid;


$select_news_query="SELECT * FROM news_details WHERE news_detailid='".$id."'";
$select_news_result=mysql_query($select_news_query);
$select_news_rows=mysql_num_rows($select_news_result);
	$k=0;

	$news_detailid=mysql_result($select_news_result,$k,'news_detailid');
	$title=mysql_result($select_news_result,$k,'news_title');
	$news_source=mysql_result($select_news_result,$k,'news_source');
	$short_details=mysql_result($select_news_result,$k,'news_details');
	$image_loc1=mysql_result($select_news_result,$k,'image_name');
	$news_type=mysql_result($select_news_result,$k,'news_type');
	$author=mysql_result($select_news_result,$k,'author');
	$publish_status=mysql_result($select_news_result,$k,'publish_status');
	
	$short_details = nl2br($short_details);

$menu='';
$request_page='';
if(isset($_REQUEST["request_page"]))
{
	$request_page=$_REQUEST["request_page"];
	$where_clause=" WHERE news_type='".$request_page."' ";
}
foreach($news_menu as $item)
{ 
	if($request_page==$item)
	{
		$menu.='<a href="user_index.php?request_page='.$item.'" class="tablink w3-red" >'.$item.'</a>';
	}
	else
	{
		$menu.='<a href="user_index.php?request_page='.$item.'" class="tablink" >'.$item.'</a>';
	}
}		


$select_query="SELECT * FROM users WHERE user_type='User'";
//echo $select_query;
$user_options='';
$select_result = mysql_query($select_query);
$select_rows = mysql_num_rows($select_result);
for($k=0;$k<$select_rows;$k++)
{
  
  $fullname=mysql_result($select_result,$k,"fullname");
  $userid1=mysql_result($select_result,$k,"userid");
	
   $user_options.="<option value='".$userid1."' >".$fullname."</option>";

}

?>
<nav class="w3-sidenav w3-light-grey w3-card-2" style="width:130px">
  <div class="w3-container">
    <h5>Latest News </h5>
  </div>
	<!--<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'London')">Top Stories</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Paris')">Technology</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Entertainment</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Sports</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Business</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Science</a>
	<a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo')">Health</a>-->
	<?php echo $menu; ?>
</nav>
<div style="margin-left:140px;width:70%;background:white;padding:10px;10px;10px;10px;">
	<div >
	<img  height="50" width="50" src="../images/share.png" style="border:1px solid black;" onclick="show();" />   
	<br><br>
	<form  id="form_s" action="save_data.php">
			<select name="share_with"><?php echo $user_options; ?></select>
			<input type="hidden" name="news_id" value="<?php echo $id;?>" />
			<input type="hidden" name="page" value="share" />
			<input type="hidden" id="show_status" value="hidden" />
			<input type="hidden" name="share_by" value="<?php echo $userid;?>" />
			<input type="submit" value="Share" />
	</form>
		<h1 class="title"><?php echo $title; ?></h1>
	</div>
	<div class="image_client" >
		<center>
			<img height="300" width="550" src="../uploads/<?php echo $image_loc1; ?>"  />
			<div class="pic_details">Picture Captured By <?php echo $news_source; ?></div>
		</center>
	</div>
	<div class="title_description" >
				<p><?php echo $short_details ?>
				</p>
	
	</div>
     <div class="author_publish">
	Published By :	<?php echo $author; ?>
	 </div>
	 <br><br>
	 <div>
		<?php
				$select_query="SELECT * FROM comments 
				INNER JOIN users ON users.userid=comments.commented_by
				WHERE news_id='".$id."'";
				//echo $select_query;
				$table='';
				$select_result= mysql_query($select_query);
				$select_rows = mysql_num_rows($select_result);
				for($k=0;$k<$select_rows;$k++)
				{
				  $table.="<div style='background:gray;padding:10px;border-radius:5px;'>";
				  $comment=mysql_result($select_result,$k,"comment");
				  $fullname=mysql_result($select_result,$k,"fullname");
				  $table.="<span style='font-weight:bold;color:white;'>".$fullname." : ".$comment." </span>";
				  $table.="</div><br>";

				}
				
				echo $table;
 ?>

	 
	 </div>
	 
	 
	 <br><br>
	 <form action="save_data.php">
		Comment : <br><textarea name="comment" cols="50" required></textarea>
		<br><br>
		<input type="hidden" name="commented_by" value="<?php echo $userid;?>" />
		<input type="hidden" name="news_id" value="<?php echo $id;?>" />
		<input type="hidden" name="page" value="comment" />
		<input type="submit" value="Go Ahead Hit!" class="w3-btn w3-teal" />
	 </form>
</div>
<script src="../js/jquery.min.js"></script>
<script>

	show();
		function show()
		{
				var value=$("#show_status").val();
				if(value=='hidden')
				{
					$("#form_s").hide();
					$("#show_status").val("show");
				}
				else if(value=='show')
				{
					$("#form_s").show();	
					$("#show_status").val("hidden");
				}
				 
				 
		}
	</script>

 
