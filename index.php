<?php
session_start();

$pages = array( // Pages disponibles en étant connecté
	'accueil',
	'monCompte',
	'panier',
	'commande',
	'detailCommande',
	'deconnexion'
);

$pagesNC = array( // Pages disponibles en n'étant pas connecté
	'connexion',
	'inscription',
	'detailArticle'
);


if (!isset($_SESSION['panier'])){ // Création du panier si necessaire
	$_SESSION['panier'] = array();
	$_SESSION['panier']['idArticle'] = array();
	$_SESSION['panier']['qteArticle'] = array();
}


if(isset($_GET['page'])) { // Si on demande une page
	if((isset($_SESSION['idUser']) AND in_array($_GET['page'], $pages)) 
		OR in_array($_GET['page'], $pagesNC)) { // Si on est connecté et que la page existe
		require('controleur/'.$_GET['page'].'.php'); // On inclut la page
	} else { // Si la page demandée n'existe pas
		require('controleur/accueil.php');
	}
} else { // Si on ne demande pas de page
	require('controleur/accueil.php'); // Page par défaut en cas de connexion
}



?>