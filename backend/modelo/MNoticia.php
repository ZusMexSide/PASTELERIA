<?php
class MNoticias  extends BD{
    public function subirNoticia($titulo,$noticia,$ruta){
        try {
            $stmt=$this->conn->prepare("INSERT into noticias (titulo,noticia,url) values(:titulo, :noticia, :url)");
            $stmt->bindParam(':titulo',$titulo);
            $stmt->bindParam(':noticia',$noticia);
            $stmt->bindParam(':url',$ruta);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }
    public function consultarNoticia($id){
         try {
            $stmt = $this->conn->prepare("SELECT * FROM noticias where id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            foreach ($stmt->fetchAll() as $registro) {
                return $registro;
            }
            return null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function consultarTodas(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM noticias");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function consultarUltimas(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM noticias order by id  desc limit 4");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function modificarNoticia($id,$titulo,$noticia,$url){
        try {
           $stmt=$this->conn->prepare("UPDATE noticias set titulo=:titulo, noticia=:noticia, url=:url where id=:id");
           $stmt->bindParam(':titulo',$titulo);
           $stmt->bindParam(':noticia',$noticia);
           $stmt->bindParam(':url',$url);
           $stmt->bindParam(':id',$id);
           $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }
    public function eliminarNoticia($id){
        try {
            $stmt=$this->conn->prepare("DELETE from noticias where id=:id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    }
}


