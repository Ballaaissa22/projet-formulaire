<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP Form & Table</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>

<h1 class="text-center text-primary">TP Form & Table</h1>

<?php

$fichier = "personnes.json";

if (file_exists($fichier)) {
    $personnes = json_decode(file_get_contents($fichier), true);
} else {
    $personnes = [];
}

if (isset($_POST['enregistrer'])) {

    $pers = [
        "prenom"  => $_POST['prenom'],
        "nom"     => $_POST['nom'],
        "adresse" => $_POST['adr'],
        "tel"     => $_POST['tel']
    ];

    $personnes[] = $pers;

    file_put_contents($fichier, json_encode($personnes, JSON_PRETTY_PRINT));
}
?>

<div class="container">
    <div class="row">

        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Ajout Personne</div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-2">
                            <label>Prénom</label>
                            <input class="form-control" type="text" name="prenom" required>
                        </div>
                        <div class="mb-2">
                            <label>Nom</label>
                            <input class="form-control" type="text" name="nom" required>
                        </div>
                        <div class="mb-2">
                            <label>Adresse</label>
                            <input class="form-control" type="text" name="adr" required>
                        </div>
                        <div class="mb-2">
                            <label>Téléphone</label>
                            <input class="form-control" type="text" name="tel" required>
                        </div>
                        <button class="btn btn-primary mt-2" name="enregistrer">
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des personnes</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                        </tr>

                        <?php if (!empty($personnes)): ?>
                            <?php foreach ($personnes as $i => $p): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= $p['prenom'] ?></td>
                                <td><?= $p['nom'] ?></td>
                                <td><?= $p['adresse'] ?></td>
                                <td><?= $p['tel'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">
                                    Aucune personne enregistrée
                                </td>
                            </tr>
                        <?php endif; ?>

                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>