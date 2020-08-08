<?php
include('../config.php');


function show_Recommended($userid)
{
	echo '<div class="stories">
			<div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
			  <p>Recommended for you</p>
			</div> 
			</div>';
			
			
	getAndDisplayPriorityBasedOnNewType($userid);
}


function getAndDisplayPriorityBasedOnNewType($userid)
{
	
	$select_query="SELECT news_type
					,COUNT(historyid)/( SELECT COUNT(*)  FROM user_click_history where userid=".$userid."  )*100 AS PRIORITY_PERCENT
					FROM
					user_click_history WHERE userid=".$userid."
					GROUP BY news_type";
	$select_news_result=mysql_query($select_query);
	$select_news_rows=mysql_num_rows($select_news_result);	

	for($i=0;$i<$select_news_rows;$i++)
	{ 
		//$userid=$_SESSION["userid"];
		$PRIORITY_PERCENT=mysql_result($select_news_result,$i,'PRIORITY_PERCENT');
		$news_type=mysql_result($select_news_result,$i,'news_type');
		$rows=($PRIORITY_PERCENT/100)*4;
		if($rows>0)
		{
		printRecommended($rows,$news_type);
		}
	}
}

function printRecommended($rows,$type)
{
		$select_news_query="SELECT * FROM news_details WHERE news_type='".$type."'";
		//echo $select_news_query;
		$select_news_result=mysql_query($select_news_query);
		$select_news_rows=mysql_num_rows($select_news_result);
		for($k=0;$k<$select_news_rows;$k++)
		{
			$l=$k+1;
			$news_detailid=mysql_result($select_news_result,$k,'news_detailid');
			$title=mysql_result($select_news_result,$k,'news_title');
			$news_source=mysql_result($select_news_result,$k,'news_source');
			$short_details=mysql_result($select_news_result,$k,'news_details');
			$image_loc1=mysql_result($select_news_result,$k,'image_name');
			$short_details=get_words($short_details,40);
			show_SingleNews($title,$news_source,$short_details,$image_loc1,$news_detailid,"user_detailview.php");
			
			if($l==$rows)
			{
				break;
			}
		}
	
}

function saveClickDetails($id,$historyid,$userid)
{
	//echo "<br> How are you doing ?";
	$select_news_query="SELECT * FROM news_details WHERE news_detailid='".$id."'";
	$select_news_result=mysql_query($select_news_query);
	$select_news_rows=mysql_num_rows($select_news_result);
	echo "<br>total rows : ".$select_news_rows;
	for($i=0;$i<$select_news_rows;$i++)
	{
		
		//$userid=$_SESSION["userid"];
		$news_detailid=mysql_result($select_news_result,$i,'news_detailid');
		$news_type=mysql_result($select_news_result,$i,'news_type');
		$news_type=mysql_result($select_news_result,$i,'news_type');
		$created_date=date("Y-m-d H:i");
		$insert_query="INSERT INTO user_click_history(historyid,userid,news_detailid,news_type,created_date) 
					VALUES('".$historyid."','".$userid."','".$news_detailid."','".$news_type."','".$created_date."')";
					
		$insert_result=mysql_query($insert_query);			
		//if($insert_result)
		//{
		//	echo "Done";
		//}
	}
	
	
	
}

?>