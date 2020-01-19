<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Logowanie</title>
	<meta charset="UTF-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Muli|Raleway|Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
	<?php
    session_start();
    if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true)){
        header('Location: index.php');
        exit();
    }
    ?>
	<div id="header">
			<br/>
			<font size="7"><center>Minecraft Clicker</center></font>
		<div id="loginmenu"><span id="rejestracja"><a href="rejestracja.php" class="loginweb">Zarejestruj</a></span> &nbsp; | &nbsp; <span id="logowanie"><a href="logowanie.php" class="loginweb">Zaloguj</a></span></div>
	</div>
		<div id="header2"></div>
	
	
	<div id="containerlogin" onmousedown="window.event.returnValue=true;">

	<div id="maincontlogin" >
				
			<div id="menubox" >
				<form method="post" action="Php/login.php">
				<h1>Zaloguj się</h1>
				<br/><br/>
				<span id="nazwaloginu">Login</span><br/>
					<input type="text" name="login" class="menulogowania" />
				<br/><br/>
				<span id="nazwahasla">Hasło</span><br/>
					<input type="password" name="pass" class="menulogowania" />
				<br/><br/>
					<input type="submit" value="Zaloguj" class="menulogowania"/>
				</form>
				<?php
				if(isset($_SESSION['blad'])){
					echo "<br/>	<span class='loginerror' >".$_SESSION['blad']."<b> </b></span><br/>";
					session_unset();
				}else echo "<br/>	<span class='loginerror' ><b> </b></span><br/>";
				echo "<br/>	<span class='loginerror' ><b> </b></span><br/>";
				echo "<br/>	<span class='loginerror' ><b> </b></span><br/>";
				?>
				<span ><a href="rejestracja.php" id="needregister" class="loginweb">Nie masz konta?</span>
				<span ><a href="#" id="forgotpass" class="loginweb">Zapomniałeś hasła?</a></span>
				
			</div>

	</div>
	
		
	</div>
	
<div id="footerbottom"></div>
	


</script>
</body>
</html>