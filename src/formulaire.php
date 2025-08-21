<?php
// var_dump($_POST);

// Création de regeX
$regName = "/^[a-zA-Zàèé\-]+$/";

// Je ne lance qu'uniquement lorsqu'il y a un formulaire validée via la méthod POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // je créé un tableau d'erreurs vide car pas d'erreur
    $errors = [];

    if (isset($_POST["nom"])) {
        // on va vérifier si c'est vide
        if (empty($_POST["nom"])) {
            // si c'est vide, je créé une erreur dans mon tableau
            $errors['nom'] = 'Nom obligatoire';
        } else if (!preg_match($regName, $_POST["nom"])) {
            // si ça ne respecte pas la regeX
            $errors['nom'] = 'Caractère(s) non autorisé(s)';
        }
    }

    if (isset($_POST["prenom"])) {
        // on va vérifier si c'est vide
        if (empty($_POST["prenom"])) {
            // si c'est vide, je créé une erreur dans mon tableau
            $errors['prenom'] = 'Prénom obligatoire';
        } else if (!preg_match($regName, $_POST["prenom"])) {
            // si ça ne respecte pas la regeX
            $errors['prenom'] = 'Caractère(s) non autorisé(s)';
        }
    }

    if (isset($_POST["email"])) {
        // on va vérifier si c'est vide
        if (empty($_POST["email"])) {
            // si c'est vide, je créé une erreur dans mon tableau
            $errors['email'] = 'Mail obligatoire';
        } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            // si mail non valide, on créé une erreur
            $errors['email'] = 'Mail non valide';
        }
    }

    if (isset($_POST["pays"])) {
        // on va vérifier si c'est vide
        if (empty($_POST["pays"])) {
            // si c'est vide, je créé une erreur dans mon tableau
            $errors['pays'] = 'Pays obligatoire';
        } else if (!preg_match($regName, $_POST["pays"])) {
            // si ça ne respecte pas la regeX
            $errors['pays'] = 'Caractère(s) non autorisé(s)';
        }
    }

    if (isset($_POST["message"])) {
        // on va vérifier si c'est vide
        if (empty($_POST["message"])) {
            // si c'est vide, je créé une erreur dans mon tableau
            $errors['message'] = 'Message obligatoire';
        } else if (!filter_var($_POST["message"])) {
            // si ça ne respecte pas la regeX
            $errors['message'] = 'Caractère(s) non autorisé(s)';
        }
    }

    if (!isset($_POST['cgu'])) {
        $errors['cgu'] = 'CGU obligatoire';
    }

    if (!isset($_POST['genre'])) {
        $errors['genre'] = 'préciser votre genre';
    }


    if (empty($errors)) {
        header("Location: confirmation.php?email=" . $_POST["email"]);
    }
}



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <div>
            <h1 class="text-center mt-5 fw-bold">Formulaire</h1>
        </div>
        <div class="formulaire container border rounded-4 mt-5">
            <form class="row g-3 p-5" method="POST" action="" novalidate>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Nom</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["nom"] ?? '' ?></span>
                    <input type="text" name="nom" value="<?= $_POST["nom"] ?? "" ?>" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Prénom</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["prenom"] ?? '' ?></span>
                    <input type="text" name="prenom" value="<?= $_POST["prenom"] ?? "" ?>" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">E-mail</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["email"] ?? '' ?></span>
                    <input type="email" name="email" value="<?= $_POST["email"] ?? "" ?>" class="form-control" id="inputAddress">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Pays</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["pays"] ?? '' ?></span>
                    <input type="text" name="pays" value="<?= $_POST["pays"] ?? "" ?>" class="form-control" id="inputCity">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["message"] ?? '' ?></span>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="entre ton message"><?= $_POST["message"] ?? "" ?></textarea>
                </div>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" value="Homme" id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Homme</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" value="Femme" id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Femme</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" value="Ne pas précisé" id="inlineRadio1">
                        <label class="form-check-label" for="inlineRadio1">Ne pas précisé</label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["genre"] ?? '' ?></span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="cgu" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            accepte les CGU
                        </label><span class="ms-2 text-danger fst-italic fw-light"><?= $errors["cgu"] ?? '' ?></span>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Confirmer mon inscription</button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>