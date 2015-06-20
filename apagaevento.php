<?php session_start();

include 'config.php';


if (isset($_SESSION['user_id'])&&isset($_GET['eventid'])){
	
	$user_id=$_SESSION['user_id'];
	$eventid=$_GET['eventid'];
	
	$sql="Select userid from evento where eventid='$eventid'";
	$result=mysqli_query($link, $sql);
	$num_rows = mysqli_num_rows($result);
	/**Verifica se o user é o criador da evento**/
		if ($num_rows==1){
			//apaga convites para esse evento
			$sql2="DELETE FROM convite where eventid='$eventid'";
			$result2=mysqli_query($link, $sql2);
			//se é, apaga a evento com aquele ID
			$sql="DELETE FROM evento where eventid='$eventid'";
			$result=mysqli_query($link, $sql);
			header('Location: userpage.php');
			
		}else{
			
			header('Location: userpage.php');
		}
	
		
	
	
}else{
	
	header('Location: index.php');
}







?>