<?php
include('web_functions.php');
$page=$_REQUEST["page"];

if($page=='delete_news')
{
	$id=$_REQUEST["id"];
	$delete_query1="DELETE FROM news_details WHERE news_detailid='".$id."'  ";
	$delete_query3="DELETE FROM share WHERE news_id='".$id."' "; 
	$delete_query2="DELETE FROM user_click_history WHERE news_detailid='".$id."' ";
	
	$result=mysql_query($delete_query1);
	$result=mysql_query($delete_query2);
	$result=mysql_query($delete_query3);
	header('Location: admin_index.php?message=You have successfully deleted news!');
}

if($page=='admin_addstage1')
{
	global $site_url;
	global $absolute_loc;
	global $connect;

	$target_dir = "uploads\\";
	$target_dir = $absolute_loc.$target_dir;
	$errors='';
	$id=getTableIncrementValue("news_details","news_detailid");
	$title=mysql_real_escape_string($_REQUEST["title"]);
	$client_source=mysql_real_escape_string($_REQUEST["client_source"]);
	$description=mysql_real_escape_string($_REQUEST["description"]);
	$option=mysql_real_escape_string($_REQUEST["option"]);
	$author=mysql_real_escape_string($_REQUEST["author"]);
	$created_by=1;
	$created_date=date('Y-m-d H:i');	
	$publish_status=0;
			$file_name = $_FILES['upload_image']['name'];
			//echo $file_name;
			//echo "<BR><BR>".getcwd();
			  $file_size =$_FILES['upload_image']['size'];
			  $file_tmp =$_FILES['upload_image']['tmp_name'];
			  $file_type=$_FILES['upload_image']['type'];
			  $file_ext=strtolower(end(explode('.',$_FILES['upload_image']['name'])));
			  //echo "hello ".$file_size;
			  $expensions= array("jpeg","jpg","png","gif");
			  
			  if(in_array($file_ext,$expensions)=== false){
				 $errors="Extension not allowed, please choose a JPEG or PNG file.";
				// echo $file_name."<BR>";
			  }
			  
			  if($file_size > 2097152){
				 $errors='File size must be less than or equal 2 MB';
			  }
			  
			  if(empty($errors)==true){
				 // echo $errors;
				 $moved=move_uploaded_file($file_tmp,$target_dir.$file_name);
				if($moved)
				{					
					$target_dir=mysql_real_escape_string($target_dir);
					$file_name=mysql_real_escape_string($file_name);
					$insert_query="INSERT INTO `news_details` (image_name,image_location, news_title,news_source,news_details
								,news_type,news_detailid,author,created_by,created_date,publish_status)
					VALUES ( '".$file_name."', '".$target_dir.$file_name."','".$title."','".$client_source."','".$description."','".$option."'
							,'".$id."','".$author."','".$created_by."','".$created_date."','".$publish_status."')";	
					//echo "<BR><BR>".$insert_query;
					//exit;
					if(mysql_query($insert_query))
					{
						header('Location: admin_index.php?message=You have successfully added user!');
					}
					else{
						header('Location: admin_addnews.php?error='.$error);
					}
				}
				else{
					 $errors='File size must be less than or equal 2 MB';
					 header('Location: admin_addnews.php?error='.$error);
				}
				// echo "<script>window.location='?module=imageupload&view=index';</script>";
			  }else{
				 // echo "<BR><BR><span class=''> ".$errors."</span>";
				 
			  }
	
}

if($page=='update_addstage1')
{
	global $site_url;
	global $absolute_loc;
	global $connect;

	$target_dir = "uploads\\";
	$target_dir = $absolute_loc.$target_dir;
	$errors='';
	$id=getTableIncrementValue("news_details","news_detailid");
	
	$id=$_REQUEST["id"];
	$news_title=mysql_real_escape_string($_REQUEST["title"]);
	$news_source=mysql_real_escape_string($_REQUEST["client_source"]);
	$news_details=mysql_real_escape_string($_REQUEST["description"]);
	$news_type=mysql_real_escape_string($_REQUEST["option"]);
	$author=mysql_real_escape_string($_REQUEST["author"]);

$created_by=1;
	$created_date=date('Y-m-d H:i');	
	$publish_status=0;
			$file_name = $_FILES['upload_image']['name'];
			//echo $file_name;
			//echo "<BR><BR>".getcwd();
			  $file_size =$_FILES['upload_image']['size'];
			  $file_tmp =$_FILES['upload_image']['tmp_name'];
			  $file_type=$_FILES['upload_image']['type'];
			  $file_ext=strtolower(end(explode('.',$_FILES['upload_image']['name'])));
			  //echo "hello ".$file_size;
			  $expensions= array("jpeg","jpg","png","gif");
			  
			  if(in_array($file_ext,$expensions)=== false){
				 $errors="Extension not allowed, please choose a JPEG or PNG file.";
				// echo $file_name."<BR>";
			  }
			  
			  if($file_size > 2097152){
				 $errors='File size must be less than or equal 2 MB';
			  }
			  
			  if(empty($errors)==true){
				 // echo $errors;
				 $moved=move_uploaded_file($file_tmp,$target_dir.$file_name);
				if($moved)
				{					
					$target_dir=mysql_real_escape_string($target_dir);
					$file_name=mysql_real_escape_string($file_name);
	
					$update_query="UPDATE news_details SET news_title= '".$news_title."'
					,news_details='".$news_details."'
					,news_source='".$news_source."'
					,news_type='".$news_type."'
					,author='".$author."'
					,image_name='".$file_name."'
					,image_location='".$target_dir.$file_name."'
					WHERE news_detailid='".$id."' ";
					$update_result=mysql_query($update_query);
					if($update_result)
					{
						header('Location: admin_detailview.php?id='.$id.'&error=You have successfully updated!');
					}
					else{
						header('Location: admin_editview.php?id='.$id.'&error='.mysql_error());
					}
				}
				else{
					 $errors='File size must be less than or equal 2 MB';
					 header('Location: admin_addnews.php?error='.$error);
				}
			}
			else{
				 // echo "<BR><BR><span class=''> ".$errors."</span>";
				 
			  }
			  
}


?>


