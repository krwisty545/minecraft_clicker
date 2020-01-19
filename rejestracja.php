<?php
session_start();

if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true)){
	header('Location: index.php');
	exit();
}

if (isset($_POST['nick']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność nickname'a
		$nick = $_POST['nick'];
		
		//Sprawdzenie długości nicka
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		
		//Sprawdź poprawność hasła
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		
		if ((strlen($pass1)<8) || (strlen($pass1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($pass1!=$pass2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		$haslo_hash = password_hash($pass1, PASSWORD_DEFAULT);
		
		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Pole wymagane!";
		}				
		
		//Bot or not? Oto jest pytanie!
		$sekret = "6LeBSsQUAAAAAGBu5sjAZEwyBvnrN4HOudX7wOMp";
		
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz = json_decode($sprawdz);
		
		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}		
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_pass1'] = $pass1;
		$_SESSION['fr_pass2'] = $pass2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "Php/connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy nick jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
				}
				
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if ($polaczenie->query("INSERT INTO uzytkownicy (id,user,pass,date,time) VALUES (NULL,'$nick','$haslo_hash',CURRENT_DATE,CURRENT_TIME)"))
					{
						$data=$polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
						$data=$data->fetch_assoc();
						$polaczenie->query("INSERT INTO user_items (user_id) VALUES (".$data['id'].")");
						$polaczenie->query("INSERT INTO user_materials (user_id) VALUES (".$data['id'].")");
						$_SESSION['udanarejestracja']=true;
						header('Location: /logowanie.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			//echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Rejestracja</title>
	<meta charset="UTF-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Muli|Raleway|Bebas+Neue&display=swap" rel="stylesheet">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
	
	<div id="header">
			<br/>
			<font size="7"><center>Minecraft Clicker</center></font>
		<div id="loginmenu"><span id="rejestracja"><a href="rejestracja.php" class="loginweb">Zarejestruj</a></span> &nbsp; | &nbsp; <span id="logowanie"><a href="logowanie.php" class="loginweb">Zaloguj</a></span></div>
	</div>
		<div id="header2"></div>
	
	
	<div id="containerlogin" onmousedown="window.event.returnValue=true;">

	<div id="maincontlogin" >
				
			<div id="menubox" >
				<form method="post">
				<h1>Zarejestruj się</h1>
				<br/>
				<span id="nazwaloginu">Login</span><br/>
					<input type="text" class="menulogowania" name="nick" />
					<?php
						if (isset($_SESSION['e_nick']))
						{
							echo '<div class="loginerror">'.$_SESSION['e_nick'].'</div><br/>';
							unset($_SESSION['e_nick']);
						}else{
							echo "<br/><br/>";
						}
					?>
				<span id="nazwahasla">Hasło</span><br/>
					<input type="password" class="menulogowania" name="pass1" />
				<br/><br/>
				<span id="powtorzhaslo">Powtórz hasło</span><br/>
					<input type="password" class="menulogowania" name="pass2" />	
					<?php
						if (isset($_SESSION['e_haslo']))
						{
							echo '<div class="loginerror">'.$_SESSION['e_haslo'].'</div><br/>';
							unset($_SESSION['e_haslo']);
						}else{
							echo "<br/><br/>";
						}
					?>
					<label for="regulamin">Akceptuje <a href="regulamin.html" style="color:green;">regulamin</a><input type="checkbox" name="regulamin"/></label>
					<?php
						if (isset($_SESSION['e_regulamin']))
						{
							echo '<div class="loginerror">'.$_SESSION['e_regulamin'].'</div><br/>';
							unset($_SESSION['e_regulamin']);
						}else{
							echo "<br/><br/>";
						}
					?>	
				<div class="g-recaptcha" data-sitekey="6LeBSsQUAAAAACAzJ9zR9Y_X8WEuUis4mzNJUDoC"></div><br>
				<?php
					if (isset($_SESSION['e_bot']))
					{
						echo '<div class="loginerror">'.$_SESSION['e_bot'].'</div>';
						unset($_SESSION['e_bot']);
					}
				?>	
					<input type="submit" value="Zarejestruj" class="menulogowania"/>
				</form>
				<br/>	<span class="loginerror" ><b> </b></span><br/>
				<br/>	<span class="loginerror" ><b> </b></span><br/>
				<br/>	<span class="loginerror" ><b> </b></span><br/>
					<span ><a href="logowanie.php" id="haveacc" class="loginweb">Posiadasz już konto?</a></span>
			</div>

	</div>
	
		
	</div>
	



	<script type="text/javascript" src="Js/clicker.js"></script>

</body>
</html>