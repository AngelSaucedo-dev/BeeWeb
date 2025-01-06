<!DOCTYPE html>
<?php
    $nivelUsuario="";
    $nombreUsuario="";
    $bandCookie=0;
    $numCookie=2;
    if(isset($_COOKIE['UserName'])){
        $nombreUsuario=$_COOKIE['UserName'];
        $bandCookie+=1;
    }
    if(isset($_COOKIE['UserType'])){
        $nivelUsuario=$_COOKIE['UserType'];
        $bandCookie+=1;
    }
    if($bandCookie!=$numCookie){
        header("Location: ../index.php");
        //echo '<script>window.location = "../index.php";</script>';
        //exit();
    }    
    include "../assets/scripts/cantidadCarrito.php";
?>
<html lang="en">
<head>
    <title>MIXWEB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css"> 
    <link rel="stylesheet" href="../assets/css/custom.css"> 

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap"> 
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css"> 
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
    <style>
        .text-success{
            color: #ffc107 !important;
        }
        #template-mo-zay-hero-carousel .carousel-control-next i, #template-mo-zay-hero-carousel .carousel-control-prev i{
            color: #ffc107 !important;
        }
        #template-mo-zay-hero-carousel .carousel-indicators li{
            background-color: #ffc107 !important;
        }
        .nav-link:hover{
            color:#ffc107 !important;
        }
        .btn-success{
            background-color:#ffc107 !important;
            border-color: #ffc107 !important;
        }
        .bg-dark, .bg-black{
            background-color:#000 !important;
        }
    </style>
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:<?php echo "$correoLocal" ?>"><?php echo "$correoLocal" ?></a>
                    <i class="fa fa-phone mx-2"></i>                           
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:<?php echo "$numLocal" ?>"><?php echo "$numLocal"?></a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->
    <?php
        echo "$nombreUsuario";
    ?>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="cliente.php">
                BEE-WEB
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="cliente.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clienteConocenos.php">Conocenos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clienteTienda.php">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clienteContacto.php">Contacto</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <!--
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    
                    fa fa-sign-out-alt
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    -->
                    <a class="nav-icon position-relative text-decoration-none" href="carrito.php">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"><?php if($prodCarrito > 0) echo "$prodCarrito"; ?></span>
                    </a>
                    
                    <a class="nav-icon position-relative text-decoration-none" href="usuario.php">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>

                    <a class="nav-icon position-relative text-decoration-none" href="../assets/scripts/logOut.php">
                        <i class="fa fa-sign-out-alt"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal 
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    -->


    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="../assets/img/logo1.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>BEE-WEB</b></h1>
                                <h3 class="h2">Somos tu mejor opción de compra</h3>
                                <p>
                                    El sitio web del 
                                    <a rel="sponsored" class="text-success" href="https://www.facebook.com/" target="_blank">Instituto Mexicano de Ap&iacute;cultura (IMA)</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="../assets/img/produCarrusel.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success"><b>IMASOL</b></h1>
                                <h3 class="h2">Esta temporada de lluvias recomendamos el uso de nuestro propoleo IMASOL</h3>
                                <p>
                                    Por sus propiedades antimicrobianas, antineoplásicas, antinflamatorias, antioxidantes, inmunomoduladoras y antivirales, que ayuda a combatir y prevenir infecciones.
                                    Ven por tu propoleo de <strong>Lunes a Sabado de 10:30 a las 18:00, nos ubicamos en morelos #1670, barrio de San Sebastián.</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="../assets/img/producto2.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success"><b>Miel IMA</b></h1>
                                <h3 class="h2">El toque perfecto para tus eventos!</h3>
                                <p>
                                    <strong>Dulce para el alma y saludable al cuerpo </strong>
                                    <br>
                                    -Bodas<br>
                                    -Bautizos<br>
                                    -Regalos y recuerdos<br>
                                    -XV<br>
                                    -etc  🌻🐝
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categorías</h1>
                <p>
                    Contamos con las siguientes categorías:
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <img src="../assets/img/cMiel.jpeg" class="rounded-circle img-fluid border">
                <h5 class="text-center mt-3 mb-3">Cera de miel</h5>
                <p class="text-center"><a class="btn btn-success" style='color: #000' href="clienteTienda.php">Ir a comprar</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <img src="../assets/img/mApic.jpeg" class="rounded-circle img-fluid border">
                <h2 class="h5 text-center mt-3 mb-3">Material ap&iacute;cola</h2>
                <p class="text-center"><a class="btn btn-success" style='color: #000' href="clienteTienda.php">Ir a comprar</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <img src="../assets/img/dAmar.jpeg" class="rounded-circle img-fluid border">
                <h2 class="h5 text-center mt-3 mb-3">Dulce amaranto</h2>
                <p class="text-center"><a class="btn btn-success" style='color: #000' href="clienteTienda.php">Ir a comprar</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Los más vendidos</h1>
                    <p>
                        Estos son nuestros productos más vendidos 
                    </p>
                </div>
            </div>
            <div class="row">
                <?php
                    $link=null;
                    $cont=0;
                    conectar_db($link);
                    if($link){
                    $query=null;
                    sql_ConsultaMasVendido($link,$query);
                    if(mysqli_num_rows($query) > 0){
                        while($row=mysqli_fetch_array($query)){
                            $cont++;
                            $nombre=$row['nombreProducto'];
                            $costo=$row['costoProducto'];
                            $descripcion=$row['descripcionProducto'];
                            $imgProd=$row['imagenProducto'];
                            $venta=$row['cantidadVenta'];

                            $imagen="../assets/imgProductos/".$imgProd;

                            //Comprueba que exista una imagen
                            if(!file_exists($imagen)){
                                $imagen="../assets/imgProductos/temporal.jpg";
                            }
                ?>  
                <div class="col-12 col-md-4 mb-4">
                            <div class="card h-100">
                                <a href="clienteTienda.php">
                                    <img src="<?php echo "$imagen" ?>" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                                </a>
                                <div class="card-body">
                                    <ul class="list-unstyled d-flex justify-content-between">
                                        <li>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-muted fa fa-star"></i>
                                            <i class="text-muted fa fa-star"></i>
                                        </li>
                                        <li class="text-muted text-right">$<?php echo "$costo"?></li>
                                    </ul>
                                    <a href="clienteTienda.php" class="h2 text-decoration-none text-dark"><?php echo "$nombre" ?></a>
                                    <p class="card-text">
                                        <?php echo "$descripcion" ?>
                                    </p>
                                    <p class="text-muted">ventas (<?php echo "$venta" ?>)</p>
                                </div>
                            </div>
                        </div>
                    <?php   
                                }
                            }
                        }
                        desconectar_db($link);
                    ?>
            </div>
            <?php
                if($cont==0){
            ?>
                <div class="row text-center py-3">
                    <div class="col-lg-6 m-auto">
                        <h1>No se han vendido productos</h1>
                    </div>
                </div>
            <?php
                }
            ?>

        </div>
    </section>
    <!-- End Featured Product -->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">BEE-WEB</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            <?php echo "$ubicacion"?>
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:<?php echo "$numLocal" ?>"><?php echo "$numLocal"?></a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:<?php echo "$correoLocal" ?>"><?php echo "$correoLocal" ?></a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Categorías</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <?php   
                            $link=null;
                            conectar_db($link);
                            if($link){
                                $query=null;
                                sql_ConsultaCategorias($link,$query);
                                if(mysqli_num_rows($query) > 0){
                                    while($row=mysqli_fetch_array($query)){
                                        $idCat=$row['idCategoria'];
                                        $nombreCat=$row['nombreCategoria'];       
                        ?>
                                        <li><a class="text-decoration-none" href="clienteTienda.php"><?php echo "$nombreCat" ?></a></li> 
                        <?php
                                    }
                                } 
                            }
                        ?> 
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Mas Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="cliente.php">Home</a></li>
                        <li><a class="text-decoration-none" href="clienteConocenos.php">Conocenos</a></li>
                        <li><a class="text-decoration-none" href="clienteTienda.php">Tienda</a></li>
                        <li><a class="text-decoration-none" href="carrito.php">Mi carrito</a></li>
                        <li><a class="text-decoration-none" href="clienteContacto.php">Contacto</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light" style='color: #000'>Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                        Copyright &copy; 2024 - <?php echo "$anioAct" ?> BEE-WEB 
                        | Designed by <a rel="sponsored" href="https://templatemo.com/page/1" target="_blank">TemplateMo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>