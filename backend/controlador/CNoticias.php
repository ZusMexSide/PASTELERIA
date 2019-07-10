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
        $acu=array();
        $i=0;
        for ($index = 0; $index < 1; $index++) {
            $acu[0] = '<div class="col-md-4 mb-4 ">
            <div id="ultima" class=" align-middle card text-center  color-noticias">
              <img src="'.$noticias[0]['url'].'" class="card-img-top" alt="...">
              <div class="card-body  ">
                <h5 class="card-title">'.$noticias[0]['titulo'].'</h5>
                <p class=" card-text text-truncate text-break">'.$noticias[0]['noticia'].'</p>
                <a href="noticias.php?id='.$noticias[0]['id'].'" class="btn btn-primary size ">Leer más</a>
              </div>
            </div>
          </div>';
        }
        for ($index = 1; $index < 4; $index++){
            $acu[$index]=' <div class="card mb-3  recientes color-noticias">
              <div class="row no-gutters">
                <div class="col-6 col-lg-5">
                  <img src="'.$noticias[$index]['url'].'" class="card-img" alt="...">
                </div>
                <div class="col-6 col-lg-7 ">
                  <div class="card-body  text-center ">
                    <h5 class="card-title">'.$noticias[$index]['titulo'].'</h5>
                    <p class="card-text  text-truncate">'.$noticias[$index]['noticia'].'</p>
                    <a href="noticias.php?id='.$noticias[$index]['id'].'" class="btn btn-primary   size ">Leer más</a>
                  </div>
                </div>
              </div>
            </div>';
        }
       
            
       
        return $acu;
    }
    public function mostrarTodas(){
        $noticias= $this->modelo->consultarTodas();
        $acu="";
        foreach($noticias as $noticia){
            $acu.='<div class="col-12 mt-5 mb-5 ">
                        <h2>'.$noticia["titulo"] .'</h2>
                        <hr>
                    </div>
                    <div class="col-12 ">
                        <img class="mb-5 img-fluid" src="'.$noticia["url"] .'" alt="">
                   </div>
                    <div class="col-12  mb-3">
                        <p>'.$noticia["noticia"].'</p>
                       
                    </div>
                    <div class="col-12  mb-5">
        <a class="btn btn-primary size" href="noticias.php?id='.$noticia['id'].'">leer</a></div>';
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
  $ruta="img/".$url["name"];
    $this->modelo->subirNoticia($titulo, $noticia, $ruta);
}
public function actualizarNoticia($id, $titulo, $noticia, $url){
    
    $this->modelo->modificarNoticia($id, $titulo, $noticia, $url);
}
public function borrarNoticia($id){
    $this->modelo->eliminarNoticia($id);
}
}

