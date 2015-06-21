<!DOCTYPE html>
<?php session_start(); 

include 'config.php'; 

if(isset($_SESSION['user_id'])){
	
	$user_id=$_SESSION['user_id'];
	
}else{
	header("Location: index.php?err=1");
}
?>
<html>
    <head>
    <title>Meus convites</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	
      <div  data-role="header">
        <h3> Eventos para que fui convidado</h3>
		<?php include "session_nav.php"; ?>
      </div>
      
	  <?php
		$sql2="SELECT email FROM user WHERE userid = '$user_id'";
		$result2 = mysqli_query($link, $sql2);
		$row2 = mysqli_fetch_array($result2);
		$useremail=$row2['email'];
		$sql="SELECT * FROM convite INNER JOIN user ON user.email = convite.email AND '$useremail' = convite.email ";

		$result = mysqli_query($link, $sql);
	
		$num_rows= mysqli_num_rows($result);	
		
		if ($num_rows>0){
			echo '<ul data-role="listview" data-inset="true" data-ajax="false">';
			
			while($row = mysqli_fetch_array($result)){
				$evento=$row['eventid'];
				$conviteid=$row['conviteid'];
				$sql2="SELECT * from evento where eventid='$evento'";

				$result2 = mysqli_query($link, $sql2);
	
				$row2 = mysqli_fetch_array($result2);
				
				echo'<li>';
						echo'<a href="eventdetails.php?eventid='.$evento.'&conviteid='.$conviteid.'" data-ajax="false">';
						echo'<h2>'.$row2['nome'].' </h2>';
						echo'<h3>'.$row2['local'].' </h3>';
						echo'<h3>'.$row['mensagem'].' </h3>';
						echo'</a>';
					echo'</li>';
			}
			echo '</ul>';
		}else{
			echo'Não foi convidado para nada';
		}
	  ?>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> UE </h3>
      </div>
    </div>
</body>
</html>