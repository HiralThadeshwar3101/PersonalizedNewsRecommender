<?php
include('web_functions.php');
$page=$_REQUEST["page"];
if($page=='comment')
{
	$comment=mysql_real_escape_string($_REQUEST['comment']);
	$news_id=mysql_real_escape_string($_REQUEST['news_id']);
	$commented_by=mysql_real_escape_string($_REQUEST['commented_by']);
	$comment_id=getTableIncrementValue("comments","comment_id");


	$insert_query="INSERT INTO comments(comment,news_id,commented_by,comment_id) VALUES('".$comment."','".$news_id."','".$commented_by."','".$comment_id."')";
	$result=mysql_query($insert_query);
	if($result)
	{
		header('Location: user_detailview.php?id='.$news_id.'&message=You have successfully comment data!');
	}
	else {
		header('Location: user_detailview.php?'.$news_id.'&error='.mysql_error());
	}
	
}

if($page=='share')
{
	
	$share_id=getTableIncrementValue("share","share_id");
	$share_by=mysql_real_escape_string($_REQUEST['share_by']);
	$share_with=mysql_real_escape_string($_REQUEST['share_with']);
	$news_id=mysql_real_escape_string($_REQUEST['news_id']);

	$check_result=mysql_query("SELECT * FROM share WHERE news_id='".$news_id."' AND share_with='".$share_with."'");
	$rows=mysql_num_rows($check_result);
	if($rows==0)
	{
		$insert_query="INSERT INTO share(share_id,share_by,share_with,news_id) VALUES('".$share_id."','".$share_by."','".$share_with."','".$news_id."')";
		$result=mysql_query($insert_query);
		if($result)
		{
			header('Location: user_index.php?message=You have successfully shared the news!');
		}
		else {
			header('Location: user_index.php?error='.mysql_error());
		}
	}
	else{
		header('Location: user_index.php');
	}
}

if($page=='user_register')
{
	$id=getTableIncrementValue("users","userid");
	$email=mysql_real_escape_string($_REQUEST["email"]);
	$username=mysql_real_escape_string($_REQUEST["username"]);
	$password=mysql_real_escape_string($_REQUEST["password"]);
	$fullname=mysql_real_escape_string($_REQUEST["fullname"]);
	$mobile=mysql_real_escape_string($_REQUEST["number"]);
	$gender=mysql_real_escape_string($_REQUEST["gender"]);
	$favourite_news=mysql_real_escape_string($_REQUEST["option"]);
	$user_type=mysql_real_escape_string($_REQUEST["logic"]);
	
	$insert_query="INSERT INTO users
	(email,username,password,fullname,mobile,gender,favourite_news,user_type,userid) 
	 VALUES('".$email."','".$username."','".$password."','".$fullname."'
	,'".$mobile."','".$gender."','".$favourite_news."','".$user_type."','".$id."')";
	//echo $insert_query;exit;
	$insert_result=mysql_query($insert_query);
	if($insert_result)
	{
			
			header('Location: login.php?message=You have successfully added user!');
	}
	else
	{echo $insert_query;exit;
		header('Location: login.php?error='.mysql_error());

	}
}

?>