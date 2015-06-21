<!DOCTYPE html>
<?php session_start(); 

include 'config.php'; 

if(isset($_SESSION['user_id'])){
	
	$user_id=$_SESSION['user_id'];
}
	

if(isset($_GET['conviteid'])){
		$conviteid=$_GET['conviteid'];
	} 
?>
<html>
    <head>
    <title>Detalhes Evento</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
    <style>
#content {
	padding: 0 !important;
}
</style>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    </head>
    <body>
    <div data-role="page" id="index">
      <div data-theme="a" data-role="header">
        <h3> Detalhes </h3>
		<?php include "session_nav.php"; ?>
      </div>
      <div data-role="content" id="content">
		<?php 
		$eventid = $_GET['eventid'];
		//echo $eventid;
		$sql="SELECT * from evento where eventid='$eventid'";
		$result = mysqli_query($link, $sql);
	
		$num_rows= mysqli_num_rows($result);
		if ($num_rows>0){
			$row = mysqli_fetch_array($result);
			echo'<h2>Detalhes Evento</h2>';
			echo'<h2>'.$row['nome'].' </h2>';
			echo'<h3>Data: '.$row['data'].' </h3>';
			echo'<h3>Hora: '.$row['hora'].' </h3>';
			echo'<h3>Local: '.$row['local'].' </h3>';
			echo'<h3>Desricão: '.$row['descricao'].' </h3>';
			echo'<h3>Latitude: '.$row['lat'].' </h3>';
			echo'<h3>Longitude: '.$row['lon'].' </h3>';
			echo'<p><a href="http://maps.google.com/maps?q='.$row['lat'].','.$row['lon'].'&ll='.$row['lat'].','.$row['lon'].'&z=17" data-role="button" data-ajax="false">Mostrar em google maps</a></p>';
			if ($row['userid']!=$user_id){
				$sql2="SELECT * from convite where conviteid='$conviteid'";
				$result2 = mysqli_query($link, $sql2);
				$row2 =mysqli_fetch_array($result2);
				$estado=$row2['estado'];
				if($estado==0){
					echo'<h3> Indeciso </h3>';
					echo '<div data-role="controlgroup">
							<a href="vou.php?conviteid='.$conviteid.'"" data-role="button" data-ajax="false">Vou</a>
							<a href="naovou.php?conviteid='.$conviteid.'" data-role="button" data-ajax="false">Não Vou</a>
						</div>';
				}else if($estado==1){
					echo'<h3> Vou </h3>';
					echo'<a href="naovou.php?conviteid='.$conviteid.'" data-role="button" data-ajax="false">Não Vou</a>';
				} else {
					echo'<h3> Nao Vou </h3>';
					echo'<a href="vou.php?conviteid='.$conviteid.'" data-role="button" data-ajax="false">Vou</a>';
				}
			}else{
				echo '<p><a  href="editarevento.php?eventid='.$eventid.'" data-role="button" data-ajax="false">Editar Evento</a></p>';
				echo '<p><a  href="apagaevento.php?eventid='.$eventid.'" data-role="button" data-ajax="false" >Apagar Evento</a></p>';
				$sql2="SELECT * from convite where eventid='$eventid'";
				$result2 = mysqli_query($link, $sql2);
	
				$num_rows2= mysqli_num_rows($result2);
				if ($num_rows2>0){
					echo '<ul data-role="listview" data-split-icon="gear" data-split-theme="a" data-inset="true">';
						while($row2 = mysqli_fetch_array($result2)){
							echo '<li>';
							echo '<h2>'.$row2['email'].'<h2>';
							if($row2['estado']==1){
								echo '<p>Vai</p>';
							}else if($row2['estado']==2){
								echo '<p>Não vai</p>';
							} else {
								echo '<p>Não decidiu ainda</p>';
							}
							//echo '<a href="#delete" data-rel="popup" data-position-to="window" data-transition="pop">eliminar</a>';
							echo '<a href="eliminaconvite.php?conviteid='.$row2['conviteid'].'" data-role="button" data-inline="true" data-ajax="false">Eliminar</a>';
							echo'</li>';
						}
						echo'</ul>';
				}else{
					echo'Ainda não convidou ninguem';
				}
					
				
				
				echo '<a href="#popupBasic" data-rel="popup" data-role="button">Convidar</a>

					<div data-role="popup" data-corners="true" data-ajax="false" id="popupBasic" style="padding:10px 20px;">
						<form action="convida.php" method="POST">
						email:<br>
						<input type="text" name="email" >
						<br>
						mensagem:<br>
						<input type="text" name="mensagem" >
						<input type="hidden" name="eventid" value="'.$eventid.'" >
						<br><br>
						<input type="submit" data-role="button" data-ajax="false" value="Convidar">
						</form>
					</div>';
				
				
			}
		}else{
			echo'evento não existente';
		}
		?>
        
		
      </div>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> UE </h3>
      </div>
    </div>
</body>
</html>