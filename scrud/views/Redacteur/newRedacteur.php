<div class="content">
    <a href="index.php?uc=Redacteur&action=listRedacteur">&larr; Retour</a>
    <h2 class="title">AJOUTER UN RÉDACTEUR</h2>

    <form action="index.php?uc=Redacteur&action=newRedacteur&submit=true" method="post">
        <table class="form">
            <tr>
                <td>Nom</td>
                <td><input type="text" name="redacteurNom" required/></td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td><input type="text" name="redacteurPrenom" required/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="redacteurEmail" required/></td>
            </tr>
            <tr>
                <td colspan="2" class="submit"><input type="submit" value="Ajouter" class="btnSubmit"/></td>
            </tr>
        </table>
    </form>
</div>