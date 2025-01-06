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
    }
    include_once "../assets/scripts/cantidadCarrito.php";
    include_once "../assets/scripts/database.php";

    $link1=null;
    conectar_db($link1);
    if($link1){
        // Consulta la base de datos para obtener el total de resultados en la tabla 'producto'
        $query = mysqli_query($link, "SELECT * FROM producto WHERE producto.cantidadProducto > 0");
        $numeroResultados = mysqli_num_rows($query);   
    }
?>
<html lang="en">
<head>
    <title>BEE-WEB</title>
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
    <!-- jQuery desde CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        .bg-success{
            background-color:#ffc107 !important;
        }
        .pagination .page-link:hover, .pagination .page-link.active{
            background-color:#ffd54f ;
        }
        .page-link{
            color:#2c2c2c;
        }
        .act{
            background-color: #c68e00 !important;
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


    <!-- Start Content -->
    <?php
        if($numeroResultados > 0){
    ?>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categorias</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Tipo de producto
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <?php   
                                $link=null;
                                conectar_db($link);
                                if($link){
                                    $query1=null;
                                    sql_ConsultaCategorias($link,$query1);
                                    if(mysqli_num_rows($query1) > 0){
                                        while($row=mysqli_fetch_array($query1)){
                                            $idCat=$row['idCategoria'];
                                            $nombreCat=$row['nombreCategoria'];       
                            ?>
                                            <li><a class="text-decoration-none" style="cursor: pointer" id="filtro<?php echo "$idCat"?>"><?php echo "$nombreCat" ?></a></li>
                                            <script>
                                                $(document).ready(function(){
                                                    const id_Cat=<?php echo "$idCat"?>;
                                                    $('#filtro<?php echo "$idCat"?>').click(function(event){
                                                        $.post('../assets/scripts/filtroCategoria.php',{id_Cat:id_Cat},function(){ //Esto manda los datos a una rchivo php donde se hara la consulta para el filtro por categorias
                                                            //location.reload(); Esta funcion es para recargar la pagina
                                                            console.log('Prueba', id_Cat);
                                                        })
                                                    });
                                                });
                                            </script>
                            <?php
                                        }
                                    } 
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <form class="col-md-9 m-auto" method="post" role="form" action="" enctype="multipart/form-data">
                        <div class="row">
                            <label for="inputsubject">¿Que producto buscas?</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control mt-1" id="inputModalSearch" name="q" placeholder="Buscar ..." list="productoBus" style="border: 1px solid black;" autocomplete="off">
                                <datalist id="productoBus">
                                    <?php
                                        $link2=null;
                                            conectar_db($link2);
                                            if($link2){
                                                $query2=null;
                                                sql_BuscaProductoTienda($link2,$query2);
                                                if(mysqli_num_rows($query2) > 0){
                                                    while($row=mysqli_fetch_array($query2)){
                                                        $idProd=$row['idProducto'];
                                                        $nombreProd=$row['nombreProducto'];
                                                        $categoria=$row['nombreCategoria'];
                                        ?>
                                            <option value="<?php echo "$nombreProd" ?>"><?php echo "$categoria" ?></option>
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                </datalist>
                                <button type="submit" class="input-group-text bg-success text-light" style="border: 1px solid black;" id="btnBusca">
                                    <i class="fa fa-fw fa-search text-white"></i>
                                </button>
                            </div> 
                        </div>
                    </form>
                    <script>
                        $(document).ready(function() {
                            $('#divBusc3').hide();
                            $('#inputModalSearch').on('input', function() {
                                var maxInput = 40;  
                                var valor = $(this).val();
                                if (valor.length > maxInput) {
                                    valor = valor.substring(0, maxInput);
                                }
                                valor = valor.replace(/[^a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]/g, '');
                                $(this).val(valor);
                            });
                            $('#txtTodo').click(function(event){
                                location.reload();
                            });

                            $('#btnBusca').click(function(event){
                                var producto=$('#inputModalSearch').val();
                                event.preventDefault();
                                $.post('../assets/scripts/buscaTienda.php',
                                {
                                    producto:producto},function(response){
                                        console.log('Respuesta del servidor:', response);
                                        var data=JSON.parse(response);
                                        if (data.success) {
                                            $('#divBusc3').show();
                                            $('#divBusc1').hide();
                                            $('#divBusc2').hide();
                                            console.log('Producto encontrado:', data.data.nombreProducto);
                                            
                                            var idDir="clienteProducto.php?id="+data.data.idProducto;
                                            $('#idProducto').attr('href',idDir);
                                            
                                            let flotante=parseFloat(data.data.costoProducto);
                                            $('#txtCosto').text('$'+flotante);
                                            $('#txtNombre').text(data.data.nombreProducto);
                                            $('#txtCategoria').text('Tipo: '+data.data.nombreCategoria);

                                            let numero=parseInt(data.data.cantidadProducto);
                                            $('#txtCantidad').text('Cantidad: '+numero);
                                            
                                            var destino="../assets/imgProductos/";
                                            var imagen=destino+(data.data.imagenProducto);
                                            
                                            console.log(imagen);
                                            $('#product-detail').attr('src',imagen);

                                        } else {
                                            $('#divBusc3').hide();
                                            $('#divBusc1').show();
                                            $('#divBusc2').show();
                                            $('#inputModalSearch').val('');
                                            alert('No se encontró el producto.');
                                        }
                                })
                                .fail(function() {  
                                        alert('Ups, hubo un error');
                                });
                            });
                        });
                    </script> 
                </div>
                <div class="row" id="divBusc3" style="display:none">
                    <h5 style="color: blue; cursor: pointer" id="txtTodo"><u>Ver todos los productos</u></h5>
                    <div class="col-md-4">     
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="" style="height: 200px; object-fit: cover;" id="product-detail">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <!--<li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>-->
                                        <li><a class="btn btn-success text-white mt-2" id="idProducto" href=""><i class="far fa-eye"></i></a></li>
                                        <!--<li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>-->
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-center mb-0" id="txtNombre"><strong></strong></p>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li id="txtCantidad"></li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <p class="mb-0" id="txtCategoria"></p>
                                <p class="text-center mb-0" id="txtCosto"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="divBusc1">
                    <?php
                        $link=null;
                        conectar_db($link);
                        if($link){
                            // Verifica si 'nume' tiene valor; si no, establece '1' como valor predeterminado
                            if (!empty($_REQUEST["nume"])) {
                                $pagina = $_REQUEST["nume"];
                            } else {
                                $pagina = '1';
                                $_REQUEST["nume"] = '1';
                            }

                            // Define el número de registros por página
                            $registros = 9;

                            // Verifica si $pagina es un número válido; si no, asigna la página 1
                            if (!is_numeric($pagina)) {
                                $pagina = 1;
                            }

                            // Calcula el índice de inicio para la consulta de paginación
                            $inicio = ($pagina - 1) * $registros;

                            // Realiza la consulta para obtener los registros en la página actual
                            $busqueda = mysqli_query($link, "
                                SELECT 
                                    producto.idProducto,
                                    producto.nombreProducto,
                                    producto.costoProducto,
                                    producto.cantidadProducto,
                                    producto.imagenProducto,
                                    producto.descripcionProducto,
                                    categoria.nombreCategoria
                                    FROM producto
                                    JOIN categoria ON producto.categoria_id=categoria.idCategoria
                                    WHERE producto.cantidadProducto > 0
                                LIMIT $inicio, $registros
                            ");

                            // Calcula el número total de páginas necesarias
                            $paginas = ceil($numeroResultados / $registros);
                        }?>
                            <h5>Resultados (<?php echo "$numeroResultados" ?>)</h5>
                            <?php                             
                            //if(mysqli_num_rows($query) > 0){
                               // while($row = mysqli_fetch_array($query)){   
                                    while($resultado = mysqli_fetch_assoc($busqueda) ){
                                        $descriProd=$resultado['descripcionProducto'];
                                        $categoria=$resultado['nombreCategoria'];
                                        $imagen="../assets/imgProductos/".$resultado['imagenProducto'];
                                        //Comprueba que exista una imagen
                                        if(!file_exists($imagen)){
                                            $imagen="../assets/imgProductos/temporal.jpg";
                                        }
                            ?>
                                            <div class="col-md-4">
                                                <div class="card mb-4 product-wap rounded-0">
                                                    <div class="card rounded-0">
                                                        <img class="card-img rounded-0 img-fluid" src="<?php echo "$imagen"; ?>" style="height: 200px; object-fit: cover;">
                                                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                                            <ul class="list-unstyled">
                                                                <!--<li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>-->
                                                                <li><a class="btn btn-success text-white mt-2" href="clienteProducto.php?id=<?php echo $resultado['idProducto']; ?>"><i class="far fa-eye"></i></a></li>
                                                                <!--<li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>-->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="text-center mb-0"><strong><?php echo $resultado['nombreProducto']; ?></strong></p>
                                                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                                            <li>Cantidad: <?php echo $resultado["cantidadProducto"] ?></li>
                                                            <li class="pt-2">
                                                                <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                                                <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                                                <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                                                <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                                                <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                                            </li>
                                                        </ul>
                                                        <p class="mb-0">Tipo: <?php echo "$categoria"; ?> </p>
                                                        <p class="text-center mb-0">$ <?php echo $resultado['costoProducto'];?> </p>
                                                    </div>
                                                </div>
                                            </div>
                            <?php     }?>
                </div>

                    <!-- PAGINAR  -->
                <div class="row" id="divBusc2">
                    <ul class="pagination pagination-lg justify-content-end">
                        <?php
                    
                            if($pagina>1)
                            {
                                //echo "qutal";
                                $ant = $_REQUEST["nume"]-1;
                                echo "<a class='page-link' aria-label='Previous' href='clienteTienda.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>";
                                echo "<li class='page-item'><a class='page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0' href='clienteTienda.php?nume=". ($pagina-1)."' >".$ant."</a></li>";
                            }
                            //pagina actual
                            //var_dump($_REQUEST["nume"]); // Esto mostrará el valor de $_REQUEST["nume"]
                            echo "<li class='page-item'>
                                    <a class='act page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0' style='background-color: #c68e00'>".$_REQUEST["nume"]."</a>
                                </li>";
                            $sigui = $_REQUEST["nume"] + 1;
                            $ultima = $numeroResultados / $registros;
                            /*if($ultima == $_REQUEST["nume"]+1){
                                $ultima = "";
                                echo "qutal3";
                            }*/
                            if($pagina<$paginas && $paginas>1){
                                //echo "qutal4";
                                echo "<li class='page-item' id='hover'>
                                        <a class='page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0' style='hover: background-color: #ffc10' href='clienteTienda.php?nume=". ($pagina+1)."'>".$sigui."</a>
                                    </li>";
                            }
                            if($pagina<$paginas && $paginas>1){
                                //echo "qutal5";
                                echo "<li class='page-item'>
                                        <a class='page-link' aria-label='Next' href='clienteTienda.php?nume=".ceil($ultima)."'>
                                        <span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
                                    </li>";
                            }
                        ?>
                    </ul>
                </div>


            </div>
        </div>
    </div>
    <?php
        }else{
    ?>
        <section class='bg-light'>
        <div class='container pb-5' style='height: 500px; display: flex;
            justify-content: center;align-items: center;'>
            <h2 style='display: flex; justify-content: center; width: 90%;'>
                No hay productos en el almacen
            </h2>
        </div>
    </section>
    <?php
        }
    ?>

    <!-- End Content -->

    <!-- Start Brands -->
    
    <!--End Brands-->


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
                        <div class="input-group-text btn-success text-light">Subscribe</div>
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