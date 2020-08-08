<?php
include('header.php');
include('dropdowns.php');

$options='';
foreach($news_category as $item)
{ 
$options.="<option>".$item."</option>";
}	
?>
<style>
.hidden {
 
    display: none;
  
}
</style>
 <div style="position:relative;left:200px;top:100px;width:60%;background:white;">
<form class="w3-container w3-card-2" method="post" action="save_news.php"  enctype="multipart/form-data" >
		  <p>
			<center><img id="show_image" height="200" width="300" src="../images/image_upload.png" onclick="callhidden();" /></center>
			<input class="hidden" type='file' name='upload_image' id='upload_image' onchange="loadFile(this,'1')" />
		  </p>
		  <p>
		  <label class="w3-label w3-text-blue">Title(*)</label>
		  <input class="w3-input w3-border" name="title"  type="text" required></p>
		  <p>
		  <label class="w3-label w3-text-blue">Author(*)</label>
		  <input class="w3-input w3-border"  name="author"  type="text" required></p>
		  <p>	
		  <p>
		  <label class="w3-label w3-text-blue">Client Source(*)</label>
		  <input class="w3-input w3-border"  name="client_source"  type="text" required></p>
		  <p>		        
			<label class="w3-text-blue">Description(*)</label>
			<textarea class="w3-input w3-border" rows="10" name="description" style="resize:none"></textarea>
		  </p>
		  <p>
				<select class="w3-select w3-text-blue" name="option" id="option">
				  <option value="" disabled selected>Choose your favourite news</option>
				  <?php echo $options; ?>
				</select>
			</p>
		  
		  <p>
		  <button class="w3-btn w3-blue">Save</button>
		  </p>
		  <input type='hidden' name='logic' id='logic' value='User' />
		  <input type='hidden' name='page' id='page' value='admin_addstage1' />
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

