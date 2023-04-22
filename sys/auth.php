<?php
session_start();
if(isset($_POST["submit"]) AND $_POST["submit"] == "login"){
	if($user == $_POST["user"] AND $psw == $_POST["psw"]){
		$_SESSION["user"] = $_POST["user"];
		$_SESSION["upload_user"] = true;
	}else{
		header("Location:".$base_url."index.php");
	}
}
function loginChack(){
	if(isset($_SESSION["upload_user"]) AND $_SESSION["upload_user"] == true){
		header("Location:".$base_url."upload.php");
	}
}
function logoutChack(){
	if(!isset($_SESSION["upload_user"]) AND $_SESSION["upload_user"] != true){
		header("Location:".$base_url."index.php");
	}
}
if(isset($_GET["logout"])){
	session_destroy();
	header("Location:".$base_url."index.php");
}
?>