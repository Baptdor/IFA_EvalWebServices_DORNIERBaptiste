<div class="content">
    <a href="index.php?uc=Article&action=listArticle">&larr; Retour</a>
    <h2 class="title">ÉCRIRE UN ARTICLE</h2>

    <form action="index.php?uc=Article&action=newArticle&submit=true" method="post">
        <table class="form">
            <tr>
                <td>Titre</td>
                <td><input type="text" name="articleTitre" required/></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="articleDescription" class="description" required></textarea></td>
            </tr>
            <tr>
                <td>Catégorie</td>
                <td>
                    <select name="articleCategorie">
                        <?php
                        foreach ($categories as $categorie)
                        {
                        ?>
                            <option value="<?php print($categorie->id) ?>"><?php print($categorie->libelle) ?></option>
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
                            <option value="<?php print($redacteur->id) ?>"><?php print($redacteur->nom." ".$redacteur->prenom) ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="submit"><input type="submit" value="Ajouter" class="btnSubmit"/></td>
            </tr>
        </table>
    </form>
</div>