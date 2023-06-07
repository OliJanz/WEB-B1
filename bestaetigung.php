<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="style.css" />
		<link
			rel="shortcut icon"
			href="resources/favicon.ico"
			type="image/x-icon"
		/>
		<link rel="icon" href="resources/LogoIcon.png" type="image/x-icon" />
		<title>FlexEvent</title>
	</head>
	<body>
		<header>
			<div id="identity">
				<div id="logo">
					<a href="index.html">
						<img src="resources/logo.png" alt="Firmenlogo" />
					</a>
				</div>
				<a href="index.html" id="firmenname">FLEXEVENT</a>
			</div>
			<input type="text" placeholder="Suchen" id="suchfeld" />
			<div id="mobile">
				<div id="mobileSearch">
					<input type="checkbox" name="" id="suchCheck" />
					<img
						src="resources/searchico.png"
						alt="Suchen"
						id="mobileSearchIcon"
					/>
					<input
						type="text"
						placeholder="Suchen"
						id="mobileSuchfeld"
					/>
				</div>
				<div id="hamburgerMenu">
					<input type="checkbox" name="" id="hamburgerCheck" />
					<div id="hamburgerLines">
						<span class="line" id="line1"></span>
						<span class="line" id="line2"></span>
						<span class="line" id="line3"></span>
					</div>
					<ul id="hamburgerList">
						<li class="hamburgerItem">
							<a href="ueber_uns.html" id="aboutUs"> Über uns </a>
						</li>
						<li class="hamburgerItem">
							<a href="datenschutz.html" id="datenschutz">
								Datenschutz
							</a>
						</li>
						<li class="hamburgerItem">
							<a href="index.html" id="home"> Startseite </a>
						</li>
						<li class="hamburgerItem">
							<a href="impressum.html" id="impressum">
								Impressum
							</a>
						</li>
						<li class="hamburgerItem">
							<a href="agb.html" id="agb"> AGB </a>
						</li>
					</ul>
				</div>
			</div>
		</header>
		<main class="image-center"> 

		<?php 

		//Prüfung der Eingaben 
		function checkFirstName(){
		$vornameRegex = "/^[A-ZÄÖÜ](?!.*([a-zA-Zäöüß -])\1{2})[a-zA-Zäöüß -]{0,19}$/"; 

		//An den Server verschickte Daten(Vornamen) in Arrays speichern 
		$vorname = $_GET["firstname"]; 
		
		if(!(preg_match($vornameRegex, $vorname))) { 
			//Verbindung zur Datenbank 
			$servername = "141.19.142.9"; 
			$username = "web_b-1"; 
			$password = "Uo3oa7ac"; 
			$dbname = ""; 
		} 
		//else {  //Nur zum probieren, später löschen: 
		//	echo("HAAAAALLLLOOOOOOOOOORichtig: Vorname"); //Eigentlich Bestätigung mit Grünem Haken 
		//}		
	}

		function checkLastname() { 
		$nachnameregex = "/^[A-ZÄÖÜ](?!.*([a-zA-Zäöüß -])\1{2})[a-zA-Zäöüß -]{0,19}$/"; 
			//An den Server verschickte Daten in Arrays speichern 
		$nachname= $_GET["lastname"]; 

		if(!(preg_match($nachnameregex, $nachname))) { 
			exit("EXITTTTTTTTT");   
		}
		//else{
	//		echo("danke"); 
	//	} 
		} 
		
checkFirstName();  
checkLastname(); 
		?>

			<h1 id="textBuchung">Buchung erfolgreich!</h1>
			<img
				src="resources/check.png"
				alt="Grüner Haken"
				class="image-center"
				id="check"
			/>

			<br />
		</main>
		<footer>
			<ul id="footerList">
				<a href="ueber_uns.html">
					<li class="footerItem">
						<span>Über uns</span>
					</li>
				</a>
				<a href="datenschutz.html">
					<li class="footerItem">
						<span>Datenschutz</span>
					</li>
				</a>
				<a href="index.html">
					<li class="footerItem">
						<span>Startseite</span>
					</li>
				</a>
				<a href="impressum.html">
					<li class="footerItem">
						<span>Impressum</span>
					</li>
				</a>
				<a href="agb.html">
					<li class="footerItem">
						<span>AGB</span>
					</li>
				</a>
			</ul>
		</footer>
	</body>
</html>
