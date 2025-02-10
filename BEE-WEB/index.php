<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Estilos/style.css">
    <title>BEE-WEB</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
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
        a{
            color:#ffc107;
        }
        a:hover{
            color:#c68e00;
        }
        
        input[type="submit"] {
            background-color: #ffc107!important; /* Color de fondo amarillo */
        }
        
        input[type="submit"]:hover {
            background-color: #c68e00!important; /* Color de fondo amarillo */
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <div class="formus">
            <form method="post" action="">
                <h2 id="titulo">Login</h2>
                <?php include("assets/scripts/login.php"); ?>
                <label for="usuario">Usuario: </label>
                <input type="text" name="txtUser" id="usuario" maxlenght="15" autocomplete="off">
                <label for="passwd">Contraseña: </label>
                <input type="password" name="txtPasswd" id="passwd" maxlenght="15" autocomplete="off">
                <h3 id="nuevoUsuario"><a href="creaUsuario.php">Crear usuario</a></h3>
                <input type="submit" value="Ingresar" name="Ingresa">
            </form>
            <!-- Botón para visitantes
            <form method="post" action="">
                <button type="submit" name="visitante" id="visitanteBtn">Entrar como visitante</button>
            </form>  -->
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('#usuario').on('input', function() {
            var maxInput = 15;  
            var valor = $(this).val();
            if (valor.length > maxInput) {
                valor = valor.substring(0, maxInput);
            }
            valor = valor.replace(/[^a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]/g, '');
            $(this).val(valor);
        });
        $('#passwd').on('input', function() {
            var maxInput = 15;  
            var valor = $(this).val();
            if (valor.length > maxInput) {
                valor = valor.substring(0, maxInput);
            }
            valor = valor.replace(/[^a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]/g, '');
            $(this).val(valor);
        });
    });
</script>
</html>
