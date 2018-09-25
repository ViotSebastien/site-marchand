<?php

  //Fonction pour récupérer la base de données
function get_bdd() {
	try {
		return new PDO('mysql:host=localhost;dbname=projetweb;charset=utf8', 'user', 'fgzefgsqifgqsdgf@è-èé"24646');	
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
}


//Fonction pour récupérer le login et le mot de passe
function get_user_login_mdp($login, $mdp) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT * FROM user WHERE loginUser = :login AND mdpUser = :mdp');
	$reponse->execute(array('login' => $login, 'mdp' => $mdp));

	$donnees = $reponse->fetch();

	return $donnees;
}


	//Fonction pour récupérer l adresse mail
function get_user_email($email) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT idUser FROM user WHERE emailUser = :email');
	$reponse->execute(array('email' => $email));

	$donnees = $reponse->fetch();

	return $donnees;
}

function get_user_login($login) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT idUser FROM user WHERE loginUser = :login');
	$reponse->execute(array('login' => $login));

	$donnees = $reponse->fetch();

	return $donnees;
}


//Fonction pour récupérer l'id de l'utilisateur
function get_user_id($id) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT * FROM user WHERE idUser = :id');
	$reponse->execute(array('id' => $id));

	$donnees = $reponse->fetch();

	return $donnees;
}


//Fonction pour créer un nouvelle utilisateur
function new_user($prenom, $nom, $login, $email, $mdp, $addr, $cp, $ville) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('INSERT INTO user VALUES(\'\', :login, :nom, :prenom, :mdp, :email, :addr, :cp, :ville)');
	$erreur = $reponse->execute(array(
		'login' => $login,
		'nom' => $nom,
		'prenom' => $prenom,
		'mdp' => $mdp,
		'email' => $email,
		'addr' => $addr,
		'cp' => $cp,
		'ville' => $ville
	));

	return $erreur;
}


//Fonction pour récupérer l'adresse de l'utilisateur
function get_addr_user($id) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT addrUser, cpUser, villeUser FROM user WHERE idUser = :id');
	$reponse->execute(array('id' => $id));

	$donnees = $reponse->fetch();

	return $donnees;
}


//Fonction pour modifier l adresse 
function update_addr_user($id, $addr, $cp, $ville) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('UPDATE user SET addrUser = :addr, cpUser = :cp, villeUser = :ville 
		WHERE idUser = :id');
	$erreur = $reponse->execute(array(
		'id' => $id,
		'addr' => $addr,
		'cp' => $cp,
		'ville' => $ville
	));

	return $erreur;
}


//Fonction pour modifier l adresse mail
function update_email_user($id, $email) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('UPDATE user SET emailUser = :email
		WHERE idUser = :id');
	$erreur = $reponse->execute(array(
		'id' => $id,
		'email' => $email
	));

	return $erreur;
}


//Fonction pour récupérer le mot de passe de l'utilisateur
function get_mdp_user($id) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT mdpUser FROM user WHERE idUser = :id');
	$reponse->execute(array('id' => $id));

	$donnees = $reponse->fetch();

	return $donnees;
}


//Fonction pour modifier le mot de passe de l'utilisateur
function update_mdp_user($id, $mdp) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('UPDATE user SET mdpUser = :mdp WHERE idUser = :id');
	$erreur = $reponse->execute(array(
		'id' => $id,
		'mdp' => $mdp
	));

	return $erreur;
}


//Fonction pour récupérer les articles
function get_articles() {
	$bdd = get_bdd();
	$reponse = $bdd->query('SELECT * FROM article');

	$donnees = $reponse->fetchAll();

	return $donnees;
}


//Fonction pour récupérer les critères des articles
function get_articles_criteres($search) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT * FROM article
		INNER JOIN articlegenre
		ON article.idArticle = articlegenre.idArticle 
		INNER JOIN genre
		ON articlegenre.idGenre = genre.idGenre
		WHERE article.nomArticle LIKE :search OR article.descripArticle LIKE :search 
		OR article.auteurArticle LIKE :search OR genre.nomGenre LIKE :search
		OR article.etatArticle LIKE :search
		GROUP BY article.idArticle');
	$reponse->execute(array(
		'search' => "%$search%"
	));

	$donnees = $reponse->fetchAll();

	return $donnees;
}


