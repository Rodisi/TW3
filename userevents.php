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
    <title>Meus eventos</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	
      <div  data-role="header">
        <h3> Meus eventos</h3>
		<?php include "session_nav.php"; ?>
      </div>
	  <p><a href="criarEvento.php" data-role="button" data-inline="true" data-ajax="false">criar novo Evento</a></p>
      
	  <?php
		$user_id=$_SESSION['user_id'];
		$sql="SELECT * from evento where userid='$user_id' ORDER BY data ASC";

		$result = mysqli_query($link, $sql);
	
		$num_rows= mysqli_num_rows($result);	
		
		if ($num_rows>0){
			echo '<ul data-role="listview" data-inset="true" data-ajax="false">';
			
			while($row = mysqli_fetch_array($result)){
				echo'<li>';
						echo'<a href="eventdetails.php/eventid='.$row['eventid'].'" data-ajax="false">';
						echo'<h2>'.$row['nome'].' </h2>';
						echo'<h2>'.$row['local'].' </h2>';
						echo'</a>';
					echo'</li>';
			}
			echo '</ul>';
		}else{
			echo'Não tem eventos criados';
		}
	  ?>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> UE </h3>
      </div>
    </div>
</body>
</html>