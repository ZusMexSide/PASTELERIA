<?php
$delete=new CGaleria();
session_start();
if (!isset($_SESSION["autentificado"])) {
    header("Location: index.php");
}
if (isset($_GET["id"])) {
    $foto = $delete->mostrarFotoEditar($_GET["id"]);
} else {
    header("Location: panel.php");
}
if (isset($_POST['enviado'])){
    $delete->borrarFoto($_POST['id']);
    unlink("../".$foto['url']);
    header('Location: panel.php');
}