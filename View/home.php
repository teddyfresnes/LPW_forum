<?php include 'header.php'; ?>



<section>
    <h2>Bienvenue sur la page principale</h2>
    <p>Vous êtes sur la page d'accueil de notre site.</p>

    <?php
        //var_dump($_SESSION);
        if (isset($_SESSION['user'])) {
            echo '<p>Vous vous êtes miraculeusement connecté. Félicitations !</p>';
           
            // check si on est bien sur le controller sinon on renvoie
            if (isset($topics))
            {
        echo '<div class="topics-section">';
        echo '<br/><br/><h2>Liste des Topics du Forum</h2>';
        echo "<a href=\"index.php?ctrl=topic&action=createTopic\">Create a New Topic</a>";
        echo '<ul class="topics-list">';
        foreach ($topics as $topic) {
            echo '<a href="index.php?ctrl=topic&action=displayTopicDetails&topicId='.$topic['_id'].'" class="topic-link">';
            echo '<li class="topic-item">';
            echo '<span class="left-content title">'.$topic['title'].'</span>';
            echo '<span class="right-content">';
            echo '<span class="name">'.$topic['name'].' - </span>';
            echo '<span class="date">'.date('d/m/Y', strtotime($topic['createdAt']->toDateTime()->format('Y-m-d H:i:s'))).'</span>';
            echo '</span>';
            echo '</li>';
            echo '</a>';
        }
        echo '</ul>';
        echo '</div>';
            }
            else
            {
                header("Location: index.php?ctrl=topic&action=display"); // on redirige vers l'affichage des topics
                exit();
            }
            echo '</div>';

            echo '<br/><br/><br/><br/><br/><br/><strong><a href="index.php?ctrl=User&action=showUsers">Afficher la liste des utilisateurs (pour les admin uniquement)</a></strong><br/>';
        }
        else
        {
            echo '<p>Vous n\'êtes pas connecté.</p>';
        }

    ?>
</section>

<?php include 'footer.php'; ?>