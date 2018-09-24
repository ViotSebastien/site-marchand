<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Exi@store - Détail</title>
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
			<li class="nav-item" id="bienvenue"><p>Detail</p></li>
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
<!--div class="pagearticle"-->
		<h1 id="listing">Article : <?php echo $article['nomArticle']; ?></h1>
		<p><strong>Article ajouté le :</strong> <?php echo $article['dateArticle']; ?></p>
		<img src="images/<?php echo $article['addrImgArticle']; ?>" class="imageArticleDetail" /><br/>
		<p><strong>Description : </strong><?php echo nl2br($article['descripArticle']); ?></p>
		<p><strong>Auteur : </strong><?php echo $article['auteurArticle']; ?></p>
		<p><strong>Editeur : </strong><?php echo $article['editeurArticle']; ?></p>
		<p><strong>Genre : </strong>
<?php
	$genres = get_article_genres($article['idArticle']); // Affichage nom du genre
	foreach ($genres as $genre) {
		echo $genre['nomGenre'].' ';
	}
?>
		</p>
		<p><strong>Disponibilité : </strong><?php echo $article['etatArticle']; ?></p>
		<p><strong>Nombre d'articles en stock : </strong><?php echo $article['nbStockArticle']; ?> exemplaires restants</p>
		<h3>Prix : <?php echo $article['prixArticle']; ?> €</h3>
<?php
	if(isset($_SESSION['idUser'])) { // Si l'utilisateur est connecté alors il affiche un bouton ajouter au panier
?>
		<a href="?page=panier&action=ajoutArticle&id=<?php echo $article['idArticle'] ?>"><img src="images/ajouterPanierBig.png"/></a>
<?php
	}
?>
<!--/div-->
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