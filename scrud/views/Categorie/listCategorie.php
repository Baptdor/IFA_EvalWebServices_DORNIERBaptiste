<div class="content">
    <a href="index.php">&larr; Retour</a>
    <h2 class="title">LISTE DES CATÉGORIES</h2>
    <a href="index.php?uc=Categorie&action=newCategorie">Ajouter une catégorie</a>
    <br/>

    <?php
    if (!empty($categories))
    {
    ?>
        <table class="list">
            <tr>
                <th>Id</th>
                <th>Libellé</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php
            foreach($categories as $categorie)
            {
            ?>
                <tr>
                    <td class="center"><?php print($categorie->id) ?></td>
                    <td><?php print($categorie->libelle) ?></td>
                    <td class="center"><a href="index.php?uc=Categorie&action=updtCategorie&id=<?php print($categorie->id) ?>">Modifier</a></td>
                    <td class="center"><a href="index.php?uc=Categorie&action=delCategorie&id=<?php print($categorie->id) ?>">Supprimer</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    }
    else print("Aucune catégorie trouvée.") 
    ?>
</div>