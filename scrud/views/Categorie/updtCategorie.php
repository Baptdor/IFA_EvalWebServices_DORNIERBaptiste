<div class="content">
    <a href="index.php?uc=Categorie&action=listCategorie">&larr; Retour</a>
    <h2 class="title">MODIFIER UNE CATÉGORIE</h2>

    <?php
    if (!empty($categorie)) 
    {
    ?>
        <form action="index.php?uc=Categorie&action=updtCategorie&id=<?php print($categorie->id) ?>&submit=true" method="post">
            <table class="form">
                <tr>
                    <td>Libellé</td>
                    <td><input type="text" name="categorieLibelle" value="<?php print($categorie->libelle) ?>" required/></td>
                </tr>
                <tr>
                    <td colspan="2" class="submit"><input type="submit" value="Modifier" class="btnSubmit"/></td>
                </tr>
            </table>
        </form>
    <?php
    }
    else print("Catégorie non trouvée.") ?>
</div>