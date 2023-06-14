<?php
$header = <<<HTML
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
		<link rel="icon" href="resources/favicon.ico" type="image/x-icon" />
		<title>FlexEvent</title>
	</head>
	<body id ="$bodyId">
		<header>
			<div id="identity">
				<div id="logo">
					<a href="index.php">
						<img src="resources/logo.png" alt="Firmenlogo" />
					</a>
				</div>
				<a href="index.php" id="firmenname">FLEXEVENT</a>
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
							<a href="index.php" id="home"> Startseite </a>
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
HTML;
echo $header;
?>