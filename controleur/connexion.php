<?php

if(session_id() == '') { // Si la session n'est pas démarré (pas d'identifiant de session)
	header('Location: ../index.php'); // On redirige vers le controleur global
}

$message_erreur = '';
$erreur = 0;

if(isset($_POST['login']) AND isset($_POST['mdp'])) {
	if(!empty($_POST['login']) AND !empty($_POST['mdp'])) { // Si on reçoit login et le mdp

		require('modele/bdd.php'); // Inclusion du modele bdd

		$result = get_user_login_mdp($_POST['login'], sha1($_POST['mdp'])); // Recupération des infos de l'user

		if(isset($result['idUser'])) { // Si le login et le mdp correspondent
			$_SESSION['idUser'] = $result['idUser'];
			header('Location: ?page=accueil'); // On redirige vers l'accueil
		} else { // Si le login et le mdp ne correspondent pas
			$erreur = 1;
			$message_erreur = 'Erreur : login et/ou mdp invalide !';
			require('vue/connexion.php');
		}


	} else { // Pas d'login et/ou de mdp
		$erreur = 1;
		$message_erreur = 'Erreur : login et/ou mdp manquant';
		require('vue/connexion.php');
	}
} else {
	require('vue/connexion.php');
}

?>