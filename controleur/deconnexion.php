<?php

if(session_id() == '') { // Si la session n'est pas démarré (pas d'identifiant de session)
	header('Location: ../index.php'); // On redirige vers le controleur global
}

session_destroy();
header('Location: ?page=accueil');

?>