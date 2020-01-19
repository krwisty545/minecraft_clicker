<?php
session_start();
require_once 'Php/clicker.php';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Wesprzyj</title>
	<meta charset="UTF-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Muli|Raleway|Bebas+Neue&display=swap" rel="stylesheet">
	<script type="text/javascript" src="Js/cookies.js"></script>
</head>
<body>
	<script type="text/javascript" src="Js/clicker.js"></script>
	<div id="header" ><br/><br/>
		<font size="7"><center>Minecraft Clicker&nbsp;</center></font>
		<div id="loginmenuindex">
<br/>
		<span style="cursor:pointer;" onclick="window.open('/nowosci.php')">| Nowosci</span>
<br/>		
		<span><?php echo "| Witaj: ".$_SESSION['user']?>/<a href="/Php/logout.php">Wyloguj</a></span>
		
		</div>
		
	</div>
	<div id="header2" ></div>
	
	
	<div id="container">

	<div id="lcont">
			<h3>Menu:</h3>
			<br/> <!-- 3x<br/> co oddzielną podstrone -->
				
				<a href="index.php" alt="Strona główna" class="nawigacja" id="wyborglowna" onclick="save()">Strona Główna</a>
			<br/><br/><br/>		
				<a href="sklep.php" alt="sklep" class="nawigacja" id="sklep" onclick="save()">Sklep</a>
			<br/><br/><br/>		
				<a href="ekwipunek.php" alt="ekwipunek" class="nawigacja" id="ekwipunek" onclick="save()">Ekwipunek</a>
			<br/><br/><br/>
				<a href="pomoc.php" alt="Pomoc" class="nawigacja" id="pomoc" onclick="save()">Pomoc</a>
			<br/><br/><br/>
				<a href="zglosblad.php" alt="Znalazles blad" class="nawigacja" id="blad" onclick="save()">Znalazłes błąd?</a>
			<br/><br/><br/>
				<a href="wesprzyj.php" alt="Wesprzyj nas" class="nawigacja" id="wesprzyj" onclick="save()">Wesprzyj nas!</a>
			<br/><br/><br/>
				<a href="autorzy.php" alt="autorzy" class="nawigacja" id="autorzy" onclick="save()">Autorzy</a>
			<br/><br/><br/>
			
		</div>

	<div id="maincont" >
				sd


	</div>
	
		<div id="rcont" >
			<h3>Swiat:</h3>
		<br/><br/>
			<a href="index.html" class="nawigacja" id="wyborswiat1">Oak forest</a>
		<br/><br/><br/>
			<a href="world2.html" class="nawigacja" id="swiat2">Small Desert</a>
		</div>
		
	</div>
	
	
		<img src="img/bgfooter.png" id="bgfooter" />
	<div id="footer">
		<!--<a href="#" alt="Miejsce na twoja reklame, wiecej: kontakt." target="_blank"><img src="img/bgad.png" width="800px" height="100px" id="reklama"/></a>-->
		<p id="copyright">	Wszelkie prawa zastrzeżone | 2019 &copy; </p>
		 <!--<a href="index_light.html" id="tryb">Przelacz tryb</a>-->
	</div>
	




</body>
</html>