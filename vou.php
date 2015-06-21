<?php session_start();

include 'config.php';


if (isset($_GET['conviteid'])){
	
	$conviteid=$_GET['conviteid'];
	
	$sql="UPDATE convite SET estado='1' where conviteid='$conviteid'";
	$result=mysqli_query($link, $sql);
	echo'Aceitou o convite';
	if (isset($_SESSION['user_id'])){
		header('Location:userinvites.php');
	}
	
	
}else{
	
	echo'Convite não existente';
}







?>