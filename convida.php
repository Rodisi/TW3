<?php
/*** begin our session ***/
session_start();
if(isset($_SESSION['user_id'])){
	
	$user_id=$_SESSION['user_id'];



/*** if we are here the data is valid and we can insert it into database ***/
    $eventid = filter_var($_POST['eventid']);
	$email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
	$mensagem = filter_var($_POST['mensagem'],FILTER_SANITIZE_STRING);
	
	include 'config.php';
	
	$sql="INSERT INTO convite (eventid , email ,estado , mensagem) VALUES ('$eventid','$email','0','$mensagem')";
	
	$result=mysqli_query($link, $sql);
	
	
	
	//header("location:javascript://history.go(-1)");
	header("Location: userpage.php");

	}else{
	header("Location: index.php?err=1");
}
	
?>