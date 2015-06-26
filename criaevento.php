<?php
/*** begin our session ***/
session_start();
if(isset($_SESSION['user_id'])){
	
	$user_id=$_SESSION['user_id'];



/*** if we are here the data is valid and we can insert it into database ***/
    $nomeEvento = filter_var($_POST['nomeEvento'], FILTER_SANITIZE_STRING);
    $data = filter_var($_POST['data']);
	$hora = filter_var($_POST['hora']);
	$descricao = filter_var($_POST['descricao'],FILTER_SANITIZE_STRING);
	$lat = filter_var($_POST['lat']);
	$lon = filter_var($_POST['lon']);
	$local = filter_var($_POST['local'],FILTER_SANITIZE_STRING);
	
	include 'config.php';
	
	if(isset($_POST['eventid'])){
	$eventid=$_POST['eventid'];
	
	$sql="UPDATE evento SET nome='$nomeEvento', data ='$data',hora='$hora',descricao='$descricao',lat='$lat',lon='$lon',local='$local' WHERE eventid='$eventid'";
	$result=mysqli_query($link, $sql);
	
	header("Location: userevents.php");
	
	
}else{
	
	$sql="INSERT INTO evento (data, hora, descricao , nome ,lat , lon ,local ,userid) VALUES ('$data','$hora','$descricao','$nomeEvento','$lat','$lon','$local','$user_id')";
	
	$result=mysqli_query($link, $sql);
	
	header("Location: userevents.php");
}

	}else{
	header("Location: index.php?err=1");
	
}
	
?>