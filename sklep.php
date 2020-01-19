<?php
session_start();
require_once 'Php/clicker.php';
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Sklep</title>
	<meta charset="UTF-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Muli|Raleway|Bebas+Neue&display=swap" rel="stylesheet">
	
	<link rel="icon" href="img/icons/sklep.ico" type="image/x-icon">

</head>
<body onload="select_page(0)">
	<?php
	if(!(isset($_SESSION['zalogowany']))){
		header('Location: /logowanie.php');
		exit();
	}
	?>
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
	
	
	<div id="containershop">

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

		<div id="maincontshop" >
				<div id="itembox">
				
					<h1>>-- = Sklep = --<</h1>
				
					<div id="items1">
					
						
							
								<img src="img/shop/default.png" alt="woodenpickaxe" width="150px" height="150px" class="itemysklep" id="1img"/><br/>
									<b>Koszt:</b> <span id="1price"></span> pkt.<br/>
									<b>Ilość: </b><span id="1amount"></span><br/>
									<b>Gives: <span id="1give"></span></b>

								<hr width="300px" color="black" size="3">
							<br/><br/>
								
								<img src="img/shop/default.png" alt="ironpickaxe" width="150px" height="150px" class="itemysklep" id="3img"/><br/>
								<b>Koszt:</b> <span id="3price"></span> pkt.<br/>
								<b>Ilość: </b><span id="3amount"></span><br/>
								<b>Gives: <span id="3give"></span></b>			
								
								<hr width="300px" color="black" size="3">
							
								
								<img src="img/shop/arr_left.png" width="50px" height="50px" class="sklepstrzalki" id="lnavshop" onclick="select_page(-1)"/>
								<img src="img/shop/arr_right.png" width="50px" height="50px" class="sklepstrzalki" id="rnavshop" onclick="select_page(1)"/>
					</div>
					
					<div id="items2">
									
					
								<img src="img/shop/default.png" alt="stonepickaxe" width="150px" height="150px" class="itemysklep" id="2img"/><br/>
									
								<b>Koszt:</b> <span id="2price"></span> pkt.<br/>
								<b>Ilość: </b><span id="2amount"></span><br/>
								<b>Gives: <span id="2give"></span></b>

							<hr width="300px" color="black" size="3">
							<br/><br/>
					
								<img src="img/shop/default.png" alt="diamondpickaxe" width="150px" height="150px" class="itemysklep" id="4img"/><br/>
									
								<b>Koszt:</b> <span id="4price"></span> pkt.<br/>
								<b>Ilość: </b><span id="4amount"></span><br/>
								<b>Gives: <span id="4give"></span></b>				
					
							<hr width="300px" color="black" size="3">
						
									<div id="punktybox"><b>Punkty:</b><div id="punkty">0</div></left></div>
										<p id="stronas">Strona <span id="nr_strony">0</span></p>
					</div>
						
				</div>
			
		</div>
		
		<div id="rconts" >
			<h3>Swiat:</h3>
		<br/><br/>
			<a href="index.php" class="nawigacja" id="wyborswiat1" onclick="SaveProgress()">Oak forest</a>
		<br/><br/><br/>
			<a href="world2.html" class="nawigacja" id="swiat2" onclick="SaveProgress()">Small Desert</a>
		</div>

	</div>




	
	
	<script type="text/javascript" src="Js/save+interface.js"></script>
	<script type="text/javascript" src="Js/shop.js"></script>

</body>
</html>