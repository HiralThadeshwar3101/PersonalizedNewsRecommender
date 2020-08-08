<?php
include('../config.php');


function getTableIncrementValue($tablename,$table_id)
{
	$table_rows=0;
	$table_query="SELECT MAX(".$table_id.") AS ID FROM ".$tablename;
	//echo $table_query;
	$table_result=mysql_query($table_query);
	if($table_result)
	{
		$table_rows=mysql_result($table_result,0,'ID');
	}
	$table_rows=$table_rows+1;
	return $table_rows;
}

function show_SingleNews2($id,$page)
{
	$select_news_query="SELECT * FROM news_details WHERE  news_detailid='".$id."'";
		//echo $select_news_query;
		$select_news_result=mysql_query($select_news_query);
		$select_news_rows=mysql_num_rows($select_news_result);
		for($k=0;$k<$select_news_rows;$k++)
		{
			$news_detailid=mysql_result($select_news_result,$k,'news_detailid');
			$title=mysql_result($select_news_result,$k,'news_title');
			$news_source=mysql_result($select_news_result,$k,'news_source');
			$short_details=mysql_result($select_news_result,$k,'news_details');
			$image_location=mysql_result($select_news_result,$k,'image_name');
			$short_details=get_words($short_details,40);
			//show_SingleNews($title,$news_source,$short_details,$image_loc1,$news_detailid,"user_detailview.php");
		
	$row='<div class="first">
		<table >
			<tr >
				<td >
					<a  href="'.$page.'?id='.$id.'">
					<div class="title_thumbnail_img"><img src="../uploads/'.$image_location.'" height="72" width="72" /></div>
					<div class="title_thumbnail_client"><span class="client">'.$news_source.'</span></div>
					</a>
				</td>
				<td >
				<a   class="main_info_news" href="'.$page.'?id='.$id.'" >
					<div >
						<h2 class="heading_title">
							'.$title.'
						</h2>
					</div>
					<div><span class="client">'.$news_source.'</span></div>
					<div >
					 	<span class="short_descrip">'.$short_details.'</span>
						
					</div>
					
				</a>
				</td>
				 
			</tr>
		</table>
	</div>';
 echo $row;
		}
}
 
function show_SingleNews($title,$client_name,$description,$image_location,$id,$page)
{
	$row='<div class="first">
		<table >
			<tr >
				<td >
					<a  href="'.$page.'?id='.$id.'">
					<div class="title_thumbnail_img"><img src="../uploads/'.$image_location.'" height="72" width="72" /></div>
					<div class="title_thumbnail_client"><span class="client">'.$client_name.'</span></div>
					</a>
				</td>
				<td >
				<a   class="main_info_news" href="'.$page.'?id='.$id.'" >
					<div >
						<h2 class="heading_title">
							'.$title.'
						</h2>
					</div>
					<div><span class="client">'.$client_name.'</span></div>
					<div >
					 	<span class="short_descrip">'.$description.'</span>
						
					</div>
					
				</a>
				</td>
				 
			</tr>
		</table>
	</div>';
 echo $row;
}

function get_words($sentence, $count = 10) {
  preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
  return $matches[0];
}


function show_IndivisualNew($request_page,$where_clause)
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

?>