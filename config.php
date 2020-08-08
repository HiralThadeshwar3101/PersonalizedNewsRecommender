<?php
$connection_name="localhost";
$connection_username="root";
$connection_password="root";

$db_name="news_app";
$db_password="";

$site_url="http://localhost/personal_news";
$absolute_loc="C:\\xampp\htdocs\personal_news\\";

$connect=mysql_connect($connection_name,$connection_username,$connection_password);

if($connect)
{
	
}
else
{
	echo "<BR> Unable to establed connection".mysql_error();
}

$select_db=mysql_select_db($db_name,$connect);
if(!$select_db)
{
	echo "Database not selected";
}


?>