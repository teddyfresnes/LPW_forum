<?php include 'header.php'; ?>
	<h1>Création d'un User</h1>
	<hr/>
	<section id="main-section">
		<form action="index.php?ctrl=User&action=create" method="POST">
			<label>Mail :</label><br/>
			<input type="email" name="email"placeholder="Mail.."/><br>
			<label>Mot de passe :</label><br/>
			<input type="password" name="password"placeholder="Mot de passe.."/><br>
			<label>Nom :</label><br/>
			<input type="text" name="lastName"placeholder="Nom.."/><br>
			<label>Prénom :</label><br/>
			<input type="text" name="firstName"placeholder="Prénom.."/><br>
			<label>Adresse :</label><br/>
			<input type="text" name="address"placeholder="Adresse.."/><br>
			<label>Code Postal :</label><br/>
			<input type="text" name="postalCode"placeholder="Code Postal.."/><br>
			<label>Ville :</label><br/>
			<input type="text" name="city"placeholder="Ville.."/><br>
			<label>Pays :</label><br/>
			<input type="text" name="country"placeholder="Pays.."/><br>
			<p>
				<input type="submit" class="submit-btn" value="Créer/Valider">
			</p>
		</form>
	</section>
<?php include "footer.php" ?>