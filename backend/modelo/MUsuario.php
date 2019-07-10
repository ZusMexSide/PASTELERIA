<?php

class MUsuario extends BD {
   public function consultarUsuario($usuario){
         try {
            $stmt = $this->conn->prepare("SELECT * FROM usuarios where usuario=:usuario");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
