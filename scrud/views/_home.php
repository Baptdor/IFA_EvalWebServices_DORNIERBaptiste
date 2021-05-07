<div class="content">
    <h2 class="title">ACCUEIL</h2>

    <?php
    if (!empty($articles))
    {
        foreach ($articles as $article)
        {
        ?>
            <table class="article">
                <tr><td><h3><?php print($article->titre); ?></h3></td></tr>
                <tr><td><h5>Écrit par <?php print($article->redacteur->nom." ".$article->redacteur->prenom); ?></h5></td></tr>
                <tr><td><p class="justify"><?php print($article->description); ?></p></td></tr>
                <tr><td>Catégorie : <?php print($article->categorie->libelle); ?></td></tr>
            </table>
        <?php    
        }
    }
    else print("Aucun article trouvé.");
    ?>
</div>