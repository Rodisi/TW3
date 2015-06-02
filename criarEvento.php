<!DOCTYPE html>

<head>
	<title>Eventos</title>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
</head>
<body>
<header data-role="header"><h1>Criar Evento</h1></header>

<div data-role="content">
	<form action="envia.php" data-ajax="false">
		<p><label>Lat</label><input type="text" name="lat" id="lat"></p>
		<p><label>Lon</label><input type="text" name="lon" id="lon"></p>
		<p><label>Local</label><input type="text" name="local" id="local"></p>
		<p><input type="submit" value="GRAVAR"></p>
	
	</form>
</div>

<footer data-role="footer" data-position="fixed">UE</footer>


<script>
function sucesso(pos) {
	var lat= pos.coords.latitude;
	var lon= pos.coords.longitude;
	var acc= pos.coords.accuracy;
	var alt= pos.coords.altitude;
	var altacc= pos.coords.altitudeAccuracy;
	var latlng = new google.maps.LatLng(lat,lon);
	var geocoder = new google.maps.Geocoder();
	$("#lat").val(lat);
	$("#lon").val(lon);
	geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[0]) {
		  $("#local").val(results[0].formatted_address);
      } else {
        alert('No results found');
      }
    } else {
      alert('Geocoder failed due to: ' + status);
    }
  });
}



function erro(){
	alert("Ocorreu um erro");
}


options={timeout: 60000, enableHighAccuracy: true}

navigator.geolocation.getCurrentPosition( sucesso, erro, options);

</script>
</body>
</html>
