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
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
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
              center: new google.maps.LatLng(38.50, -90.50),
              mapTypeId: google.maps.MapTypeId.ROADMAP
           });
		   
			
			
			var latlng = new google.maps.LatLng(10,10);
				
				map.setCenter(latlng);
				var marker = new google.maps.Marker({
				position: latlng,
				map: map,
				title: 'Hello World!'
				});
				infowindow = new google.maps.InfoWindow();
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
        <h3> Detalhes </h3>
		<?php include "session_nav.php"; ?>
      </div>
      <div data-role="content" id="content">
        <div >
		<h3>Detalhes Evento</h3>
		<p>Nome.</p>
		<p>local.   </p>
		<p><a href="http://maps.google.com/maps?q=35.128061,-106.535561&ll=35.126517,-106.535131&z=17" data-role="button" data-inline="true" data-ajax="false">Mostrar em google maps</a></p>
		<p>hora.</p>
		<p>descriçâo.</p>
		<p><a href="index.html" data-role="button" data-inline="true" data-ajax="false">Vou</a>
		<a href="index.html" data-role="button" data-inline="true" data-theme="b" data-ajax="false">Não vou</a></p>
		<p><a href="criarEvento.php" data-role="button" data-inline="true" data-ajax="false">Editar Evento</a></p>
		<a href="#popupBasic" data-rel="popup" data-role="button" data-inline="true">Convidar</a>

		<div data-role="popup" data-corners="true" id="popupBasic">
			<form action="convida.php">
			email:<br>
			<input type="text" name="email" ">
			<br>
			mensagem:<br>
			<input type="text" name="mensagem" ">
			<br><br>
			<input type="submit" data-role="button" value="Convidar">
			</form>
		</div>
		</div>
        <div id="map_canvas" style="height:50%"></div>
		
      </div>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> UE </h3>
      </div>
    </div>
</body>
</html>