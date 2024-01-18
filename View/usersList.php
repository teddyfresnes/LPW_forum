<?php include 'header.php'; ?>

<section>
    <h2>Liste des utilisateurs</h2>
    <?php
        // Afficher la liste des utilisateurs ici
        foreach ($users as $user) {
            echo '<p>'.$user->getFirstName().' '. $user->getLastName().'</p>';
        }
    ?>
    <a href="index.php">Revenir à la page d'accueil</a>
</section>

<?php include 'footer.php'; ?>