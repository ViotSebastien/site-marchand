<?
if(session_id() == '') { // Si la session n'est pas démarré (pas d'identifiant de session)
	header('Location: ../index.php'); // On redirige vers le controleur global
}

require('modele/bdd.php');

$articles = '';
$genre_cd = get_genres_cd();

if(isset($_POST['search']) && !empty($_POST['search'])) {
 $articles = get_articles_criteres($_POST['search']);
} elseif(isset($_GET['idType'])) {
	
    $articles = get_articles_by_type($_GET['idType']);
} else {
 $articles = get_articles(); // Tous les articles
}
if(isset($_SESSION['idUser'])) { // Accueil connecté
	$user = get_user_id($_SESSION['idUser']);
	require('vue/accueil.php');
} else { // Accueil non connecté
	require('vue/accueilNC.php');
}
?>