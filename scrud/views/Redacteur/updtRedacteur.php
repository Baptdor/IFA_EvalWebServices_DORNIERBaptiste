<div class="content">
    <a href="index.php?uc=Redacteur&action=listRedacteur">&larr; Retour</a>
    <h2 class="title">MODIFIER UN RÉDACTEUR</h2>

    <?php
    if (!empty($redacteur)) 
    {
    ?>
        <form action="index.php?uc=Redacteur&action=updtRedacteur&id=<?php print($redacteur->id) ?>&submit=true" method="post">
            <table class="form">
                <tr>
                    <td>Nom</td>
                    <td><input type="text" name="redacteurNom" value="<?php print($redacteur->nom) ?>" required/></td>
                </tr>
                <tr>
                    <td>Prénom</td>
                    <td><input type="text" name="redacteurPrenom" value="<?php print($redacteur->prenom) ?>" required/></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="redacteurEmail" value="<?php print($redacteur->email) ?>" required/></td>
                </tr>
                <tr>
                    <td colspan="2" class="submit"><input type="submit" value="Modifier" class="btnSubmit"/></td>
                </tr>
            </table>
        </form>
    <?php
    }
    else print("Rédacteur non trouvé.") ?>
</div>