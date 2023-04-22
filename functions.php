<?php
if(isset($_SESSION["upload_user"]) AND $_SESSION["upload_user"] == true){
	if(isset($_POST["submit"]) AND $_POST["submit"] == "offline"){
		if(isset($_FILES['file']) AND $_POST['token'] == $token){
		  $errors= array();
		  $file_name = $_FILES['file']['name'];
		  $file_size = $_FILES['file']['size'];
		  $file_tmp = $_FILES['file']['tmp_name'];
		  $file_type = $_FILES['file']['type'];
		  $file_ext_array = explode('.', $file_name);
		  $file_ext = strtolower(end($file_ext_array));
		  $extensions = array("ico", "jpeg", "jpg", "png", "mp4", "mkv");
		  if(in_array($file_ext, $extensions) === false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  if($file_size > 20971522352353252){
			 $errors[]='File size must be excately 2 MB';
		  }
		  if(empty($errors)==true){
			 $unique_name = "offline_".rand(99999, 10000).rand(time(), 43423).".".$file_ext;
			 $move_file = "assets/file/".$unique_name;
			 move_uploaded_file($file_tmp, $move_file);
			 echo "<script>alert('$base_url.$move_file');</script>";
		  }else{
			 print_r($errors);
		  }
	   }
	}
	if(isset($_POST["submit"]) AND $_POST["submit"] == "online"){
		if(isset($_POST['file']) AND $_POST['token'] == $token){
			$errors= array();
			$server_link = $_POST["file"];
			$file_array = basename($server_link);
			$file_array = explode(".", $file_array);
			if(isset($_POST['extension'])){
				$extension = $_POST['extension'];
			}else{
				$extension = end($file_array);
			}
			$date = date("dmy");
			$rand = rand(10000000, 99999999);
			$file_name = "online_".$date.$rand.".".$extension;
			$upload_source = "assets/file/".$file_name;
			$context = stream_context_create(['https' => ['ignore_errors' => true]]);
			$upload = file_put_contents($upload_source, file_get_contents($server_link, false, $context));
			echo "<script>alert('$base_url.$upload_source');</script>";
		}
	}
	if(isset($_GET["delete"]) AND file_exists("assets/file/".$_GET["delete"])){
		unlink("assets/file/".$_GET["delete"]);
	}
}
?>