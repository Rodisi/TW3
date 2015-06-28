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
	include ("iCal.php");
	
	$sql="INSERT INTO convite (eventid , email ,estado , mensagem) VALUES ('$eventid','$email','0','$mensagem' )";
	$result=mysqli_query($link, $sql);
	$conviteid= mysqli_insert_id($link);
	
	$sql="SELECT * FROM evento WHERE eventid= '$eventid' ";
	$result=mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result);
	$local =$row['local'];
	$data = $row['data'];
	$hora = $row['hora'];
	$descricao =$row['descricao'];
	$nomeEvento = $row['nome'];
	$meeting_date = date('Y-m-d H:i:s', strtotime("$data $hora"));
	
	$result2 =sendIcalEmail($email,$meeting_date,$nomeEvento,$descricao,$conviteid,$mensagem,$local);
	if($result2) {
		echo "Email sent successfully.";
	} else {
		echo "A problem occured sending email";
	} 
	
	
	
	//header("location:javascript://history.go(-1)");
	header("Location: userpage.php");

	}else{
	header("Location: index.php?err=1");
}
	
?>