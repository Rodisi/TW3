<!DOCTYPE html>
<?php session_start(); 

include 'config.php'; 
if(isset($_SESSION['user_id'])){
	
	header("Location: userpage.php");
}
if (isset($_GET['err'])){
	$err=$_GET['err'];
}
?>
<html>
    <head>
    <title>Login</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
	
	<script>
		var erro = <?php echo $err ?>;
		if (erro==1){
			alert('erro login')
		}
	</script>
	
      <div  data-role="header">
        <h3> Login </h3>
      </div>
      <div data-role="content" id="content">
        <form action="login.php" method="post" data-ajax="false">
          <h3>Login</h3>
          <p>
            <label>Email</label>
            <input type="text" name="username" id="username">
          </p>
          <p>
            <label>Password</label>
            <input type="password" name="password" id="password">
          </p>
            <input type="submit" data-role="button" data-inline="false" value="LOGIN">
          </p>
        </form>
		<p><a href="registo.php" data-role="button" data-inline="false" data-ajax="false">registrar</a></p>
      </div>
      <div data-theme="a" data-role="footer" data-position="fixed">
        <h3> UE </h3>
      </div>
    </div>
</body>
</html>