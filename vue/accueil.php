<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css" />
		
		<title>Exi@store - Accueil</title>
	</head>
<body>
<?php
	$nbArticles=count($_SESSION['panier']['idArticle']);
	$prixTotal=0;
	for ($i=0; $i < $nbArticles; $i++) {
	$article = get_article($_SESSION['panier']['idArticle'][$i]);

	$style = ($i%2 == 0)?'pair':'impair';

	$prix = $article['prixArticle'] * $_SESSION['panier']['qteArticle'][$i];
	$prixTotal += $prix;
	}
?>
	<header>
	<h1>Exiastore Exi@store</h1>					<!--référencement-->
	<h2>Vente en ligne de produits culturels</h2>	<!--référencement-->
	<a href="?page=accueil" id="accueil"></a><!--cs pas fait-->
	<div id="session">
		<ul class="nav">
			<li class="nav-item" id="bienvenue"><p>Bienvenue <?php echo $user['pnomUser']; ?>!</p></li>
			<li class="nav-item" id="insc"><a href="?page=monCompte">Mon compte</a></li>
			<li class="nav-item" id="ident"><a href="?page=deconnexion">Se déconnecter</a></li>
			<li class="nav-item" id="panier">
				<a href="?page=panier">Panier</a>
				<ul class="sub-nav">
					<li class="sub-nav-item"><p>Nombre d'articles: <?php echo $nbArticles; ?></p>
					</li><li class="sub-nav-item"><p>Total: <?php echo $prixTotal; ?>€</p>
					</li><li class="sub-nav-item"><a href="?page=panier" id="acces_pan"></a></li>
				</ul>
			</li>
		</ul>
		<form class="navbar-form navbar-left" role="search" action="?page=accueil" method="post">
				<div class="form-group">
					<p>
					<input type="text" class="form-control" name="search" placeholder="Recherche"/>
					<button type="submit" class="btn btn-default">OK!</button></p>
				</div>
		</form>
	</div>
	</header>
	
	<!--fonctionphp+requetepouraffichage des catégories-->
	<nav class="nav2">
         <ul> <!-- Les li sont collés pour éviter les espaces visibles pour le inline-block -->
            <li><a href="?page=accueil" class="active" id="accueilnav">Accueil</a>
			</li><li><a href="?page=accueil&idType=1" id="cd">CD</a>
				<ul class="ssnav">
						
					<li class="item"><a href="?page=accueil&idtype"><?php echo $cd['nomGenre'];?></a></li>
			
				</ul>
			</li><li><a href="?page=accueil&idType=2" id="dvd">DVD</a>
				
			</li><li><a href="?page=accueil&idType=3" id="livre">LIVRES</a>
				</li>
         </ul>
        </nav>
	
	
	<main>
	
		<h1 id="listing">Liste des articles:</h1>
		<div id="articles">
		<?php require('vue/affichageArticles.php'); ?> <!-- Insertion de la page pour afficher tous les articles sur la page d'acceuil -->
		</div>	
	
	</main>
	
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
			<a href="tp.tar">TPs</a>
			<p>©2015 Viodier prod</p>
	
		</div>
	</footer>
	
</body>
</html>