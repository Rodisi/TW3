<!DOCTYPE html>
<?php session_start(); 

include 'config.php'; 
?>
<html>
    <head>
    <title>Minha página</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
	
      <div  data-role="header">
        <h3> Minha Pagina </h3>
		<?php include "session_nav.php"; ?>
      </div>
      <div data-role="content" id="content">
        <a href="userinvites.php" class="ui-btn" data-ajax="false">Meus Convites</a>
		<a href="userevents.php" class="ui-btn"data-ajax="false">Meus Eventos</a>
      </div>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> UE </h3>
      </div>
    </div>
</body>
</html>