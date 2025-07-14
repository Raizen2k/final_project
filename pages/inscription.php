<?php 
include("../inc/function.php");?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <?= $bootstrap?>
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow p-4">
                    <h1 class="text-center mb-4">Inscription</h1>

                    <form action="../traitement/traitement_inscription.php" method="get">
                        <div class="mb-3">
                            <label for="mail" class="form-label">Email</label>
                            <input type="email" name="mail" id="mail" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="mdp" class="form-label">Mot de passe</label>
                            <input type="password" name="mdp" id="mdp" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="anniv" class="form-label">Date de naissance</label>
                            <input type="date" name="anniv" id="anniv" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <select name="genre" id="genre" class="form-select" required>
                                <option value="M">Homme</option>
                                <option value="F">Femme</option>
                                <option value="O">Autre</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" name="ville" id="ville" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
