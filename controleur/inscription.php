<?php

if(session_id() == '') { // Si la session n'est pas démarré (pas d'identifiant de session)
	header('Location: ../index.php'); // On redirige vers le controleur global
}

$message_erreur = '';
$erreur = 0;

if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['mdp'])
	AND isset($_POST['mdp2']) AND isset($_POST['addr']) AND isset($_POST['cp']) AND isset($_POST['ville'])) { // Si tous les champs sont présents

	require_once('modele/bdd.php');

	if(empty($_POST['prenom'])) { // Le prénom n'est pas renseigné
		$erreur = 1;
		$message_erreur = $message_erreur.'Le prénom n\'est pas renseigné<br/>';
	}

	if(empty($_POST['nom'])) { // Le nom n'est pas renseigné
		$erreur = 1;
		$message_erreur = $message_erreur.'Le nom n\'est pas renseigné<br/>'; 
	}

	if(empty($_POST['login'])) { // Si le login n'est pas renseigné
		$erreur = 1;
		$message_erreur = $message_erreur.'Le login n\'est pas rensigné<br/>';
	} else { // On vérifie si le login n'est pas déja utilisé
		$user = get_user_login($_POST['login']);
		if(isset($user['idUser'])) { // Si l'email est déja utilisé
			$erreur = 1;
			$message_erreur = $message_erreur.'Le login renseigné est deja utilisé<br/>';
		}
	}

	if(empty($_POST['email'])) { // Si l'email n'est pas renseigné
		$erreur = 1;
		$message_erreur = $message_erreur.'L\'email n\'est pas rensigné<br/>';
	} else { // On vérifie si l'email n'est pas déja utilisé
		$user = get_user_email($_POST['email']);
		if(isset($user['idUser'])) { // Si l'email est déja utilisé
			$erreur = 1;
			$message_erreur = $message_erreur.'L\'email renseigné est deja utilisé';
		}
	}

	if(empty($_POST['mdp'])) { // Si le mot de passe n'est pas renseigné
		$erreur = 1;
		$message_erreur = $message_erreur.'Le mot de passe n\'est pas renseigné<br/>';
	}
	if(strlen($_POST['mdp']) < 6) { // Si le mot de passe fait moins de 6 caractères
		$erreur = 1;
		$message_erreur = $message_erreur.'Le mot de passe fait moins de 6 caractères<br/>';
	}
	if(empty($_POST['mdp2'])) { // Si la verification du mot de passe n'est pas renseigné
		$erreur = 1;
		$message_erreur = $message_erreur.'La verification du mot de passe n\'est pas renseigné<br/>';
	} else {
		if($_POST['mdp'] != $_POST['mdp2']) { // Si les 2 mdp ne corresponsent pas
			$erreur = 1;
			$message_erreur = $message_erreur.'Les mots de passes de corresponsent pas<br/>';
		}
	}

	if(empty($_POST['addr']) AND false) { // Si l'adresse n'est pas renseigné DESACTIVE
		$erreur = 1;
		$message_erreur = $message_erreur.'L\'adresse n\'est pas renseigné<br/>';
	}

	if(empty($_POST['cp']) AND false) { // Si le code postal n'est pas renseigné DESACTIVE
		$erreur = 1;
		$message_erreur = $message_erreur.'Le code postal n\'est pas renseigné<br/>';
	}

	if(empty($_POST['ville']) AND false) { // Si la ville n'est pas renseigné DESACTIVE
		$erreur = 1;
		$message_erreur = $message_erreur.'La ville n\'est pas renseigné<br/>';
	}



	if($erreur == 0) { // Les champs sont tous valides
		$succes = new_user(htmlspecialchars($_POST['prenom']),
			htmlspecialchars($_POST['nom']),
			htmlspecialchars($_POST['login']),
			htmlspecialchars($_POST['email']),
			sha1($_POST['mdp']),
			htmlspecialchars($_POST['addr']),
			htmlspecialchars($_POST['cp']),
			htmlspecialchars($_POST['ville']));
		if($succes) {
			$ok = 1;
			require('vue/inscription.php');
		}
	} else {
		require('vue/inscription.php');
	}


} else { // Pas de données transmises : affichage du formulaire
	require('vue/inscription.php');
}


?>