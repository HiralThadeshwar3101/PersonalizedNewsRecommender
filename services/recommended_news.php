<?php
include("../config.php");
//include('../pages/web_functions.php');

$userid=$_REQUEST["news_tp"]; 
$select_query="SELECT news_type
					,COUNT(historyid) AS PRIORITY_PERCENT
					FROM
					user_click_history WHERE userid=".$userid."
					GROUP BY news_type";
	$select_news_result=mysql_query($select_query);
	$select_news_rows=mysql_num_rows($select_news_result);	

	$source=array();
	for($i=0;$i<4;$i++)
	{ 
		//$userid=$_SESSION["userid"];
		$PRIORITY_PERCENT=mysql_result($select_news_result,$i,'PRIORITY_PERCENT');
		$news_type=mysql_result($select_news_result,$i,'news_type');
		$rows=$PRIORITY_PERCENT;
		if($rows>0)
		{
			$source=printRecommended($rows,$news_type,$source);
		}
	}
	//print_r($source);
	print(json_encode($source));

	
function printRecommended($rows,$news_type,$flag)
{
	include("../config.php");
		$select_news_query="SELECT * FROM news_details WHERE news_type='".$news_type."' and rownum<=4" ;
		//echo $select_news_query;
		$select_news_result=mysql_query($select_news_query);
		$select_news_rows=mysql_num_rows($select_news_result);
		$l=0;
		while($row = mysql_fetch_array($select_news_result)) {
			$l=$l+1;
			$send_rows["news_details"]=mysql_real_escape_string(get_words($row["news_details"],12));
			$send_rows["news_detailid"]=$row["news_detailid"];
			$send_rows["news_title"]=get_words($row["news_title"],10);
			$send_rows["news_source"]=$row["news_source"];
			$send_rows["news_type"]=$row["news_type"];
			$send_rows["author"]=$row["author"];
			$send_rows["image_name"]=$row["image_name"];
			
			//$row["0"]=mysql_real_escape_string(get_words($row["0"],12));
			$flag[] = $send_rows;
			
			//echo "<br>=======".$row["0"];
			//print_r($row);
			if($l==$rows)
			{
				break;
			}
		}
		//print_r($flag);
		//print(json_encode($flag));
		return $flag;

		 
	
	
}

function get_words($sentence, $count = 10) {
  preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
  return $matches[0];
}


?>


