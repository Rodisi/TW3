<?php
/*** begin our session ***/
session_start();



/*** if we are here the data is valid and we can insert it into database ***/
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	
	include 'config.php';
	
	$sql="Select userid, email, pass FROM user where email='$username' AND pass='$password'";
	
	$result=mysqli_query($link, $sql);
	
	/* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);
	
	if ($row_cnt>0){
		
		while($row = mysqli_fetch_array($result)) {
		$user_id=$row['userid'];
		$_SESSION['user_id'] = $user_id;
		}
		
		/* close connection */
	mysqli_close($link);
	
	header("Location: userpage.php");
		
	}else {
		
		header("Location: index.php?err=1");
	}

	
	
?>