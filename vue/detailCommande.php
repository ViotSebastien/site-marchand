<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Exi@store - Détail commande</title>
	</head>
	<body>
	<header>
	<h1>Exiastore Exi@store</h1>					<!--référencement-->
	<h2>Vente en ligne de produits culturels</h2>	<!--référencement-->
	<a href="?page=accueil" id="accueil"></a><!--cs pas fait-->
	<div id="session">
		<ul class="nav">
			<li class="nav-item" id="bienvenue"><p>Commande <?php echo $user['pnomUser']; ?></p></li>
			<li class="nav-item" id="insc"><a href="?page=monCompte">Mon compte</a></li>
			<li class="nav-item" id="ident"><a href="?page=deconnexion">Se déconnecter</a></li>
			<li class="nav-item" id="panier">
				<a href="?page=panier">Panier</a>
				<ul class="sub-nav">
					<li class="sub-nav-item"><p>Nombre d'articles: <?php echo $_session['panier']['nbAticle']; ?></p>
					</li><li class="sub-nav-item"><p>Total: <?php echo $_session['panier']['prix']; ?>€</p>
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
<div class="pagecommande">
		<h2 id="listing">Détail de la commande :</h2>
<?php
	$prixTotal = 0;
?>
		<p><strong>Date de la commande :</strong> <?php echo $commande['dateCommande']; ?></p>
		<p><strong>Statut de la commande :</strong> <?php echo $commande['statutCommande']; ?></p>
		<p><strong>Adresse de livraison :</strong> <?php echo $commande['addrLivraison'].' '.$commande['cpLivraison'].' '.$commande['villeLivraison']; ?></p>

		<h3>Articles :</h3>
		<table>
			<tr class="impair"><td>Nom article</td><td>Prix unitaire</td><td>Quantité</td><td>Prix total</td></tr>
<?php
	$i = 0;
	foreach ($articles as $article) { // Parcoure la table articles, pour calculer le prix
		$style = ($i%2 == 0)?'pair':'impair';
		$i++;
		$prix = $article['prixUnitaire'] * $article['qte'];
		$prixTotal += $prix;
?>
<tr class="<?php echo $style; ?>">
	<td><?php echo $article['nom']; ?></td>
	<td><?php echo $article['prixUnitaire']; ?> €</td>
	<td><?php echo $article['qte']; ?></td>
	<td><?php echo $prix; ?> €</td>
</tr>
<?php
	}
?>
		</table>
		<h3>Montant de la commande : <?php echo $prixTotal; ?> €</h3>
		
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