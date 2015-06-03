<!DOCTYPE html>
<html>
<head>
    <title>Criar evento</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" /> 
    <style>
        #content {
            padding: 0 !important;
        }
		

    </style>
    </style>  
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&libraries=places""></script>   
    <script>
		var map;
		var infowindow;
        $(document).on('pageshow', '#index',function(e,data){
			
			
				
         
            $('#content').height(getRealContentHeight());
             
           // This is the minimum zoom level that we'll allow
           var minZoomLevel = 16;
		   
 
			  map = new google.maps.Map(document.getElementById('map_canvas'), {
              zoom: minZoomLevel,
              center: new google.maps.LatLng(38.50, -90.50),
              mapTypeId: google.maps.MapTypeId.ROADMAP
           });
			
			
			var latlng = new google.maps.LatLng(lat,lon);
			function sucesso(pos) {
				var lat= pos.coords.latitude;
				var lon= pos.coords.longitude;
				var acc= pos.coords.accuracy;
				var alt= pos.coords.altitude;
				var altacc= pos.coords.altitudeAccuracy;
				
				var request = {
				location: latlng = new google.maps.LatLng(lat,lon),
				radius: 500
				};
				$("#lat").val(lat);
				$("#lon").val(lon);
				
				map.setCenter(latlng);
				infowindow = new google.maps.InfoWindow();
				var service = new google.maps.places.PlacesService(map);
				service.nearbySearch(request, callback);
				function callback(results, status) {
				if (status == google.maps.places.PlacesServiceStatus.OK) {
					//("#local").val(results[0].name);
					for (var i = 0; i < results.length; i++) {
					createMarker(results[i]);
							}
						}
					}
				function createMarker(place) {
				var placeLoc = place.geometry.location;
			  var marker = new google.maps.Marker({
				map: map,
				position: place.geometry.location
			  });

			  google.maps.event.addListener(marker, 'click', function() {
				infowindow.setContent(place.name);
				infowindow.open(map, this);
				$("#local").val(place.name);
			  });
}
			}
			



			function erro(){
				alert("Ocorreu um erro");
			}


			options={timeout: 60000, enableHighAccuracy: true}

			navigator.geolocation.getCurrentPosition( sucesso, erro, options);
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
            <h3>
                UE
            </h3>
        </div>
 
        <div data-role="content" id="content">
            <div id="map_canvas" style="height:50%"></div>
			<form action="envia.php" data-ajax="false">
		<p><label>Lat</label><input type="text" name="lat" id="lat"></p>
		<p><label>Lon</label><input type="text" name="lon" id="lon"></p>
		<p><label>Local</label><input type="text" name="local" id="local"></p>
		<p><input type="submit" value="GRAVAR"></p>
	
	</form>
			
        </div>
		
		
 
        <div data-theme="a" data-role="footer" data-position="fixed">
            <h3>
                UE
            </h3>
        </div>
    </div>
</body>
</html>   