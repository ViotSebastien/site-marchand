<?php

if(isset($_GET['id'])) { // SI on récupère un id de commande
	require('modele/bdd.php');
	$commande = get_commande($_GET['id'], $_SESSION['idUser']); // On récupère les infos de la commande
	if(isset($commande['idCommande'])) { // Si la commande existe et appartient bien à l'utilisateur
		$articles = get_articles_commande($_GET['id']);
		require('vue/detailCommande.php');
	} else {
		echo 'Erreur : pas de commande';
	}
}

?>