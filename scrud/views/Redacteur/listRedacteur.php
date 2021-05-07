<div class="content">
    <a href="index.php">&larr; Retour</a>
    <h2 class="title">LISTE DES RÉDACTEURS</h2>
    <a href="index.php?uc=Redacteur&action=newRedacteur">Ajouter un rédacteur</a>
    <br/>

    <?php
    if (!empty($redacteurs))
    {
    ?>
        <table class="list">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php
            foreach($redacteurs as $redacteur)
            {
            ?>
                <tr>
                    <td class="center"><?php print($redacteur->id) ?></td>
                    <td><?php print($redacteur->nom) ?></td>
                    <td><?php print($redacteur->prenom) ?></td>
                    <td><?php print($redacteur->email) ?></td>
                    <td class="center"><a href="index.php?uc=Redacteur&action=updtRedacteur&id=<?php print($redacteur->id) ?>">Modifier</a></td>
                    <td class="center"><a href="index.php?uc=Redacteur&action=delRedacteur&id=<?php print($redacteur->id) ?>">Supprimer</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    }
    else print("Aucun rédacteur trouvé.") 
    ?>
</div>