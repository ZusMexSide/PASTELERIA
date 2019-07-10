<?php
class CNoticias {
    private $modelo;
     public function __construct() {
        $this->modelo= new MNoticias();
       
    }
    public function mostrarNoticia($id){
        $noticia= $this->modelo->consultarNoticia($id);
        return $noticia;
    }
    public function mostrarNoticiasPrincipal(){
        $noticias = $this->modelo->consultarUltimas();
        $acu=[];
        $i=0;
        foreach ($noticias as $noticia){
            $acu[$i++] = $noticia;
        }
        return $acu;
    }
    public function mostrarTodas(){
        $noticias= $this->modelo->consultarTodas();
        $acu="";
        foreach($noticias as $noticia){
            $acu.='<div class="row">
                <div class="col-12">
                    <div class="galeria">
                        <h2> '. $noticia["titulo"] .'</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <center>
                            <img src="'.$noticia["url"].'" alt="">
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="texto">
                            '. $noticia["noticia"].'</div>
                                <a href="noticia.php?id='.$noticia["id"].'">Request A Quote</a>
                    </div>
                </div>
            </div>';
        }
        return $acu;
    }
public function mostrarNoticasAdmin(){
    $noticias=$this->modelo->consultarTodas();
    $acu="";
        foreach ($noticias as $noticia){
            $acu.='<h3 class="mr-1 mt-5">'.$noticia["titulo"].' | '.'<a class="ml-1"href="editar_noticia.php?id='.$noticia["id"].'"><i class="fa fa-pencil-square-o"></i></a>'.' | '.'<a class="ml-1" href="eliminar_noticia.php?id='.$noticia["id"].'"><i class="fa fa-trash"></i></a></h3>';
        }
        return $acu;
}
public function nuevaNoticia($titulo,$noticia,$url){
    copy($url["tmp_name"], "../img/".$url["name"]);
  $ruta="/img/".$url["name"];
    $this->modelo->subirNoticia($titulo, $noticia, $ruta);
}
public function actualizarNoticia($id, $titulo, $noticia, $url){
    
    $this->modelo->modificarNoticia($id, $titulo, $noticia, $url);
}
public function borrarNoticia($id){
    $this->modelo->eliminarNoticia($id);
}
}

