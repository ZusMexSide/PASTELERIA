<?php 
include_once '../backend/modelo/BD.php';
include_once '../backend/modelo/MUsuario.php';
include_once '../backend/controlador/CUsuario.php';
session_start();
$admin = new CUsuario();
if (isset($_POST["usuario"]) && isset($_POST["password"])) {
    $admin->autentificar($_POST["usuario"], $_POST["password"]);
}

if (isset($_SESSION["autentificado"])) {
    header("Location: panel.php");
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
                       
                    </div>
                </div>
            </nav>
        </header>
<section id="login">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="galeria">
                        <h2>Administrador</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="formulario-admin">
                        <form action="post" >
                            <div class="form-group">
                                <label for="exampleInputEmail1">Usuario</label>
                                <input name="usuario"type="text" class="form-control" id="exampleInputEmail1"  placeholder="Ingresa tu usuario">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresa tu contraseña">
                            </div>
                            <button name="enviar"type="submit" class="btn btn-primary size">Ingresar</button>
                        </form>
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

