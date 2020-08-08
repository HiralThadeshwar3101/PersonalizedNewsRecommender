<?php
include('header.php');
include('web_functions.php');
$id=$_REQUEST["id"];

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
	//$short_details=get_words($short_details,40);

?>
<div style="position:relative;left:200px;top:100px;width:60%;background:white;">
<form class="w3-container w3-card-2" method="post" action="admin_editview.php"  enctype="multipart/form-data" >
		  <input type='hidden' name='id' id='id' value='<?php echo $news_detailid ?>' />
		  

			<p>
		   <a href='admin_index.php' class="w3-btn">Back</a>
		   <button class="w3-btn w3-blue">Edit</button>
		   <a href='save_news.php?page=delete_news&id=<?php echo $news_detailid?>' class="w3-btn w3-red">Delete</a>
		  
		   <?php if($publish_status==0){ ?><a href='#' class="w3-btn w3-green">Publish</a><?php } ?>
		  </p>
</form>		  
		  <p>
			<center><img id="show_image" height="200" width="300" src="../uploads/<?php echo $image_loc1; ?>" onclick="callhidden();" /></center>
			 
		  </p>
		  <p>
		  <label class="w3-label w3-text-blue">Title(*)</label>
			<div style='background: #e0e0d1;border-radius:5px;padding:5px 0px 15px 20px;'> <?php echo $title; ?> </div>
		  </p>
		  <p>
		  <label class="w3-label w3-text-blue">Author(*)</label>
		  <div style='background: #e0e0d1;border-radius:5px;padding:5px 0px 15px 20px;'> <?php echo $author; ?> </div>
		   </p>
		   <p>
		  <label class="w3-label w3-text-blue">Client Source(*)</label>
		  <div style='background: #e0e0d1;border-radius:5px;padding:5px 0px 15px 20px;'> <?php echo $news_source; ?> </div>
		  </p>
		  <p>		        
			<label class="w3-text-blue">Description(*)</label>
			<div style='background: #e0e0d1;border-radius:5px;padding:5px 0px 15px 20px;'> <?php echo $short_details; ?> </div>
		  
		  </p>
		  <p>
			<div style='background: #e0e0d1;border-radius:5px;padding:5px 0px 15px 20px;'> <?php echo $news_type; ?> </div>
		  
		   </p>
		  
		  
		 
</div>
 