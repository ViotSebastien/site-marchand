<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Exi@store - Mon panier</title>
	</head>
	<body>
	<header>
	<h1>Exiastore Exi@store</h1>					<!--référencement-->
	<h2>Vente en ligne de produits culturels</h2>	<!--référencement-->
	<a href="?page=accueil" id="accueil"></a><!--cs pas fait-->
	<div id="session">
		<ul class="nav">
			<li class="nav-item" id="bienvenue"><p>Panier</p></li>
			<li class="nav-item" id="insc"><a href="?page=monCompte">Mon compte</a></li>
			<li class="nav-item" id="ident"><a href="?page=deconnexion">Se déconnecter</a></li>
			<li class="nav-item" id="insc"><a href="?page=accueil">Retour accueil</a></li>
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
<div class="pagepanier">
		<h1>Liste des articles dans le panier :</h1>
		
<?php
$nbArticles=count($_SESSION['panier']['idArticle']);
if($nbArticles == 0) {
?>

<p>Vous n'avez pas encore d'article dans votre panier</p>

<?php
} else {
?>
<a href="?page=panier&action=viderPanier" class="btn btn-danger">Vider le panier</a>
<div id="panier"><table>
	<tr class="impair"><td>Article</td><td>Quantité</td><td>Prix unitaire</td><td>Prix</td><td>Disponibilité</td><td>Supprimer</td></tr>
<?php


	$prixTotal = 0;
	for ($i=0; $i < $nbArticles; $i++) {
	$article = get_article($_SESSION['panier']['idArticle'][$i]);

	$style = ($i%2 == 0)?'pair':'impair';

	$prix = $article['prixArticle'] * $_SESSION['panier']['qteArticle'][$i];
	$prixTotal += $prix;
?>
<tr class="<?php echo $style; ?>">
	<td><?php echo $article['nomArticle']; ?></td>
	<td><a href="?page=panier&action=supprArticle&id=<?php echo $_SESSION['panier']['idArticle'][$i]; ?>"><img src="images/-.png"/></a> 
	<?php echo $_SESSION['panier']['qteArticle'][$i]; ?> 
	<a href="?page=panier&action=ajoutArticle&id=<?php echo $_SESSION['panier']['idArticle'][$i]; ?>"><img src="images/+.png"/></a></td>
	<td><?php echo $article['prixArticle']; ?> €</td>
	<td><?php echo $prix; ?> €</td>
	<td><?php echo $article['etatArticle']; ?></td>
	<td><a href="?page=panier&action=supprAllArticle&id=<?php echo $_SESSION['panier']['idArticle'][$i]; ?>">Supprimer</a></td>
</tr>
<?php
	}
?>
</table></div><br/>
<h3>Prix total du panier : <?php echo $prixTotal; ?> €</h3>
<h3>Date de reception prévue : <?php echo $drp; ?></h3>
<a href="?page=commande&etape=1" class="btn btn-success">Terminer mes achats</a>
<?php
}
?>
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