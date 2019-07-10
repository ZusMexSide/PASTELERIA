<?php
include_once '../backend/modelo/BD.php';
include_once '../backend/modelo/MNoticia.php';
include_once '../backend/controlador/CNoticias.php';
include_once '../backend/modelo/MGaleria.php';
include_once '../backend/controlador/CGaleria.php ';
$noticias = new CNoticias();
$galeria=new CGaleria();
session_start();
if (!isset($_SESSION["autentificado"])) {
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:600,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Tangerine:700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:300,500,600,700&display=swap" rel="stylesheet">
        <title>La Artesanal</title>
    </head>

    <body data-spy="scroll" data-target="#navbar" data-offset="72">
        <header id="principal" class="fixed-top ">
            <nav id="header" class=" navbar navbar-expand-lg navbar-light bg-light pb-3 pt-3 ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Pasteleria La Artesanal</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="../index.php" class="nav-link sombreado">Regresar</a>
                            </li>
                            <li>
                                <a href="../backend/salir.php" class="nav-link sombreado"><i class="fa fa-power-off"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!--panel-->
        <section id="panel">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">

                        <h2 class="display-4">Panel de administracion</h2> <br>
                        <h2>Bienvenido <?php echo $_SESSION["autentificado"]["usuario"] ?></h2>
                        <div class="row  ">
                            <div class="col-6 mt-5 text-center">
                                <h1 class="mb-4">Noticias</h1>
                                <a class="mt-4 btn btn-primary size"href="nuevo.php">Nueva Noticia</a>
                                <hr>
                                <div class="row">
                                    <?php echo $noticias->mostrarNoticasAdmin() ?>
                                </div>
                            </div>
                            <div class="col-6 mt-5 text-center">
                                <h1 class="mb-4">Slider</h1>
                                <a class="mt-4 btn btn-primary size" href="nuevafoto.php">Nueva Foto</a>
                                <hr class="mb-4">
                                <div class="row">
                                    <?php echo $galeria->mostrarGaleriaAdmin() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--footer-->
        <footer class="mt-5">
            <div class="container pb-2 pt-2">
                <div class="row text-center text-white ">
                    <div class="col-12 mb-4">
                        <p class="slogan pt-2  h4 mt-0">
                            Una expresion de arte y sabor</p>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <span class=" mb-2"><i class="fa fa-facebook-official fa-lg"></i>
                            Pastelería La Artesanal</span>
                    </div>
                    <div class=" mb-3 col-lg-4 ">
                        <span class=" mb-2 "><i class="fa fa-whatsapp fa-lg" aria-hidden="true"></i>
                            2381811768
                        </span>
                    </div>
                    <div class="mb-3 col-lg-4 ">
                        <span class=" mb-2 "><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                            INDEPENDENCIA Oriente 75760 Tehuacán</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>