//Fonction pour récupérer l'id des articles
function get_article($id) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT * FROM article WHERE idArticle = :id');
	$reponse->execute(array('id' => $id));

	$donnees = $reponse->fetch();

	return $donnees;
}


//Fonction pour récupérer le genre des articles
function get_article_genres($id) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT nomGenre FROM genre
		INNER JOIN articlegenre 
		ON genre.idGenre = articlegenre.idGenre
		WHERE articlegenre.idArticle = :id');
	$reponse->execute(array('id' => $id));

	$donnees = $reponse->fetchAll();

	return $donnees;
}


//Fonction pour créer une nouvelle commande
function new_commande($idUser, $status, $nbArticle, $addr, $cp, $ville ,$prixTotal) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('INSERT INTO commande VALUES(\'\', NOW(), :status, :nbArticle, :idUser, :addr, :cp, :ville, :prixTotal)');
	$reponse->execute(array(
		'idUser' => $idUser,
		'status' => $status,
		'nbArticle' => $nbArticle,
		'addr' => $addr,
		'cp' => $cp,
		'ville' => $ville,
		'prixTotal' => $prixTotal
	));

	$donnees = $reponse->fetch();

	return $donnees;
}


//Fonction pour récupérer la dernièere commande utilisée
function get_last_id() {
	$bdd = get_bdd();
	$reponse = $bdd->query('SELECT idCommande FROM commande ORDER BY idCommande DESC LIMIT 1');

	$donnees = $reponse->fetch();

	return $donnees;
}


//Fonction pour créer nouvelle commande
function new_article_commande($idArticle, $idCommande, $qte, $prix) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('INSERT INTO articlecommande VALUES(:idArticle, :idCommande, :qte, :prix)');
	$reponse->execute(array(
		'idArticle' => $idArticle,
		'idCommande' => $idCommande,
		'qte' => $qte,
		'prix' => $prix
	));

	$donnees = $reponse->fetch();

	return $donnees;
}


//Fonction pour modifier le prix d'une commande
function update_prix_commande($id, $prix) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('UPDATE commande SET prixTotal = :prix WHERE idCommande = :id');
	$erreur = $reponse->execute(array(
		'id' => $id,
		'prix' => $prix
	));

	return $erreur;
}


//Fonction pour récupérer les commande par utilisateur
function get_commandes_user($idUser) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT * FROM commande WHERE idUser = :idUser');
	$reponse->execute(array('idUser' => $idUser));

	$donnees = $reponse->fetchAll();

	return $donnees;
}


//Fonction pour récupérer les commandes
function get_commande($idCommande, $idUser) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT * FROM commande WHERE idCommande = :idCommande AND idUser = :idUser');
	$reponse->execute(array(
		'idCommande' => $idCommande,
		'idUser' => $idUser
	));

	$donnees = $reponse->fetch();

	return $donnees;
}


//Fonction pour récupérer les articles des commandes
function get_articles_commande($idCommande) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT article.nomArticle AS nom, articlecommande.prixArticle AS prixUnitaire, articlecommande.qteArticleCommande AS qte 
		FROM article INNER JOIN articlecommande 
		ON article.idArticle = articlecommande.idArticle
		WHERE articlecommande.idCommande = :idCommande');
	$reponse->execute(array(
		'idCommande' => $idCommande
	));

	$donnees = $reponse->fetchAll();

	return $donnees;
}

function get_stock_article($id) {
	$bdd = get_bdd();
	$reponse = $bdd->prepare('SELECT idArticle, nbStockArticle FROM article WHERE idArticle = :id');
	$reponse->execute(array(
		'id' => $id
	));

	$donnees = $reponse->fetch();

	return $donnees;
}
function get_genres_cd(){
	$bdd = get_bdd();
	$reponse = $bdd->query('SELECT * FROM genre WHERE idType=1');
	
	$donnees = $reponse->fetchAll();

	return $donnees;
} 
function get_articles_by_type($idType) {
 $bdd = get_bdd();
 $reponse = $bdd->prepare('SELECT * FROM article
  WHERE idType = :idType');
   $reponse->execute(array(
  
  'idType' => $idType
 ));

 $donnees = $reponse->fetchAll();

 return $donnees;
}
?>
