<?php
$delete=new CNoticias();
session_start();
if (!isset($_SESSION["autentificado"])) {
    header("Location: index.php");
}
if (isset($_GET["id"])) {
    $noticia = $delete->mostrarNoticia($_GET['id']);
} else {
    header("Location: panel.php");
}
if (isset($_POST['enviado'])){
    $delete->borrarNoticia($_POST['id']);
    unlink("../".$noticia['url']);
    header('Location: panel.php');
}