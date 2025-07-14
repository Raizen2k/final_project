<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <form action="../traitement/traitement_inscription.php" method="get">
        <label for="mail">Email:</label>
        <input name="mail" type="email" required>
        <label for="mdp">Mot de passe:</label>
        <input name="mdp" type="password" required>
        <input type="text" name="nom" id="" required>
        <input type="date" name="anniv" id="" required>
        <select name="genre" id="" required>
            <option value="M">Homme</option>
            <option value="F">Femme</option>
            <option value="O">Autre</option>
        </select>
        <input type="text" name="ville" id="" required>
        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>