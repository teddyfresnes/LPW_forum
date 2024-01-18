<?php include 'header.php'; ?>

<meta charset="UTF-8">
<title>Topic Details</title>
<style>
    /* source fond arri√®re plan : https://codepen.io/finnhvman/pen/OJNjqwL */
    body { 
        background:
        43.3px 50px/86.6px 150px radial-gradient(1% 66% at 0 100%, tan 99%, transparent 0),
        43.3px 100px/86.6px 150px radial-gradient(1% 66% at 100% 0, tan 99%, transparent 0),
        0 25px/86.6px 150px radial-gradient(1% 66% at 100% 0, tan 99%, transparent 0),
        0 125px/86.6px 150px radial-gradient(1% 66% at 0 100%, tan 99%, transparent 0),
        0 100px/86.6px 150px linear-gradient(30deg, white 2.5%, tan 0 7.5%, white 0 12%, tan 0 13%, transparent 0),
        0 125px/86.6px 150px linear-gradient(30deg, white 5%, tan 0 10%, white 0 12.5%, transparent 0),
        43.3px 100px/86.6px 150px linear-gradient(210deg, white 5%, tan 0 10%, white 0 12.5%, transparent 0),
        43.3px 125px/86.6px 150px linear-gradient(210deg, white 2.5%, tan 0 7.5%, white 0 12%, tan 0 13%, transparent 0),
        43.3px 25px/86.6px 150px linear-gradient(30deg, white 2.5%, tan 0 7.5%, white 0 12%, tan 0 13%, transparent 0),
        43.3px 50px/86.6px 150px linear-gradient(30deg, white 5%, tan 0 10%, white 0 12.5%, transparent 0),
        0 25px/86.6px 150px linear-gradient(210deg, white 5%, tan 0 10%, white 0 12.5%, transparent 0),
        0 50px/86.6px 150px linear-gradient(210deg, white 2.5%, tan 0 7.5%, white 0 12%, tan 0 13%, transparent 0),
        43.3px 75px/86.6px 150px linear-gradient(150deg, transparent 37%, tan 0 38%, white 0 42.5%, tan 0 47.5%, white 0 52.5%, tan 0 57.5%, white 0 62%, tan 0 63%, transparent 0),
        0 0/86.6px 150px linear-gradient(150deg, transparent 37%,tan 0 38%, white 0 42.5%, tan 0 47.5%, white 0 52.5%, tan 0 57.5%, white 0 62%, tan 0 63%, transparent 0),
        0 0/86.6px 150px linear-gradient(90deg, tan 1%, white 0 10%, tan 0 20%, white 0 30%, tan 0 40%, white 0 49%, tan 0 51%, white 0 60%, tan 0 70%, white 0 80%, tan 0 90%, white 0 99%, tan 0);
    }

    h1 {
        margin-bottom: 0;
    }

    hr 
    {
        margin: 0;
    }

    .header_wrapper
    {
        width: 100%;
        background-color: #fefefe;
        border: 2mm ridge rgba(150, 120, 50, .6);
        border-right: none;
        border-left: none;
        margin-bottom: 5px;
    }

    .comments-section {
        width: 100%;
        margin: 20px auto;
    }

    .comment {
        width: 700px;
        background-color: white;
        /*border: 1px solid #ccc;*/
        border: 2mm ridge rgba(150, 120, 50, .6);
        border-radius: 5px;
        padding: 10px;
        padding-bottom: 0px;
        margin-bottom: 10px;
        list-style-type: none;
        clear: both;
    }

    .comment-reply {
        margin-left: 20px;
    }

    .comment-text {
        margin-bottom: 8px;
        text-align: left;
    }

    .comment-meta {
        font-size: 0.8em;
        color: #888;
        text-align: left;
        margin-top: 0;
    }

    .topic-title {
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .comments-section h2 {
        font-size: 1.2em;
        margin-bottom: 15px;
    }

     .comment-depth-1 {
        margin-left: 35px;
    }

    .comment-depth-2 {
        margin-left: 105px;
    }

    .comment-depth-3 {
        margin-left: 175px;
    }

    .comment-depth-4 {
        margin-left: 245px;
    }

    .comment-depth-5 {
        margin-left: 315px;
    }

    .comment-depth-6 {
        margin-left: 385px;
    }

    .comment-depth-7 {
        margin-left: 455px;
    }

    .comment-depth-8 {
        margin-left: 525px;
    }

    .comment-depth-9 {
        margin-left: 595px;
    }

    .comment-depth-10 {
        margin-left: 665px;
    }


    .reply-button {
        background-color: rgba(150, 120, 50, .6);
        color: white;
        border: 2px solid #eee;
        padding: 5px 50px 5px 50px;
        text-align: left;
        text-decoration: none;
        /*display: none;*/
        font-size: 12px;
        cursor: pointer;
        /*visibility: hidden;*/
        height: 30px;
    }

    .reply-button:hover {
        background-color: #444;
        /*display: inline-block;*/
        /*visibility: visible;*/
    }

    .button_comment {
        background-color: rgba(150, 120, 50, .6);
        color: white;
        border: 2px solid #eee;
        padding: 5px 50px 5px 50px;
        text-align: left;
        text-decoration: none;
        /*display: none;*/
        font-size: 12px;
        cursor: pointer;
        /*visibility: hidden;*/
        height: 30px;
    }

    .textarea_comment {
        height: 60px;
        width: 500px;
    }

    .reply-to {
        font-size: 12px; 
        color: #888; 
        margin: 0px;
        padding: 0px;
        text-align: left;
    }

    .avatar {
        width: 30px;
        height: 30px;
        margin-right: 10px;
        border-radius: 50%;
        object-fit: cover;
        float: left;
    }

    .comments-section div:nth-child(2) {
        width: 95%;
        border: 2mm ridge rgba(150, 120, 50, 1);
    }


</style>

<section>
<?php

    // nb: mettre une limite de rÈponse ‡ 10 (selon les rËgles css dispo)
    //var_dump($topic);
    //var_dump($_SESSION);
    
    date_default_timezone_set('Europe/Paris');

     // fonction rec affichage commentaire
     function echoComment($comment, $commentHierarchy) {
        echo '<div class="comment comment-depth-'.$comment['_depth'].'">';

        //affichage autheur et heure
        if (!empty($comment['authorDetails'])) {
            echo '<img src="View/avatar.png" alt="Avatar" class="avatar">';
            echo '<p class="comment-meta">'.$comment['authorDetails']['firstName'].' '.$comment['authorDetails']['lastName'].' - '.date('d/m/Y H:i:s', strtotime($comment['createdAt']->toDateTime()->format('Y-m-d H:i:s'))).'</p>';
        }
        // si message parent on affiche un extrait
        /*if (!empty($comment['parentId'])) { 
            var_dump($commentHierarchy[(string)$comment['parentId']][0]); var_dump($commentHierarchy[(string)$comment['parentId']][1]);
            $parentCommentText = substr($commentHierarchy[(string)$comment['parentId']][0]['text'], 0, 45);
            echo '<p class="reply-to">Retour pour <i>"'.$parentCommentText.'..."</i></p>';
        }*/
        // affichage des autres infos
        echo '<hr />';
        echo '<p class="comment-text">'.$comment['text'].'</p>';
        echo '<button id="reply-button-' . $comment['_id'].'" class="reply-button" onclick="toggleReplyForm(\'' . $comment['_id'] . '\')">Message</button>';
        echo '<div id="reply-form-' . $comment['_id'].'" style="display:none;">';
        echo '<form action="index.php?ctrl=topic&action=submitReply" method="post">';
        echo '<input type="hidden" name="commentId" value="'.$comment['_id'] . '">';
        echo '<input type="hidden" name="topicId" value="'.$comment['topicId'] . '">';
        echo '<textarea class="textarea_comment" name="replyText" placeholder="Votre message..." rows="4" cols="50"></textarea>';
        echo '<input class="button_comment" type="submit" value="Envoyer">';
        echo '</form>';
        echo '</div>';

        echo '</div>';

        // on affiche ensuite les commentaires enfants (pour eviter probleme d'ordre d'affichage dans le fil de discus)
        if (isset($comment['_id']) && isset($commentHierarchy[(string)$comment['_id']]) && is_array($commentHierarchy[(string)$comment['_id']])) {
            foreach ($commentHierarchy[(string)$comment['_id']] as $childComment) {
                echoComment($childComment, $commentHierarchy);
            }
        }
    }

    if (isset($topic)) {
        echo '<div class="comments-section">';
        echo '<div class="header_wrapper">';
        echo '<h1 class="topic-title">' . $topic['title'].'</h1>';
        echo '<p>'.$topic['creatorDetails']["firstName"].' '.$topic['creatorDetails']["lastName"].' - '.date('d/m/Y H:i:s', strtotime($topic['createdAt']->toDateTime()->format('Y-m-d H:i:s'))).'</p>';
        echo '<hr />';

        $depthMap = []; // pour la profondeur des coms (decalage a droite selon le nb de reponses)
        $commentHierarchy = []; // ordre d'affichage

        foreach ($topic['commentsDetails'] as $comment) {
            $parentId = $comment['parentId'];
            $comment['_depth'] = isset($depthMap[(string)$parentId]) ? $depthMap[(string)$parentId] + 1 : 0; // on prend la depth du parent et on rajoute 1
            $depthMap[(string)$comment['_id']] = $comment['_depth']; // on ajoute le comment ‡ la depthmap
            $commentHierarchy[(string)$parentId][] = $comment;
        }

        // affichage
        if (!empty($topic['commentsDetails'])) {
            echo '<h2>Commentaires :</h2>';
            echo '</div>';

            foreach ($commentHierarchy[null] as $comment) {
                echoComment($comment, $commentHierarchy);
            }
        } else {
            echo '<p>Pas de commentaires.</p>';
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo '<p>Topic introuvable.</p>';
    }
    ?>
</section>

<script> // afficher form
    function toggleReplyForm(commentId) {
        var replyForm = document.getElementById('reply-form-'+commentId);
        var replyButton = document.getElementById('reply-button-'+commentId);

        replyForm.style.display = 'block';
        replyButton.style.display = 'none';
    }
</script>

<?php include 'footer.php'; ?>
