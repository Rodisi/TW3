<?php


include 'config.php';

$user_id=$_SESSION['user_id'];

$sql="select * from user where userid='$user_id'";
	$result = mysqli_query($link, $sql);
	
	while($row = mysqli_fetch_array($result)){
	
	$nome=$row['nome'];
	echo 'Bem-Vindo/a '.$nome;
	
	
	echo '<br><a href="logout.php" data-role="button" data-inline="true" data-ajax="false">Logout</a>';
	echo'<a href="userpage.php" data-role="button" data-icon="home" data-iconpos="left" data-ajax="false">Home</a>';

	}
?>