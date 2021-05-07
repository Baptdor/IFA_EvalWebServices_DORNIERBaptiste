<div class="content">
    <a href="index.php?uc=Article&action=listArticle">&larr; Retour</a>
    <h2 class="title">MODIFIER UN ARTICLE</h2>

    <?php
    if (!empty($article)) 
    {
    ?>
        <form action="index.php?uc=Article&action=updtArticle&id=<?php print($article->id) ?>&submit=true" method="post">
            <table class="form">
                <tr>
                    <td>Titre</td>
                    <td><input type="text" name="articleTitre" value="<?php print($article->titre) ?>" required/></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="articleDescription" class="description" required><?php print($article->description) ?></textarea></td>
                </tr>
                <tr>
                    <td>Catégorie</td>
                    <td>
                        <select name="articleCategorie">
                            <?php
                            foreach ($categories as $categorie)
                            {
                            ?>
                                <option value="<?php print($categorie->id) ?>" <?php if ($article->categorie->id == $categorie->id) print("selected"); ?>><?php print($categorie->libelle) ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Rédacteur</td>
                    <td>
                        <select name="articleRedacteur">
                            <?php
                            foreach ($redacteurs as $redacteur)
                            {
                            ?>
                                <option value="<?php print($redacteur->id) ?>" <?php if ($article->redacteur->id == $redacteur->id) print("selected"); ?>><?php print($redacteur->nom." ".$redacteur->prenom) ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="submit"><input type="submit" value="Modifier" class="btnSubmit"/></td>
                </tr>
            </table>
        </form>
    <?php
    }
    else print("Article non trouvé.") ?>
</div>