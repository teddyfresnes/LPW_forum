<?php include 'header.php'; ?>
    <h1>Connexion</h1>
    <hr/>
    <section id="main-section">
        <form action="index.php?ctrl=User&action=doLogin" method="POST">
            <label>Email :</label><br/>
            <input type="email" name="email" placeholder="Email.."/><br>
            <label>Mot de passe :</label><br/>
            <input type="password" name="password" placeholder="Mot de passe.."/><br>
            <p>
                <input type="submit" class="submit-btn" value="Se connecter">
            </p>
        </form>
    </section>
<?php include 'footer.php'; ?>