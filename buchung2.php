<?php
$bodyId = 'body-buchung';
include 'header.php';
<<<HTML
<main>
			<form id="buchungsForm" method="POST" action="/bestaetigung.html">
				<div class="formular">
					<h3 id="form-headline">
						Zu Kontaktzwecken, sowie der Bestätigung des
						Buchungsvertrages brauchen wir noch ein paar Daten von
						Ihnen:
					</h3>
					<div class="inputs-container">
						<div class="form-box" id="firstname">
							<label for="vorname">Vorname:</label>
							<input
								type="text"
								name="firstname"
								id="vorname"
								required
							/>
							<span class="falscheEingabe" id="falscherVorname"
								>Bitte geben Sie einen gültigen Vornamen
								ein.</span
							>
							
						</div>
						<div class="form-box" id="lastname">
							<label for="nachname">Nachname:</label>
							<input
								type="text"
								name="lastname"
								id="nachname"
								required
							/>
							<!--	<span class="falscheEingabe" id="falscherNachname"
								>Bitte geben Sie einen gültigen Nachnamen
								ein.</span
							> -->
							<span class="falscheEingabe" id="falscherNachname">
								
							</span>
							
						</div>
						<div class="form-box" id="email">
							<label for="emailAdresse">E-Mail:</label>
							<input
								type="email"
								name="email"
								id="emailAdresse"
								required
							/>
							<span class="falscheEingabe" id="falscheEmail"
								>Bitte geben Sie eine gültige E-Mail Adresse
								ein.</span
							>
						</div>
					</div>
					<div>
						<div class="form-box check-box">
							<input
								type="checkbox"
								id="agb"
								name="agb"
								required
							/>
							<label for="agb"
								>Ich habe die
								<a href="/agb.html">AGB's</a> gelesen und
								akzeptiere diese</label
							>
						</div>
						<div class="form-box check-box">
							<input
								type="checkbox"
								id="datenschutz"
								name="datenschutz"
								required
							/>
							<label for="datenschutz"
								>Ich habe die
								<a href="/datenschutz.html"
									>Datenschutzverordnung</a
								>
								gelesen und akzeptiere diese</label
							>
						</div>
					</div>
					<div class="form-box">
						<input
							type="hidden"
							name="validationResult"
							id="validationResult"
							value=""
						/>
						<button type="submit" id="verbindlichBuchen">
							Verbindlich buchen
						</button>
					</div>
				</div>
			</form>
		</main>
HTML;
include 'footer.php';
echo '<script src="eingabe_pruefen.js"></script>';