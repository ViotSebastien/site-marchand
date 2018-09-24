<?php
	
if(session_id() == '') { // Si la session n'est pas démarré (pas d'identifiant de session)
	header('Location: ../index.php'); // On redirige vers le controleur global
}

require('modele/bdd.php');

if(isset($_POST['action'])) { // Si on a uine action
	if($_POST['action'] == 'modifEmail' AND isset($_POST['email'])) { // On veut modifier l'email
		$erreur = update_email_user($_SESSION['idUser'], $_POST['email']); // Update le l'email
		if($erreur) {
			echo 'Modification de l\'email effectuée avec succès !';
		} else {
			echo 'Erreur lors de la modification de l\'email';
		}
	} elseif($_POST['action'] == 'modifAdresse' AND isset($_POST['addr']) 
	AND isset($_POST['cp']) AND isset($_POST['ville'])) { // On veut modifier l'adresse
		$erreur = update_addr_user($_SESSION['idUser'], $_POST['addr'], $_POST['cp'], $_POST['ville']); // Update le l'adresse
		if($erreur) {
			echo 'Modification de l\'adresse effectuée avec succès !';
		} else {
			echo 'Erreur lors de la modification de l\'adresse';
		}
	} elseif($_POST['action'] == 'modifMdp' AND isset($_POST['ancienMdp']) AND isset($_POST['nouvMdp']) 
	AND isset($_POST['nouvMdp2'])) { // On veut modifier le mot de passe
		$donnees = get_mdp_user($_SESSION['idUser']);
		if($donnees['mdpUser'] == sha1($_POST['ancienMdp'])) { // Si l'ancien mot de passe est correct
			if($_POST['nouvMdp'] == $_POST['nouvMdp2'] AND strlen($_POST['nouvMdp']) >= 6) { // Si les nouveaux mdp correspondent
				$erreur = update_mdp_user($_SESSION['idUser'], sha1($_POST['nouvMdp'])); // Update du mdp
				if($erreur) {
					echo 'Modification du mot de passe effectuée avec succès !';
				} else {
					echo 'Erreur lors de la modification du mot de passe';
				}
			} else {
				echo 'Erreur les nouveaux mots de passes ne correspondent pas ou font moins de 6 caractères';
			}
		} else {
			echo 'Erreur l\'ancien mot de passe ne correspond pas';
		}
	}
} else { // Si on a pas d'action
	$data = get_addr_user($_SESSION['idUser']);
	require('vue/monCompte.php');
}

?>