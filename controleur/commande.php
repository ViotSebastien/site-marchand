<?php

if(session_id() == '') { // Si la session n'est pas démarré (pas d'identifiant de session)
	header('Location: ../index.php'); // On redirige vers le controleur global
}

if(isset($_GET['etape'])) {
	require('modele/bdd.php');

	$erreur = 0;
	$ok = 0;
	$msgErreur = '';
	$msgOk = '';

	$addrUser = get_addr_user($_SESSION['idUser']);

	if($_GET['etape'] == 1) { // Etape 1 : adresse de livraison
		require('vue/commande1.php');


	} elseif($_GET['etape'] == 2) { // Etape 2 : coordonnées bancaires

		if(isset($_POST['addr']) AND isset($_POST['cp']) AND isset($_POST['addr'])) { // Si on reçoit l'adresse
			if(!empty($_POST['addr']) AND !empty($_POST['cp']) AND !empty($_POST['addr'])) { // Si les champs ne sont pas vide

				$_SESSION['addrLivraison'] = $_POST['addr'];
				$_SESSION['cpLivraison'] = $_POST['cp'];
				$_SESSION['villeLivraison'] = $_POST['ville'];
				
				require('vue/commande2.php');
			} else {
				$erreur = 1;
				$msgErreur = 'l\'adresse est vide.<br/>Veuillez rentrer une adresse';
				require('vue/commande1.php');
			}
		} else {
			require('vue/commande2.php');
		}
		


	} elseif($_GET['etape'] == 3) { // Etape 3 : vérification adresse et coordonnées bancaires

		if(isset($_POST['typeCarte']) AND isset($_POST['numeroCarte']) AND isset($_POST['dateValidite'])) { // Si on reçoit les coord. bancaires
			if(!empty($_POST['typeCarte']) AND !empty($_POST['numeroCarte']) AND !empty($_POST['dateValidite'])) { // Si les champs ne sont pas vide
				$_SESSION['typeCarte'] = $_POST['typeCarte'];
				$_SESSION['numeroCarte'] = $_POST['numeroCarte'];
				$_SESSION['dateValidite'] = $_POST['dateValidite'];

				$drp = get_drp();
				require('vue/commande3.php');
			} else {
				$erreur = 1;
				$msgErreur = 'les coordonnées bancaires sont vide.<br/>Veuillez les indiquer';
				require('vue/commande2.php');
			}
		}

		

	} elseif($_GET['etape'] == 4) { // Validation commande, envoi mail
		$carteValide = verifier_carte_bancaire($_SESSION['numeroCarte'], $_SESSION['dateValidite']);
		if($carteValide) { // Si la carte bancaire est valide : on valide la commande

			$prixTotal = 0;
			$nbArticles = count($_SESSION['panier']['idArticle']); // Nb d'articles dans la commande
			new_commande($_SESSION['idUser'], 'en cours', $nbArticles ,$_SESSION['addrLivraison'], 
				$_SESSION['cpLivraison'], $_SESSION['villeLivraison'], $prixTotal); // Insertion d'une nouvelle commande
			$idCommande = get_last_id()['idCommande']; // On récupère l'ID de la commande

			//

			for ($i=0; $i < $nbArticles; $i++) { // Pour chaque article de la commande
				$article = get_article($_SESSION['panier']['idArticle'][$i]); // Infos sur l'article
				$prixTotal += $article['prixArticle'] * $_SESSION['panier']['qteArticle'][$i]; // Prix total
				new_article_commande($_SESSION['panier']['idArticle'][$i], 
					$idCommande, $_SESSION['panier']['qteArticle'][$i], $article['prixArticle']); // Insertion de l'article dans la commande
			}
			update_prix_commande($idCommande, $prixTotal); // Mise à jour du montant de la commande
			$user = get_user_id($_SESSION['idUser']);
			//$succesMail = envoyer_mail($user, $prixTotal); // NE fonctionne que dans un evironnement configuré !!!



			// On vide le panier
			unset($_SESSION['panier']);
			$_SESSION['panier'] = array();
			$_SESSION['panier']['idArticle'] = array();
			$_SESSION['panier']['qteArticle'] = array();

			require('vue/commande4.php');
		} else {
			$erreur = 1;
			$msgErreur = 'les coordonnées bancaires ne sont pas valides !';
			require('vue/commande3.php');
		}
	}

} else {
	echo 'Errreur : pas d\'étape transmise';
}


function verifier_carte_bancaire($numero, $date) { // Fonction de vérification des coordonnées bancaires
	if(strlen($numero) == 16) { // Si le numéro est correct
		$d = explode('-', $date); // On isole l'année et le mois
		$annee = $d[0];
		$mois = $d[1];
		$anneeActuelle = date('Y'); // On récupère la date actuelle
		$moisActuelle = date('n');
		if($annee > $anneeActuelle) { // Si l'année de validité est STRICTEMENT supérieur à l'année actuelle
			return true;
		} elseif ($annee == $anneeActuelle) { // Si l'annee de validité est EGALE à l'année actuelle
			if($mois >= $moisActuelle) { // Si le mois de validité est SUPERIEUR OU EGALE au mois actuel
				return true;
			}
		}
	} else {
		return false;
	}
}

function envoyer_mail($user, $montant) {

	$headers = 'Mime-Version: 1.0'."\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
	$headers .= "\r\n";

	$message = "<h2>Bonjour ".$user['pnomUser']." ".$user['nomUser']." !</h2>\r\n".
	"Merci pour votre commande sur Exi@Store d'un montant de ".$montant." euros.<br/>\r\n".
	"Nous esperons que votre commande vous dennera pleinement satisfaction.<br/>\r\n".
	"En espérnant vous revoir prochainement,<br/>\r\n ".
	"Cordialement,<br/>\r\n ".
	"Exi@Store.";


	return mail($user['emailUser'], 'Merci pour votre commande sur Exi@Store !', $message, $headers);
}

function get_drp() {
	$articleManquant = false;
	$drp = new DateTime(NULL);

	$drp->add(new DateInterval('P2D')); // +2 jours pour l'acheminement

	$nbArticles=count($_SESSION['panier']['idArticle']);
	for ($i=0; $i < $nbArticles; $i++) {
		$article = get_stock_article($_SESSION['panier']['idArticle'][$i]); // Récupération du stock sur l'article
		if($article['nbStockArticle'] < $_SESSION['panier']['qteArticle'][$i]) { // Si on a pas assez de stock
			$articleManquant = true;
		}
	}

	if($articleManquant) { // +3 jours de préparation si articles manquants
		$drp->add(new DateInterval('P3D'));
	} else { // +1 jour de préparation
		$drp->add(new DateInterval('P1D'));
	}

	return $drp->format('Y-m-d');
}

?>