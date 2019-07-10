<?php

class CUsuario {

    private $modelo;

    public function __construct() {
        $this->modelo = new MUsuario();
    }

    public function autentificar($usuario, $password) {
        $pass = $password;
        $users = $this->modelo->consultarUsuario($usuario);
        foreach ($users as $user) {
            $hash = $user['password'];
        }
        if (password_verify($pass, $hash)) {
            $_SESSION["autentificado"] = $user;
            header("Location: panel.php");
        } else {
            return $error = "la contraseña es incorrecta";
        }
    }

}
