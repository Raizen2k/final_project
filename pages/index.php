<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color: red;'>Email ou mot de passe incorrect.</p>";
    }  
    
    ?>
    <form action="../traitement/traitement_login.php" method="get">
        <p>Email : </p>
        <input name="mail" type="email">
        <p>Mot de passe : </p>
        <input name="mdp" type="text">
        <input type="submit" value="Se connecter">
    </form>
    <a href="inscription.php">Inscription</a>  
</body>
</html>