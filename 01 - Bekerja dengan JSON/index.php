<?php
    require_once "php/functions.php";

    $data = file_get_contents("data/pizza.json");

    $menu = json_decode($data, true);
    $menu = $menu["menu"];

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>WPU HUT</title>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid ps-5">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" width="120">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">All Menu</a>
                    <a class="nav-link" href="#">Pizza</a>
                    <a class="nav-link" href="#">Pasta</a>
                </div>
                </div>
            </div>
        </nav>

        <div class="container">

            <div class="row">
                <div class="col mt-3">
                    <h1>All Menu</h1>
                </div>
            </div>

            <div class="row">
                <?php foreach($menu as $row) : ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="img/menu/<?= $row["gambar"]; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["nama"]; ?></h5>
                            <p class="card-text"><?= $row["deskripsi"]; ?></p>
                            <h5 class="card-title mb-2">Rp. <?= priceFormat($row["harga"]); ?></h5>
                            <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>