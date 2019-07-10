<?php
$noticias = new CNoticias();
session_start();
$error = "";
$enviado="";
if (!isset($_SESSION["autentificado"])) {
    header("Location: index.php");
}
if (isset($_GET['id'])) {
    $noticia = $noticias->mostrarNoticia($_GET['id']);
} else {
    header("Location: panel.php");
}
if (isset($_POST['enviado'])) {
    if (!empty($_POST['id']) && empty($_POST['titulo']) && empty($_POST['noticia']) && empty($_FILES['imagen']['tmp_name'])) {
        $error = "No se inserto ningún campo";
    } else {
        if (!empty($_POST['titulo'])) {
            $titulo = $_POST['titulo'];
        } else {
            $titulo = $noticia['titulo'];
        }
        if (!empty($_POST['noticia'])) {
            $new = $_POST['noticia'];
        } else {
            $new = $noticia['noticia'];
        }
        if (!empty($_FILES['imagen']["tmp_name"])) {
            unlink("../".$noticia['url']);
            copy($_FILES['imagen']["tmp_name"], "../img/" .$_FILES['imagen']['name']);
            $url = "/img/" . $_FILES['imagen']['name'];
        } else {
            $url = $noticia['url'];
        }
    }
    if(empty($error)){
        $enviado=true;
    }
    if ($enviado){
    $noticias->actualizarNoticia($_POST['id'], $titulo, $new, $url);
    header('Location: editar_noticia.php?id='.$noticia['id']);
}
}
