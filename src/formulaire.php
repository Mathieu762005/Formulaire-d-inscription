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
            <form class="row g-3 p-5" method="POST" action="comfirmation.php">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Nom</label>
                    <input type="text" name="nom" pattern="[a-zA-ZÀ-ÿ\- ]+" class="form-control" id="inputEmail4" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Prénom</label>
                    <input type="text" name="prenom" pattern="[a-zA-ZÀ-ÿ\- ]+" class="form-control" id="inputPassword4" required>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="inputAddress" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Pays</label>
                    <input type="text" name="pays" pattern="[a-zA-ZÀ-ÿ\- ]+" class="form-control" id="inputCity" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div>
                    <input type="radio" name="genre" value="Homme" class="btn-check" id="option5" autocomplete="off" checked>
                    <label class="btn" for="option5">Homme</label>

                    <input type="radio" name="genre" value="Femme" class="btn-check" id="option6" autocomplete="off" checked>
                    <label class="btn" for="option6">Femme</label>

                    <input type="radio" name="genre" value="Autre" class="btn-check" id="option7" autocomplete="off" checked>
                    <label class="btn" for="option7">Autre</label>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="cgu" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            CGU
                        </label>
                    </div>
                </div>
                <div class="col-12">
                        <button type="submit" class="btn btn-primary" onclick="window.location.href='confirmation.php'">Confirmer mon inscription</button>
                </div>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST['fname']);
                if (empty($name)) {
                    echo "Name is empty";
                } else {
                    echo $name;
                }
            }
            ?>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>