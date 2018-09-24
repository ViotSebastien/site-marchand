<?php
if(session_id() == '') { // Si la session n'est pas démarré (pas d'identifiant de session)
	header('Location: ../index.php'); // On redirige vers le controleur global
}

$login = (isset($_POST['login']))?$_POST['login']:'';
$prenom = (isset($_POST['prenom']))?$_POST['prenom']:'';
$nom = (isset($_POST['nom']))?$_POST['nom']:'';
$email = (isset($_POST['email']))?$_POST['email']:'';
$addr = (isset($_POST['addr']))?$_POST['addr']:'';
$cp = (isset($_POST['cp']))?$_POST['cp']:'';
$ville = (isset($_POST['ville']))?$_POST['ville']:'';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Exi@store - Inscription</title>
	</head>
	<body>
	<header>
	<h1>Exiastore Exi@store</h1>					<!--référencement-->
	<h2>Vente en ligne de produits culturels</h2>	<!--référencement-->
	<a href="?page=accueil" id="accueil"></a>
	<div id="session">
		<ul class="nav">
			<li class="nav-item" id="bienvenue"><p>Inscription </p></li>
			<li class="nav-item" id="insc"><a href="?page=accueil">Retour accueil</a></li>
		</ul>
	</div>
	</header>
	<div class="pageinscription">
<?php
if($erreur == 1) {
	echo '<span style="color:red;"><br/>Erreur :<br/>'.$message_erreur.'</span>';
}

if(!isset($ok)) {
?>
		<form action="?page=inscription" method="POST">
			<p>
				<Label>Prénom :</Label><input type="text" name="prenom" value="<?php echo $prenom; ?>" autocomplete="off"/> <span class="obligatoire">*</span><br/>
				<Label>Nom :</Label> <input type="text" name="nom" value="<?php echo $nom; ?>" autocomplete="off"/> <span class="obligatoire">*</span><br/>
				<Label>Adresse Email :</Label> <input type="email" name="email" value="<?php echo $email; ?>" autocomplete="off"/> <span class="obligatoire">*</span><br/>
				<Label>Login :</Label> <input type="text" name="login" value="<?php echo $login; ?>" autocomplete="off"/> <span class="obligatoire">*</span><br/>
				<Label>Mot de passe :</Label> <input type="password" name="mdp" autocomplete="off"/> <span class="obligatoire">*</span> Doit être supérieur à 6 caractères<br/>
				<Label>Vérification du mot de passe :</Label> <input type="password" name="mdp2" autocomplete="off"/> <span class="obligatoire">*</span><br/>
				<Label>Adresse :</Label> <input type="text" name="addr" value="<?php echo $addr; ?>" autocomplete="off"/><br/>
				<Label>Code postal :</Label> <input type="text" name="cp" value="<?php echo $cp; ?>" autocomplete="off"/><br/>
				<Label>Ville :</Label> <input type="text" name="ville" value="<?php echo $ville; ?>" autocomplete="off"/><br/>
				<input type="submit" value="S'inscrire" class="btn btn-primary"/>
				
			</p>
		</form>
		
		<p><span class="obligatoire">*</span> : champ obligatoire</p>
<?php
} else {
?>
<p>Inscription effectuée avec succès</p>
<a href="?page=accueil" class="btn btn-primary">Retour vers la page d'accueil</a>
<?php
}
?>
</div>
<footer>
		<div id="footer_main">
				<ul>
					<li><a id="accueilfoot" href="?page=accueil"></a></li>
					<li><a class="social" id="fb" href="#"></a></li>
					<li><a class="social" id="tweet" href="#"></a></li>
					<li><a class="social" id="rss" href="#"></a></li>
					<li><a class="social" id="and" href="#"></a></li>
				</ul>	
		</div>
		
		<div id="footer_links">
			<a href="#">A propos</a>
			<a href="#">Presse</a>
			<a href="#">Droits d'auteur</a>
			<a href="#">Créateurs</a>
			<a href="#"></a>
		</div>
		
		<div id="footer_links2">
			<a href="#">Conditions d'utilisation</a>
			<a href="#">Mentions légales</a>
			<a href="#">Règles et sécurité</a>
			<a href="#">TPs</a>
			<p>©2015 Viodier prod</p>
	
		</div>
	</footer>
	</body>
</html>