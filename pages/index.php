<?php 
include("../inc/function.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <?= $bootstrap?>
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow p-4">
                    <h1 class="text-center mb-4">Connexion</h1>

                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger text-center">
                            Email ou mot de passe incorrect.
                        </div>
                    <?php endif; ?>

                    <form action="../traitement/traitement_login.php" method="get">
                        <div class="mb-3">
                            <label for="mail" class="form-label">Email</label>
                            <input type="email" name="mail" id="mail" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="mdp" class="form-label">Mot de passe</label>
                            <input type="password" name="mdp" id="mdp" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="inscription.php" class="text-decoration-none">Pas encore inscrit ? Créez un compte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
