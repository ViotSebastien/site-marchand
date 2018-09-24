<?php

if(session_id() == '') { // Si la session n'est pas démarré (pas d'identifiant de session)
	header('Location: ../index.php'); // On redirige vers le controleur global
}

function supprimerArticle($idArticle) {
	$tmp=array(); // Panier temporaire
	$tmp['idArticle'] = array();
	$tmp['qteArticle'] = array();

	for($i = 0; $i < count($_SESSION['panier']['qteArticle']); $i++) {
		if ($_SESSION['panier']['idArticle'][$i] !== $idArticle) {
 			array_push($tmp['idArticle'], $_SESSION['panier']['idArticle'][$i]);
			array_push($tmp['qteArticle'], $_SESSION['panier']['qteArticle'][$i]);
		}
	}
	//On remplace le panier en session par notre panier temporaire à jour
	$_SESSION['panier'] = $tmp;
	//On efface notre panier temporaire
	unset($tmp);
}

require('modele/bdd.php');

if(isset($_GET['action'])) {

	if($_GET['action'] == 'ajoutArticle') { // Ajout d'un article dans le panier
		if(isset($_GET['id'])) {
			$article = get_article($_GET['id']);
			if(isset($article['idArticle'])) {
				
				// Si le produit existe déjà on ajoute seulement la quantité
				$positionProduit = array_search($_GET['id'], $_SESSION['panier']['idArticle']);

				if ($positionProduit !== false) {
					$_SESSION['panier']['qteArticle'][$positionProduit] ++;
				} else { // Sinon on ajoute le produit
					array_push($_SESSION['panier']['idArticle'], $_GET['id']);
					array_push($_SESSION['panier']['qteArticle'], 1);
				}
				$drp = get_drp();
				require('vue/panier.php');

			} else {
				echo 'Erreur : article non trouvé';
			}
		} else {
			echo 'Erreur : pas d\'id d\'article';
		}



	} elseif($_GET['action'] == 'supprArticle') { // Suppression d'un exemplaire d'un article
		if(isset($_GET['id'])) {
				
			// Si le produit existe
			$positionProduit = array_search($_GET['id'], $_SESSION['panier']['idArticle']);

			if ($positionProduit !== false) {
				$_SESSION['panier']['qteArticle'][$positionProduit] --;
				if($_SESSION['panier']['qteArticle'][$positionProduit] == 0) { // Si on n'a plus aucun exemplaire
					supprimerArticle($_GET['id']);
				}
			} else { // Sinon on ajoute le produit
				echo 'Erreur: l\'article n\'est pas dans le panier';
			}
			$drp = get_drp();
			require('vue/panier.php');

		} else {
			echo 'Erreur : pas d\'id d\'article';
		}



	} elseif($_GET['action'] == 'supprAllArticle') { // Suppression de toute une ligne
		if(isset($_GET['id'])) {
				
			// Si le produit existe
			$positionProduit = array_search($_GET['id'], $_SESSION['panier']['idArticle']);
			if ($positionProduit !== false) {
				supprimerArticle($_GET['id']);
			} else {
				echo 'Erreur: l\'article n\'est pas dans le panier';
			}
			$drp = get_drp();
			require('vue/panier.php');

		} else {
			echo 'Erreur : pas d\'id d\'article';
		}


	} elseif($_GET['action'] == 'viderPanier') {
		unset($_SESSION['panier']);
		$_SESSION['panier'] = array();
		$_SESSION['panier']['idArticle'] = array();
		$_SESSION['panier']['qteArticle'] = array();
		require('vue/panier.php');
	}



} else { // Pas d'action : affichage du panier
	$drp = get_drp();
	require('vue/panier.php');
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