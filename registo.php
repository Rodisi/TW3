<!DOCTYPE html>
<html>
    <head>
    <title>Login</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	
      <div  data-role="header">
        <h3> UE </h3>
      </div>
      <div data-role="content" id="content">
        <form action="regista.php" method="post" data-ajax="false">
          <h3>Registo</h3>
		  <p>
            <label>Nome</label>
            <input type="text" name="nome" id="nome">
          </p>
          <p>
            <label>Email</label>
            <input type="text" name="email" id="email">
          </p>
          <p>
            <label>Password</label>
            <input type="password" name="pass" id="pass">
          </p>
            <input type="submit" data-role="button" value="Registrar">
          </p>
        </form>
      </div>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> UE </h3>
      </div>
    </div>
</body>
</html>