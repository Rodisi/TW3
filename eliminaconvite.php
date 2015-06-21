<?php session_start();

include 'config.php';


if (isset($_SESSION['user_id'])&&isset($_GET['conviteid'])){
	
	$user_id=$_SESSION['user_id'];
	$conviteid=$_GET['conviteid'];
	
	$sql="Select evento.userid from evento JOIN convite ON convite.eventid = evento.eventid AND convite.conviteid ='$conviteid'";
	$result=mysqli_query($link, $sql);
	$num_rows = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	/**Verifica se o user é o criador da evento**/
		if ($row['userid']==$user_id){
			$sql2="DELETE FROM convite where conviteid='$conviteid'";
			$result2=mysqli_query($link, $sql2);
			header('Location: userpage.php');
			
		}else{
			
			header('Location: userpage.php');
		}
	
		
	
	
}else{
	
	header('Location: index.php');
}







?>