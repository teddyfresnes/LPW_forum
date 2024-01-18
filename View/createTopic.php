<?php include 'header.php'; ?>
    <h1>Create a New Topic</h1>
    <section class="main-section">
        <form action="index.php?ctrl=topic&action=createTopic" method="post">
            <label for="Titre du sujet">Title:</label>
            <input type="text" id="title" name="title" required>
            <br>
            <label for="content">Contenu:</label>
            <textarea id="content" name="content" rows="4" cols="50" required></textarea>
            <br>
            <input type="submit" value="Create Topic">
        </form>
    </section>
<?php include 'footer.php'; ?>