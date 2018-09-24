<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Exi@store - Mon compte</title>
	</head>
	<body>
	<header>
	<h1>Exiastore Exi@store</h1>					<!--référencement-->
	<h2>Vente en ligne de produits culturels</h2>	<!--référencement-->
	<a href="?page=accueil" id="accueil"></a><!--cs pas fait-->
	<div id="session">
		<ul class="nav">
			<li class="nav-item" id="bienvenue"><p>Mon Compte</p></li>
			<li class="nav-item" id="insc"><a href="?page=accueil">Retour accueil</a></li>
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
<div class="pagecompte">
		<h2>Historique de vos commandes :</h2>

		<?php 
			$commandes = get_commandes_user($_SESSION['idUser']);// Affichage détail commande par rapport a l'utilisateur connectés
			if(isset($commandes[0]['idCommande'])) { 
		?>
		<table>
			<tr class="impair">
				<td>Date</td><td>Statut</td><td>Prix</td><td>Détails</td>
			</tr>
		<?php
			$i = 0;
			foreach ($commandes as $commande) { // Parcoure la table commande , pour changer couleur des lignes
				$style = ($i%2 == 0)?'pair':'impair';
				$i++;
		?>
		<tr class="<?php echo $style; ?>">
			<td><?php echo $commande['dateCommande']; ?></td>
			<td><?php echo $commande['statutCommande']; ?></td>
			<td><?php echo $commande['prixTotal']; ?> €</td>
			<td><a href="?page=detailCommande&id=<?php echo $commande['idCommande'] ?>">Détails</a></td>
		</tr>
		<?php
			}
		?>
		</table><br/>
		<?php
			} else {
		?>
		<p>Vous n'avez aucune commande.</p>
		<?php
			}
		?>

         <!-- Formulaire modification du compte -->
		<form action="?page=monCompte" method="POST">
			<fieldset>
				<legend><h2>Modification de votre adresse email</h2></legend>
				<label>Nouvelle adresse email :</label> <input type="email" name="email" autocomplete="off"/><br/>
				<input type="hidden" name="action" value="modifEmail" />
				<input type="submit" value="Modifier mon adresse email" class="btn btn-success"/>
			</fieldset>
		</form>

		<br/>

		<form action="?page=monCompte" method="POST">
			<fieldset>
				<legend><h2>Modification de votre adresse</h2></legend>
				<label>Adresse :</label> <input type="text" name="addr" value="<?php echo $data['addrUser']; ?>" autocomplete="off"/><br/>
				<label>Code postal :</label> <input type="text" name="cp" value="<?php echo $data['cpUser']; ?>"autocomplete="off"/><br/>
				<label>Ville :</label> <input type="text" name="ville" value="<?php echo $data['villeUser']; ?>"autocomplete="off"/><br/>
				<input type="hidden" name="action" value="modifAdresse" />
				<input type="submit" value="Modifier mon adresse" class="btn btn-success"/>
			</fieldset>
		</form>

		<br/>

		<form action="?page=monCompte" method="POST">
			<fieldset>
				<legend><h2>Modification de votre mot de passe</h2></legend>
				<label>Ancien mot de passe :</label> <input type="password" name="ancienMdp" autocomplete="off"/><br/>
				<label>Nouveau mot de passe :</label> <input type="password" name="nouvMdp" autocomplete="off"/><br/>
				<label>Vérification nouveau mot de passe :</label> <input type="password" name="nouvMdp2" autocomplete="off"/><br/>
				<input type="hidden" name="action" value="modifMdp" />
				<input type="submit" value="Modifier mon mot de passe" class="btn btn-success"/>
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