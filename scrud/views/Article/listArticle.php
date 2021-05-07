<div class="content">
    <a href="index.php">&larr; Retour</a>
    <h2 class="title">LISTE DES ARTICLES</h2>
    <form action="index.php?uc=Article" method="post">
        <table class="search">
            <tr>
                <td><input type="text" placeholder="Rechercher..." name="search"/></td>
                <td><input type="submit" value="OK" class="btnSubmit"/></td>
            </tr>
        </table>
    </form>
    <a href="index.php?uc=Article&action=newArticle">Écrire un article</a>
    <br/>

    <?php
    if (!empty($articles))
    {
    ?>
        <table class="list">
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Résumé</th>
                <th>Catégorie</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php
            foreach($articles as $article)
            {
            ?>
                <tr>
                    <td class="center"><?php print($article->id); ?></td>
                    <td><?php print($article->titre); ?></td>
                    <td><?php print($article->resumeCourt); ?></td>
                    <td><?php print($article->categorie->libelle); ?></td>
                    <td class="center"><a href="index.php?uc=Article&action=updtArticle&id=<?php print($article->id) ?>">Modifier</a></td>
                    <td class="center"><a href="index.php?uc=Article&action=delArticle&id=<?php print($article->id) ?>">Supprimer</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    }
    else print("Aucun article trouvé.") 
    ?>
</div>