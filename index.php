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
                        <a class="navbar-brand text-white" href="#">
                            <img src="./recursos/logNav.png" class="logoNav" alt=""> Rick and Morty</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="./personajes.php">Personajes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="./capitulos.php">Capitulos</a>
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
        <!--Articulos-->
        <div class="text-center">
            <p class="fs-2 mt-4 text-white">Personajes Capitulo 1</p>
        </div>

        <div class="container">
            <div class="row" id="infoCharacters">
                <?php
            //inicio de sesion
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://rickandmortyapi.com/api/episode/1');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //consulta de curl_setopt
            $response = curl_exec($ch);
            //convertir a JSON
            $decoded = json_decode($response, true);
            //sacar los paramatros del JSON
            foreach ($decoded['characters'] as $data) {
                $sh = curl_init();

                curl_setopt($sh, CURLOPT_URL, $data);
                curl_setopt($sh, CURLOPT_RETURNTRANSFER, true);
                //consulta de curl_setopt
                $respuesta = curl_exec($sh);
                //convertir a JSON
                $json = json_decode($respuesta, true);
                $name = $json['name'];
                $image = $json['image'];
                $status = $json['status'];
                $species = $json['species'];
                $gender = $json['gender'];
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
        <div class="text-center">
            <p class="fs-2 text-white">Personajes Aleatorios</p>
        </div>
        <div class="container">
            <div class="row">
                <?php
                for($i = 0; $i < 3; $i++){
                    $random = rand(1, 820);
                    $sh = curl_init();
                    curl_setopt($sh, CURLOPT_URL, "https://rickandmortyapi.com/api/character/$random");
                    curl_setopt($sh, CURLOPT_RETURNTRANSFER, true);
                    //consulta de curl_setopt
                    $respuesta = curl_exec($sh);
                    //convertir a JSON
                    $json = json_decode($respuesta, true);
                    $name = $json['name'];
                    $image = $json['image'];
                    $status = $json['status'];
                    $species = $json['species'];
                    $gender = $json['gender'];

                        //3 tarjetas centradas
                        echo "<div class='col-12 col-md-6 col-lg-4 col-xl-4 mt-5'>
                                    <div class='card mb-3'>
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

    <!--bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>

<?php

?>