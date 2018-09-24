<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Exi@store - Commande</title>
	</head>
	<body>
	<header>
	<h1>Exiastore Exi@store</h1>					<!--référencement-->
	<h2>Vente en ligne de produits culturels</h2>	<!--référencement-->
	<a href="?page=accueil" id="accueil"></a>
	<div id="session">
		<ul class="nav">
			<li class="nav-item" id="bienvenue"><p>Commande </p></li>
			<li class="nav-item" id="insc"><a href="?page=monCompte">Mon compte</a></li>
			<li class="nav-item" id="ident"><a href="?page=deconnexion">Se déconnecter</a></li>
			<li class="nav-item" id="insc"><a href="?page=accueil">Retour à la liste des articles</a></li>
		</ul>
	</div>
	</header>
	<div class="commande">
		<h1><span style="color:grey;">Etape 1 |</span> Etape 2 <span style="color:grey;">| Etape 3 | Etape 4</span></h1>
		<a href="?page=commande&etape=1" class="btn btn-danger">&lt;&lt; Retour à l'étape précédente</a>
		<h2>Vos coordonnées bancaires :</h2>
		
		<p>Le paiement par carte bancaire est obligatoire. Les types de cartes acceptés sont : Visa, Master Card.</p>
<?php
if($erreur == 1) { // Si il y a une erreur, un message s'affiche
?>
		<div class="message erreur"><strong>Erreur : </strong><?php echo $msgErreur; ?></div>
<?php
}
?>

		<form action="?page=commande&etape=3" method="POST">
			<fieldset>
				<legend><h2>Coordonnées bancaires</h2></legend>
				<label>Type de carte : </label><select name="typeCarte">
					<option value="Visa">Visa</option>
					<option value="Master Card">Master Card</option>
				</select><br/><br/>
				<label>Numéro de carte :</label> <input type="text" name="numeroCarte" maxlength="16" /> (16 chiffres)<br/>
				<label>Date d'expiration :</label> <input type="month" name="dateValidite"/> (année-mois)<br/><br/>
				<input type="submit" value="Valider mes coordonnées bancaires" class="btn btn-success"/>
			</fieldset>
		</form>
		</div>
		<footer>
		<div id="footer_main">
				<ul>
					<li><a id="accueilfoot" href="?page=accueil"></a></li>
					<li><a class="social" id="fb" href="#"></a></li>
					<li><a class="social" id="tweet" href="#"></a></li>
					<li><a class="social" id="rss" href="#"></a></li>
					<li><a class="social" id="and" href="#"></a></li>
				</ul>	
		</div>
		
		<div id="footer_links">
			<a href="#">A propos</a>
			<a href="#">Presse</a>
			<a href="#">Droits d'auteur</a>
			<a href="#">Créateurs</a>
			<a href="#"></a>
		</div>
		
		<div id="footer_links2">
			<a href="#">Conditions d'utilisation</a>
			<a href="#">Mentions légales</a>
			<a href="#">Règles et sécurité</a>
			<a href="#">TPs</a>
			<p>©2015 Viodier prod</p>
	
		</div>
	</footer>
	</body>
</html>