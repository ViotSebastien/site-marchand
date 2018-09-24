<section id="liste">	
<?php
foreach ($articles as $article) { // Parcoure la table articles
?>


	
			<article class="article">
				<h3><a href="?page=detailArticle&id=<?php echo $article['idArticle'] ?>"> <?php echo $article['nomArticle']; ?></a></h3> 
				<div class="divImageArticle"><a href="?page=detailArticle&id=<?php echo $article['idArticle'] ?>">
				<img src="imagesMini/<?php echo $article['addrImgArticle'] ?>" class="imageArticle"/></a></div><br/>
				<div class="infos">
					<p><?php echo nl2br($article['descripArticle']); ?></p>
					<a href="?page=detailArticle&id=<?php echo $article['idArticle'] ?>">plus d'information</a>
				</div>	
				<div class="achat">
					<p class="prix">Prix: <?php echo $article['prixArticle']; ?> €</p>
				</div>
				<p class="stock">Disponibilité: <?php echo $article['etatArticle']; ?></p>
				<?php
					if(isset($_SESSION['idUser'])) { // Si l'utilisateur est connecté alors il affiche un bouton ajouter au panier
				?>
				<div class="achat">
					<p><a href="?page=panier&action=ajoutArticle&id=<?php echo $article['idArticle'] ?>" class="ajout_pan"></a></p>
				</div>
				<?php
					}
				?>
			</article>

<?php
}
?>
		</section>