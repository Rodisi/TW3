<!DOCTYPE html>
<?php session_start(); 

include 'config.php'; 

if(isset($_SESSION['user_id'])){
	
	$user_id=$_SESSION['user_id'];
	
}else{
	header("Location: index.php?err=1");
}
if(isset($_GET['eventid'])){
	$eventid=$_GET['eventid'];
	
}
$sql2="SELECT * FROM evento WHERE eventid = '$eventid'";
		$result2 = mysqli_query($link, $sql2);
		$row2= mysqli_fetch_array($result2);
		$lat = $row2['lat'];
		$lon = $row2['lon'];
		$nomeevento = $row2['nome'];
		$data = $row2['data'];
		$hora = $row2['hora'];
		$descricao = $row2['descricao'];
		$local = $row2['local'];
	
?>
<html>
    <head>
    <title>Editar evento</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
    <style>
#content {
	padding: 0 !important;
}
</style>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&libraries=places""></script>
    <script>
		var map;
		var infowindow = new google.maps.InfoWindow();
		var marker;
		

        $(document).on('pageshow', '#index',function(e,data){
			
			
				
         
            $('#content').height(getRealContentHeight());
             
           // This is the minimum zoom level that we'll allow
           var minZoomLevel = 16;
		   
 
			  map = new google.maps.Map(document.getElementById('map_canvas'), {
              zoom: minZoomLevel,
              center: new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lon ;?>),
              mapTypeId: google.maps.MapTypeId.ROADMAP
           });
		    google.maps.event.addListener(map, "click", function (e) {
				
				var clicklatLng = e.latLng;
				//alert(clicklatLng);
				  var geocoder = new google.maps.Geocoder();
				  geocoder.geocode({'latLng': clicklatLng}, function(results, status) {
					  //alert(clicklatLng);
					if (status == google.maps.GeocoderStatus.OK) {
					  if (results[1]) {
						marker = new google.maps.Marker({
							position: clicklatLng,
							map: map
						});
						$("#local").val(results[1].formatted_address);
						$("#lat").val(clicklatLng.lat());
						$("#lon").val(clicklatLng.lng());
						infowindow.setContent(results[1].formatted_address);
						infowindow.open(map, marker);
						
					  } else {
						alert('No results found');
					  }
					} else {
					  alert('Geocoder failed due to: ' + status);
					}
				  });
				

				});
		   
			
			
			
        });
 
        function getRealContentHeight() {
            var header = $.mobile.activePage.find("div[data-role='header']:visible");
            var footer = $.mobile.activePage.find("div[data-role='footer']:visible");
            var content = $.mobile.activePage.find("div[data-role='content']:visible:visible");
            var viewport_height = $(window).height();
 
            var content_height = viewport_height - header.outerHeight() - footer.outerHeight();
            if((content.outerHeight() - header.outerHeight() - footer.outerHeight()) <= viewport_height) {
                content_height -= (content.outerHeight() - content.height());
            } 
            return content_height;
        }
    </script>
    </head>
    <body>
    <div data-role="page" id="index">
      <div data-theme="a" data-role="header">
        <h3> Editar Evento </h3>
		<?php include "session_nav.php"; ?>
      </div>
      <div data-role="content" id="content">
		
		
        <form action="criaevento.php" method="post" data-role="collapsible" data-ajax="false" id="over_map">
          <h3>Dados evento</h3>
		  <p>
            <label>Nome Evento</label>
            <input type="text" name="nomeEvento" id="nomeEvento" value="<?php echo $nomeevento;?>">
          </p>
		  <p>
            <label>data</label>
            <input type="date" data-role="date" data-inline="true" name="data" id="data" value="<?php echo $data;?>">
          </p>
		  <p>
            <label>Hora</label>
            <input type="time" name="hora" id="hora" value="<?php echo $hora;?>">
          </p>
		  <p>
            <label>Descricao</label>
            <input type="text" name="descricao" id="descricao" value="<?php echo $descricao;?>">
          </p>
          <p>
            <input type="hidden" name="lat" id="lat" value="<?php echo $lat;?>">
          </p>
          <p>
            <input type="hidden" name="lon" id="lon" value="<?php echo $lon;?>">
          </p>
		  <p>
            <input type="hidden" name="eventid" id="eventid" value="<?php echo $eventid;?>">
          </p>
          <p>
            <label>Local</label>
            <input type="text" name="local" id="local" value="<?php echo $local;?>">
          </p>
          <p>
            <input type="submit" value="GRAVAR">
          </p>
        </form>
        <div id="map_canvas" style="height:90%"></div>
      </div>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> UE </h3>
      </div>
    </div>
</body>
</html>