<div class="content">
    <a href="index.php?uc=Categorie&action=listCategorie">&larr; Retour</a>
    <h2 class="title">AJOUTER UNE CATÉGORIE</h2>

    <form action="index.php?uc=Categorie&action=newCategorie&submit=true" method="post">
        <table class="form">
            <tr>
                <td>Libellé</td>
                <td><input type="text" name="categorieLibelle" required/></td>
            </tr>
            <tr>
                <td colspan="2" class="submit"><input type="submit" value="Ajouter" class="btnSubmit"/></td>
            </tr>
        </table>
    </form>
</div>