<!DOCTYPE html>
<?php
    
    $tipoUsuario="";
    $nombreUsuario="";
    $bandCookie=0;
    $numCookie=2;
    if(isset($_COOKIE['UserName'])){
        $nombreUsuario=$_COOKIE['UserName'];
        $bandCookie+=1;
    }
    if(isset($_COOKIE['UserType'])){
        $tipoUsuario=$_COOKIE['UserType'];
        $bandCookie+=1;
    }
    if($bandCookie!=$numCookie){
        header("Location: ../index.php");
    }

    include "../assets/scripts/infoFooter.php";
?>
<html lang="en">
<head>
    <title>BEE-WEB</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">

    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

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
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:<?php echo "$numLocal" ?>"><?php echo "$numLocal" ?></a>
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

            <a class="navbar-brand text-success logo h1 align-self-center" href="EmpleadoAlta.php">
                BEE-WEB
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="EmpleadoAlta.php">Alta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="EmpleadoModifica.php">Modificar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="EmpleadoElimina.php">Eliminar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="EmpleadoGraficas.php">Gráficas</a>
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
                    
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                    </a>
                    -->
                    <a class="nav-icon position-relative text-decoration-none" href="Empleado.php">
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
    <!-- Close Top Nav -->

    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Alta de productos</h1>
            <p>
                Esta sección es para agregar productos al inventario. Para que se suban de manera correcta, se deben llenar todos los campos del formulario. El 
                producto no debe tener el mismo nombre que otro que ya esté en el almacén
            </p>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form" action="" enctype="multipart/form-data"> 
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="producto">Nombre producto</label>
                        <input type="text" class="form-control mt-1" id="producto" name="producto" placeholder="Nombre" required style="border: 1px solid black;">
                    </div>    
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputsubject">Categoria</label>
                        <select name="miSelect" id="miSelect" class="form-control mt-1" style="border: 1px solid black;">
                                <option value="0">Elige la categoria: </option>
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
                                    <option value="<?php echo $idCat ?>"><?php echo "$nombreCat" ?></option> 
                                <?php
                                            }
                                        } 
                                    }
                                ?> 
                        </select>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Cantidad</label>
                        <input type="number" class="form-control mt-1" id="cantidad" name="cantidad" placeholder="Cantidad" min="1" max="9999" required style="border: 1px solid black">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Costo</label>
                        <input type="number" class="form-control mt-1" id="costo" name="costo" placeholder="Costo"  min="1" max="99999" step="0.01" required style="border: 1px solid black">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Descripcion</label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="Descripcion" rows="8" required style="border: 1px solid black; resize: none"></textarea>
                </div>
                <div class="mb-3">
                    <label for="inputsubject">Agrega una imagen del producto</label>
                    <div class="col-md-6 m-auto text-center">
                        <img src="../assets/img/agrega.png" alt="Agrega" style="height: 200px" id="foto">
                    </div>
                    <input type="file" class="form-control mt-1" id="ImgProd" accept=".jpg" name="ImgProd" require style="border: 1px solid black">
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="button" class="btn btn-success btn-lg px-3" name="subir" id="btnAlta">Crear producto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#producto').on('input', function() {
                var maxInput = 40;  
                var valor = $(this).val();
                if (valor.length > maxInput) {
                    valor = valor.substring(0, maxInput);
                }
                valor = valor.replace(/[^a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]/g, '');
                $(this).val(valor);
            });
            $('#btnAlta').click(function(event){
                event.preventDefault();
                var fileInput = $('#ImgProd')[0];
                
                nuevaImg=fileInput.files[0];

                var formData = new FormData();
                formData.append('producto', $('#producto').val());
                formData.append('cantidad', $('#cantidad').val());
                formData.append('costo', $('#costo').val());
                formData.append('message', $('#message').val());
                formData.append('miSelect', $('#miSelect').val());

                if (nuevaImg) {
                    formData.append('ImgProd', nuevaImg); // Cambia a 'file' si lo buscas en PHP como 'file'
                }

                $.ajax({
                    url: '../assets/scripts/AltaProducto.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                    var data = JSON.parse(response);
                    console.log('Respuesta del servidor:', data);
                    if(data.success){
                        alert('Se ha creado tu producto');
                        location.reload();
                    } else {
                        var error=data.error;
                        alert('Error: ' + error);
                    }
                },
                error: function() {
                    alert('Ups, hubo un error en la solicitud AJAX.');
                }
                });            
            });
        });
    </script>
    <script>
        const defaultFile = '../assets/img/agrega.png';
        const file = document.getElementById('ImgProd');
        const img = document.getElementById('foto');

        file.addEventListener('change', e => {
            if (e.target.files[0]) {
                const reader = new FileReader();
                
                // Corregir 'readear' a 'reader'
                reader.onload = function(e) {
                    img.src = e.target.result;
                };
                
                // Asegúrate de descomentar esta línea para leer el archivo
                reader.readAsDataURL(e.target.files[0]);
            } else {
                img.src = defaultFile;
            }
        });
    </script>
    <!-- End Contact -->


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
                    <!--
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Luxury</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                        <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                        <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>
                    </ul>
                    -->
                </div>
            

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Mas Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="EmpleadoAlta.php">Alta productos</a></li>
                        <li><a class="text-decoration-none" href="EmpleadoModifica.php">Modificar producto</a></li>
                        <li><a class="text-decoration-none" href="EmpleadoElimina.php">Elimina productos</a></li>
                        <li><a class="text-decoration-none" href="EmpleadoGraficas.php">Gráficas</a></li>
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