<?php

class MGaleria extends BD {

    public function consultaTodaGaleria() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM galeria ");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function consultarFoto($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM galeria where id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            foreach ($stmt->fetchAll() as $foto) {
                return $foto;
            }
            return null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insertarFoto($url) {
        try {
            $stmt = $this->conn->prepare("insert into galeria (url)values (:url)");
            $stmt->bindParam(':url', $url);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateFoto($id, $url) {
        try {
            $stmt = $this->conn->prepare("update galeria set url=:url where id=:id");
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function elimarFotoBD($id) {
        try {
            $stmt = $this->conn->prepare("DELETE from galeria where id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}
