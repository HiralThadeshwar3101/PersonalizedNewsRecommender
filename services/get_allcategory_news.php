<?php
include("../config.php");
include('../pages/web_functions.php');
$query="SELECT news_details
			,news_detailid
			,news_title
			,news_source
			,news_type
			,author  
			,image_name
FROM news_details  
";
$query_result=mysql_query($query);

while($row = mysql_fetch_array($query_result)) {
 
	$send_rows["news_details"]=mysql_real_escape_string(get_words($row["0"],12));
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
}
//print_r($flag);
print(json_encode($flag));

?>

