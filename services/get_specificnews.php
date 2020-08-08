<?php
include("../config.php");
include('../pages/web_functions.php');

$id=$_REQUEST["id"];
$userid=$_REQUEST["userid"];
 
$query="SELECT *
		FROM news_details WHERE news_detailid='".$id."' 
";
//echo $query;
$query_result=mysql_query($query);

while($row = mysql_fetch_array($query_result)) {
 
	
	
	//$row["0"]=mysql_real_escape_string(get_words($row["0"],12));
	$flag[] = $row;
	//print_r($flag);
	$historyid=getTableIncrementValue("user_click_history","historyid");
	$news_detailid=$row["news_detailid"];
	$news_type=$row["news_type"];
	$created_date=date("Y-m-d H:i");
	$insert_query="INSERT INTO user_click_history(historyid,userid,news_detailid,news_type,created_date) 
					VALUES('".$historyid."','".$userid."','".$news_detailid."','".$news_type."','".$created_date."')";
	mysql_query($insert_query);	
	//echo "<br>=======".$row["0"];
	//print_r($row);
}
//print_r($flag);
print(json_encode(utf8ize($flag)));


function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}
?>