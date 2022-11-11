<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Rick and morty</title>
    <!--CSS -->
    <link rel="stylesheet" href="style.css">
    <!--bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <div class="classM1">
        <section class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-expand-lg colorNav">
                    <div class="container-fluid ">
                        <a class="navbar-brand text-white" href="./index.php">
                            <img src="./recursos/logNav.png" class="logoNav" alt=""> Rick and Morty</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active text-white" aria-current="page"
                                        href="./index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="./personajes.php">Personajes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="./capitulos.php">Capitulos</a>
                                </li>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="./buscar.php">Buscar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </section>

        <div class="container">
            <div class="row" id="infoCharacters">
                <?php
                echo"        <form class='d-flex' role='search'>
                <input class='form-control me-2' type='search' placeholder='ID del Episodio' aria-label='Search' name='ID'>
                <button class='btn btn-outline-success' type='submit'>Buscar</button>
            </form>";
                $episode = isset($_GET["ID"]);

                $url = "https://rickandmortyapi.com/api/episode/".$episode;
                $json = file_get_contents($url);
                $data = json_decode($json, true);
                $characters = $data['characters'];

                foreach ($characters as $character) {
                    $json = file_get_contents($character);
                    $data = json_decode($json, true);
                    $name = $data['name'];
                    $image = $data['image'];
                    $status = $data['status'];
                    $species = $data['species'];
                    $gender = $data['gender'];
                    //tarjetas centradas en html
                    echo "<div class='col-12 col-md-6 col-lg-4 col-xl-3 mt-4'>
                        <div class='card mb-3'>
                        <!--animacion que afecta a todas las imagenes-->
                        <style> 
                        img{
                            border-radius: 50%
                        }
                        img:hover {
                            filter: grayscale(80%);
                            transition: all .5s ease-in-out;
                        }
                        </style>
                            <img src='$image' class='card-img-top' alt='Imagen de $name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$name</h5>
                                <p class='card-text'>Estatus: $status</p>
                                <p class='card-text'>Especie: $species</p>
                                <p class='card-text'>Genero: $gender</p>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>


    <body>

    </body>

</html>