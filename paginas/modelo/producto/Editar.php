<?php
session_start();

       if (!isset($_SESSION['user'])){
            echo "<meta HTTP-EQUIV='REFRESH' CONTENT='1;URL=../index.php'>";
        }else{
            if(!$_SESSION['rol']==1){
                echo "<meta HTTP-EQUIV='REFRESH' CONTENT='1;URL=../index.php'>";
            }else{
               
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Administración</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../../img/LogoSupportYou.png">
        <link href="../../../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet"  href="../../../css/style.css">        
        <link rel="stylesheet"  href="../../../css/estiloCatalogo.css">
        <link rel="stylesheet"  href="../../../css/estiloCarro.css">
        <link rel="stylesheet"  href="../../../css/estiloadmin.css">
    </head>
    <body>
        <main>
            <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span> 
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index.php"><img id="estilo_logo" alt="logo" src="../../../img/LogoSupportYou.png"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <br>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                               <a class="page-scroll" href="../index.php">HOME</a>
                            </li>
                            <li>
                               <a class="page-scroll" href="../../../index.html">SALIR</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>    
        <?php 
                echo '<h2 class="topspace text-center">Editar Usuario</h2>';
            ?>
            <?php
                $idproducto=$_POST['idproducto'];
		        $idcategoriaproducto=$_POST['idcategoriaproducto'];
                $idfundacion=$_POST['idfundacion'];
		        $descripcion=$_POST['descripcion'];
                $estado=$_POST['estado'];
                $precio=$_POST['precio'];
                $img=$_POST['img'];

         

                $estadoventa=$_POST['estadoventa'];
                $imagen="";
                if($idcategoriaproducto==1){
                      $imagen="../../../img/Ropa/". $img;
                }
                else if($idcategoriaproducto==2){
                     $imagen="../../../img/Hogar/". $img;
                }
                else if($idcategoriaproducto==3){
                     $imagen="../../../img/Tecno/". $img;
                }
                else if($idcategoriaproducto==4){
                     $imagen="../../../img/Tecno/". $img;
                }
        
            
                include_once("../../modelo/producto/ProductoCollector.php");
                $ProductoCollectorObj = new ProductoCollector();
                $ProductoCollectorObj-> updateProductos($idproducto, $descripcion, $estado, $precio, $img, $estadoventa, $idfundacion, $idcategoriaproducto);

                echo "<h3 class='topspace text-center'>El producto <span class='green'>" . $idproducto . "</span> ha sido actualizado</h3>";
            ?>
            <div>
                <a href="view.php" class="btn btn-info center-block w70">Volver..</a>
            </div>
        </main>
         <script src="../../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
        <footer id="footer1">
        <p class="copyright text-muted small">Copyright &copy; SupportYou 2017. All Rights Reserved</p>

    </footer>  
    </body>
</html>
<?php
}
        }
?>