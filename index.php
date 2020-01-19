<?php
session_start();
require_once 'Php/clicker.php';
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Strona Główna</title>
	<meta charset="UTF-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Muli|Raleway|Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="icon" href="img/icons/click.ico" type="image/x-icon">
	
</head>
<body onload="clicker('pointsperclick')">
	<?php
	if(!(isset($_SESSION['zalogowany']))){
		header('Location: /logowanie.php');
		exit();
	}
	?>
	
	<div id="backheader1"></div>
	<div id="header" ><br/><br/>
		
		<font size="7"><center>Minecraft Clicker&nbsp;</center></font>
		<div id="loginmenuindex">
<br/>
		<span style="cursor:pointer;" onclick="window.open('/nowosci.php')">| Nowosci</span>
<br/>		
		<span><?php echo "| Witaj: ".$_SESSION['user']?>/<a href="/Php/logout.php">Wyloguj</a></span>
		
		</div>
		
	</div>
	<div id="backheader2"></div>
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
		<div id="statsfull">
		
			<div id="statstxt">
				<center><h1>Statystyki</h1>
				<hr width="220px" color="white" size="1"></center>
					<font size="2"><p id="statslist">
					<br/>Ilosc punktów na kliknięcie: <span id="ppc">0</span>
					<br/>Ilosc punktów co 3 sekundy: <span id="pft">0</span>
					<br/>Łączny EXP: <span id="exp">0</span>
					<br/>Ilość EXP do następnego poziomu: <span id="exp_nextlvl">0</span>
					<br/>Brakujacy EXP do poziomu: <span id="exp_needed">0</span>
					<!--<br/>Ilość zakupionych rzeczy <span id="ilekupione">0</span>
					<br/>S
					<br/>S
					</font>-->
					</font>			</p>
			</div>
		</div>
		
			<div id="fullclickbox">
		
		<img src="img/shop/arr_left.png" class="levelarrows" id="levelleftarr" onclick="select_block(-1)"/>
		<img src="img/shop/arr_right.png" class="levelarrows" id="levelrightarr" onclick="select_block(1)"/>
				<div id="clickbox" onClick="clicker('pointsperclick')">
				
				<Br/><br/><br/><br/><br/>
					<img src="/img/blocks/0.png" id="postac"  width="128px" height="128px">
				</div>
				
					<br/>
						<progress value="0" max="20" id="progress"></progress>
					<br/>
					<br/>
					
						<b>Punkty:</b><div id="punkty">0</div></left>
						<b>Poziom:</b><div id="poziom">0</div></center>
		
		
			</div>
		<div id="rankfull">
			<div id="ranktxt">
				<h1>Top 10:</h1>
			<center><hr width="220px" color="white" size="1"></center>	
				<font size="3px">
					<?php
					require_once "Php/ranking.php";
					?>
				</font>
			</div>
		</div>
		</div>

		<div id="rcont" >
			<h3>Swiat:</h3>
		<br/><br/>
			<a href="index.html" class="nawigacja" id="wyborswiat1" onclick="SaveProgress()">Oak forest</a>
		<br/><br/><br/>
			<a href="world2.html" class="nawigacja" id="swiat2" onclick="SaveProgress()">Small Desert</a>
		</div>
		
	</div>
	

	
	<div id="footer" >
	<div id="footer2" ></div>
	</div>
	<div id="footerbottom"></div>
		
	<script type="text/javascript" src="Js/clicker.js"></script>
	<script type="text/javascript" src="Js/save+interface.js"></script>
</body>
</html>