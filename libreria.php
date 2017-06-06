<?php

class libreria{
    private $_datos;
    private $_consulta;
    
    public function __construct(){
//      $this->_datos =array();
//      $this->_paginacion=array();
    }
    
    
    public static function getlLibreria($e)
    {echo "
        <title>".$e."</title>
        <!-- Meta -->
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <meta name='description' content=''>
        <meta name='author' content=''>
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
        <!-- Favicon -->
        <link href='../tucuman.ico' rel='shortcut icon'>
        <!-- Bootstrap Core CSS -->
        <link rel='stylesheet' href='../assets/css/bootstrap.css' rel='stylesheet'>
        <!-- Template CSS -->
        <link rel='stylesheet' href='../assets/css/animate.css' rel='stylesheet'>
        <link rel='stylesheet' href='../assets/css/font-awesome.css' rel='stylesheet'>
        <link rel='stylesheet' href='../assets/css/nexus.css' rel='stylesheet'>
        <link rel='stylesheet' href='../assets/css/responsive.css' rel='stylesheet'>
        <link rel='stylesheet' href='../assets/css/custom.css' rel='stylesheet'>
        <!-- Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
        <style>
          .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }</style>";}

public function getLibreria1($e){
        echo "
        <title>".$e."</title>
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <meta name='description' content=''>
        <meta name='author' content=''>
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
        <link href='tucuman.ico' rel='shortcut icon'>
        <link rel='stylesheet' href='assets/css/bootstrap.css' rel='stylesheet'>
        <link rel='stylesheet' href='assets/css/animate.css' rel='stylesheet'>
        <link rel='stylesheet' href='assets/css/font-awesome.css' rel='stylesheet'>
        <link rel='stylesheet' href='assets/css/nexus.css' rel='stylesheet'>
        <link rel='stylesheet' href='assets/css/responsive.css' rel='stylesheet'>
        <link rel='stylesheet' href='assets/css/custom.css' rel='stylesheet'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
        <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>";
}

    public static function getScripts(){
        echo "<script type='text/javascript' src='assets/js/jquery.min.js' type='text/javascript'></script>
            <script type='text/javascript' src='assets/js/bootstrap.min.js' type='text/javascript'></script>
            <script type='text/javascript' src='assets/js/scripts.js'></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type='text/javascript' src='assets/js/jquery.isotope.js' type='text/javascript'></script>
            <!-- Mobile Menu - Slicknav -->
            <script type='text/javascript' src='assets/js/jquery.slicknav.js' type='text/javascript'></script>
            <!-- Animate on Scroll-->
            <script type='text/javascript' src='assets/js/jquery.visible.js' charset='utf-8'></script>
            <!-- Sticky Div -->
            <script type='text/javascript' src='assets/js/jquery.sticky.js' charset='utf-8'></script>
            <!-- Slimbox2-->
            <script type='text/javascript' src='assets/js/slimbox2.js' charset='utf-8'></script>
            <!-- Modernizr -->
            <script src='assets/js/modernizr.custom.js' type='text/javascript'></script>
            <!-- End JS -->
            <!--            <script src='assets/js/controlimagen.js' type='text/javascript'></script>-->
            <!-- SCRIPT DE PREVIA VISUALIZACION DE LA IMAGEN-->
            <script>
              function archivo(evt) {
                  var archivo = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo 'file'.
                  for (var i = 0, f; f = archivo[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById('list').innerHTML = ['<img class='thumb' src='', e.target.result,'' title='', escape(theFile.name), ''/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
             </script>";
    }

}
?>