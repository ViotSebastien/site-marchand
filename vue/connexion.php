<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Exi@store - Connexion</title>
	</head>
	<body>
	<header>
	<h1>Exiastore Exi@store</h1>					<!--référencement-->
	<h2>Vente en ligne de produits culturels</h2>	<!--référencement-->
	<a href="?page=accueil" id="accueil"></a>
	<div id="session">
		<ul class="nav">
			<li class="nav-item" id="bienvenue"><p>Connexion <?php echo $user['pnomUser']; ?></p></li>
			<li class="nav-item" id="insc"><a href="?page=accueil">Retour accueil</a></li>
		</ul>
	</div>
	</header>
	<div class="pageconnexion">
<?php
if($erreur == 1) { // Si il y a une erreur, un message s'affiche
	echo '<span style="color:red;">'.$message_erreur.'</span>';
}

?>

		<form action="?page=connexion" method="POST">
			<p>
				<label>Login :</label> <input type="text" name="login" autocomplete="off"/><br/>
				<label>Mot de passe :</label> <input type="password" name="mdp" autocomplete="off"/><br/>
				<input type="submit" value="Se connecter" class="btn btn-primary"/>
			</p>
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