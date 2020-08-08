<?php
include('header.php');
include('web_functions.php');
include('dropdowns.php');

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

	$options='';
foreach($news_category as $item)
{
	if(trim($item)==trim($news_type))
	{
		$options.="<option selected>".$item."</option>";
	}
	else
	{
		$options.="<option>".$item."</option>";
	}
}	

?>
<style>
.hidden {
 
    display: none;
  
}
</style>
 <div style="position:relative;left:200px;top:100px;width:60%;">
<form class="w3-container w3-card-2" method="post" action="save_news.php"  enctype="multipart/form-data" >
			<input type='hidden' name='id' id='id' value='<?php echo $news_detailid ?>' />
		  <p>
			<center><img id="show_image" height="200" width="300" src="../uploads/<?php echo $image_loc1; ?>" onclick="callhidden();" /></center>
			<input class="hidden" type='file' name='upload_image' id='upload_image' onchange="loadFile(this,'1')" />
		  </p>
		  <p>
		  <label class="w3-label w3-text-blue">Title(*)</label>
		  <input class="w3-input w3-border" name="title" value="<?php echo $title ?>" type="text" required></p>
		  <p>
		  <label class="w3-label w3-text-blue">Author(*)</label>
		  <input class="w3-input w3-border"  name="author"  type="text" value="<?php echo $author?>" required></p>
		  <p>	
		  <p>
		  <label class="w3-label w3-text-blue">Client Source(*)</label>
		  <input class="w3-input w3-border"  name="client_source" value="<?php echo $news_source ?>" type="text" required></p>
		  <p>		        
			<label class="w3-text-blue">Description(*)</label>
			<textarea class="w3-input w3-border" rows="10" name="description"  style="resize:none"><?php echo $short_details ?></textarea>
		  </p>
		  <p>
				<select class="w3-select w3-text-blue" name="option" id="option">
				  <option value="" disabled selected>Choose your favourite news</option>
				  <?php echo $options ?>
				</select>
			</p>
		  
		  <p>
		  <button class="w3-btn w3-blue">Save</button>
		  </p>
		  <input type='hidden' name='logic' id='logic' value='User' />
		  <input type='hidden' name='page' id='page' value='update_addstage1' />
		</form>

</div>
 
 <br>
<script src="../js/jquery.min.js"></script>
<script>
function loadFile(input,row) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#show_image').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
			}
}
function callhidden()
{
	 $("#upload_image").click();
	 return false;
}
</script>
</body>
</html>

 