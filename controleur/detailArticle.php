<?php

if(session_id() == '') { // Si la session n'est pas démarré (pas d'identifiant de session)
	header('Location: ../index.php'); // On redirige vers le controleur global
}

if(isset($_GET['id'])) {//recupération id de la table article
	require('modele/bdd.php');//on appel le modele
	$article = get_article($_GET['id']);//initialise variable tout info de la table
	if(isset($article['idArticle'])) {
		require('vue/detailArticle.php');
	} else {
		echo 'Erreur : article non trouvé';
	}
} else {
	echo 'Erreur : pas d\'id d\'article';
}

?>