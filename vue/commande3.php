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
		<h1><span style="color:grey;">Etape 1 | Etape 2 |</span> Etape 3 <span style="color:grey;">| Etape 4</span></h1>
		<a href="?page=commande&etape=2" class="btn btn-danger">&lt;&lt; Retour à l'étape précédente</a>
		<h2>Récapitulatif :</h2>
		<p>Merci de vérifier attentivement que ces informations sont valides :</p>

<?php
if($erreur == 1) { // Si il y a une erreur, un message s'affiche
?>
		<div class="message erreur"><strong>Erreur : </strong><?php echo $msgErreur; ?></div>
<?php
}
?>
		<!-- Récupération des données de l'étape 2 -->
		<h3>Adresse de livraison :</h3>
		<p><?php echo $_SESSION['addrLivraison'].' '.$_SESSION['cpLivraison'].' '.$_SESSION['villeLivraison'];?></p>

		<h3>Coordonnées bancaires :</h3>
		<p>Type de carte : <?php echo $_SESSION['typeCarte']; ?><br/>
		Numéro de carte : <?php echo 'XXXX XXXX XXXX '.substr($_SESSION['numeroCarte'], -4); ?><br/>
		Date de validité : <?php echo $_SESSION['dateValidite']; ?></p>

		<h3>Panier :</h3>
<?php
$nbArticles=count($_SESSION['panier']['idArticle']); // Compte le nombre d'article dans le panier
?>
		<div id="panier"><table>
			<tr class="impair"><td>Article</td><td>Quantité</td><td>Prix unitaire</td><td>Prix</td><td>Disponibilité</td></tr>
		<?php

			// Récupération des données du panier et mise en forme 
			$prixTotal = 0;
			for ($i=0; $i < $nbArticles; $i++) {
			$article = get_article($_SESSION['panier']['idArticle'][$i]);

			$style = ($i%2 == 0)?'pair':'impair';

			$prix = $article['prixArticle'] * $_SESSION['panier']['qteArticle'][$i];
			$prixTotal += $prix;
		?>
		<tr class="<?php echo $style; ?>">
			<td><?php echo $article['nomArticle']; ?></td>
			<td><?php echo $_SESSION['panier']['qteArticle'][$i]; ?> </td>
			<td><?php echo $article['prixArticle']; ?> €</td>
			<td><?php echo $prix; ?> €</td>
			<td><?php echo $article['etatArticle']; ?></td>
		</tr>
<?php
	}
?>
		</table></div>
		<h3>Prix total du panier : <?php echo $prixTotal; ?> €</h4>
		<h3>Date de reception prévue : <?php echo $drp; ?></h3>
		<a href="?page=commande&etape=4" class="btn btn-success">Valider ma commande</a>
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