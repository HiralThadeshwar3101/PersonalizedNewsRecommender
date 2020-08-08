<?php
include('../config.php');

function getTopLastesNewMessages($userid)
{
	$select_query="SELECT * FROM users WHERE userid='".$userid."'";
	$select_result=mysql_query($select_query);
	$lastnews_id=mysql_result($select_result,0,'last_news');
	
	
	$select_query="SELECT * FROM news_details
					WHERE news_detailid=(
					SELECT MAX(news_detailid) AS news_detailid FROM news_details
					)";
	$select_result=mysql_query($select_query);
	$news_detailid=mysql_result($select_result,0,'news_detailid');
	$news_type=mysql_result($select_result,0,'news_type');
	$message="";

	if($lastnews_id==$news_detailid)
	{
		
	}
	else
	{
		$update_query="UPDATE users SET last_news='".$news_detailid."' WHERE userid='".$userid."'";
		mysql_query($update_query);
			echo "asdfaf ".$update_query;
		$message="New world news has been added in ".$news_type.". Do have look into it!";
	}
	
	return $message;
}
	
?>