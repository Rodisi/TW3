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
        <h3> Login </h3>
      </div>
      <div data-role="content" id="content">
        <form action="login.php" data-ajax="false">
          <h3>Login</h3>
          <p>
            <label>Email</label>
            <input type="text" name="username" id="username">
          </p>
          <p>
            <label>Password</label>
            <input type="password" name="password" id="password">
          </p>
            <input type="submit" data-role="button" data-inline="true" value="LOGIN">
          </p>
        </form>
		<p><a href="registo.php" data-role="button" data-inline="true" data-ajax="false">registrar</a></p>
      </div>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> UE </h3>
      </div>
    </div>
</body>
</html>