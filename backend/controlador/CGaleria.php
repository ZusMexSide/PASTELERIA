<?php

class CGaleria {

    private $modelo;

    public function __construct() {
        $this->modelo = new MGaleria();
    }

    public function mostrarGaleriaAdmin() {
        $galeria = $this->modelo->consultaTodaGaleria();
        $acu = "";
        $i = 0;
        foreach ($galeria as $foto) {
            $acu .= '<div class="col-12"><h2 class="mt-3 mb-3">foto' . " " . $i++ . '</h2><img class="img-fluid" src="../' . $foto['url'] . '"></div>' . ' <div class="col-12"><a href="eliminar.php?id=' . $foto["id"] . '"><i class="fa-4x fa fa-trash"></i></a></h3></div>';
        }
        return $acu;
    }

    public function borrarFoto($id) {
        $this->modelo->elimarFotoBD($id);
    }

    public function actualizarFoto($id, $url) {
        $this->modelo->updateFoto($id, $url);
    }

    public function mostrarFotoEditar($id) {
        $foto = $this->modelo->consultarFoto($id);
        return $foto;
    }

    public function subirFotoNueva($foto) {
        copy($foto["tmp_name"], "../img/" . $foto["name"]);
        $this->modelo->insertarFoto("./img/" . $foto["name"]);
    }

    public function mostrarTodo() {
        $fotos = $this->modelo->consultaTodaGaleria();
        return $fotos;
    }

}
