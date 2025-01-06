<?php
    /*
    $db='u454360365_beewebprueba';
    //Funcion para conectar con la base de datos
    function conectar_db(&$db_link,$db_Server='localhost',$db_user='u454360365_BEEWEB',$db_pass='BeeWeb178974',$db_name='u454360365_beewebprueba'){
        $db_link=mysqli_connect($db_Server,$db_user,$db_pass,$db_name);
        if(!$db_link){
            echo "<h2>!!!Ups ha ocurrido un error</h2>";
            exit;
        }
    }
    */
    $db='bee-webprueba';
    //Funcion para conectar con la base de datos
    function conectar_db(&$db_link,$db_Server='localhost',$db_user='root',$db_pass='',$db_name='bee-webprueba'){
        $db_link=mysqli_connect($db_Server,$db_user,$db_pass,$db_name);
        if(!$db_link){
            echo "<h2>!!!Ups ha ocurrido un error</h2>";
            exit;
        }
    }
    
    function desconectar_db(&$db_link){
        if($db_link){
            mysqli_close($db_link);
        }
    }  
    //Funcion para saber el tipo de usuario
    function sql_usuarios(&$db_link,&$query,$strUser,$strPass){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT 
        idCliente AS 'id' ,nombreCliente AS 'usuario',passwdCliente AS 'Pass', 
        (3) AS 'Tipo'
        FROM cliente WHERE nombreCliente='$strUser' AND passwdCliente='$strPass'
        UNION
        SELECT 
        idEmpleado AS 'id' ,nombreEmpleado AS 'usuario',passwdEmpleado AS 'Pass', 
        (2) AS 'Tipo'
        FROM empleado WHERE nombreEmpleado='$strUser' AND passwdEmpleado='$strPass'";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para buscar un usuario
    function sql_ComparaUsuarios(&$db_link,&$query,$strUser,$strCorreo){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT cliente.*,nuevocliente.correoCliente
                    FROM cliente
                    JOIN nuevocliente ON cliente.correo_id=nuevocliente.idNuevo
                    WHERE nuevocliente.correoCliente='$strCorreo' OR cliente.nombreCliente='$strUser';";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para verificar el correo ya registrado
    function sql_VerificaCorreoCuenta(&$db_link,&$query,$strCorreo){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT cliente.*,nuevocliente.correoCliente
                    FROM cliente
                    JOIN nuevocliente ON cliente.correo_id=nuevocliente.idNuevo
                    WHERE correoCliente='$strCorreo';";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para comparar los correos
    function sql_ComparaCorreo(&$db_link,&$query,$strCorreo){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT * FROM nuevocliente WHERE correocliente='$strCorreo'";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion compara producto excepto el que tenga el mismo id
    function sql_ConsultaNombreProductoID(&$db_link, &$query, $strProducto, $idActual) {
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query=$sql = "SELECT * FROM producto WHERE nombreProducto = '$strProducto' 
        AND idProducto != $idActual";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para crear un nuevo registro en la tabla nuevoCliente
    function sql_CreaNuevoCliente(&$db_link,&$query,$strCorreo,$strClave){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="INSERT INTO nuevocliente (correoCliente,claveNuevo)
                    VALUES ('$strCorreo','$strClave')";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para actualizar clave del nuevo registro
    function sql_ModificaNuevoCliente(&$db_link,&$query,$strCorreo,$strClave){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="UPDATE nuevocliente SET claveNuevo='$strClave'
                    WHERE correoCliente='$strCorreo'";
        $query=mysqli_query($db_link,$str_query);
    }
    //Verificar correos
    function sql_VerificaCorreo(&$db_link,&$query,$strCorreo,$clave){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT * FROM nuevocliente WHERE correoCliente='$strCorreo'
                    AND claveNuevo='$clave'";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para alta de clientes
    function sql_AltaCliente(&$db_link,&$query,$strCliente,$passCliente,$idCorreo,$saldo,$ubi){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="INSERT INTO cliente(nombreCliente,passwdCliente,nivelCliente,correo_id,saldoCliente,imgCliente,ubicacionCliente) 
        VALUES ('$strCliente','$passCliente',3,$idCorreo,$saldo,'$strCliente.jpg','$ubi')";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para tomar los datos del cliente
    function sql_Cliente(&$db_link,&$query,$strUser){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT * from cliente WHERE nombreCliente='$strUser'";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_DatosCliente(&$db_link,&$query,$strCliente){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT cliente.*,nuevocliente.correoCliente 
                    FROM cliente
                    JOIN nuevocliente ON cliente.correo_id=nuevocliente.idNuevo
                    WHERE cliente.nombreCliente='$strCliente';";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_DatosTrabajador(&$db_link,&$query,$strTrab){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT * from empleado WHERE nombreEmpleado='$strTrab'";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_ModificaProducto(&$db_link,&$query,$idProd,$strProd,$floatCosto,$intCantidad,$strImg,$strDesc,$intCat){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="UPDATE producto SET nombreProducto='$strProd',costoProducto=$floatCosto,
        cantidadProducto=$intCantidad,imagenProducto='$strImg',
        descripcionProducto='$strDesc',categoria_id=$intCat WHERE producto.idProducto=$idProd";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para crear productos y dar de alta en la base de datos
    function sql_AltaProductos(&$db_link,&$query,$strProducto,$intCantidad,$intCosto,$strDescripcion,$archivo,$idCat){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="INSERT INTO 
                        producto (nombreProducto,cantidadProducto,costoProducto,
                        descripcionProducto,imagenProducto,cantidadVenta,categoria_id) VALUES ('$strProducto',
        $intCantidad,$intCosto,'$strDescripcion','$archivo',
        0,$idCat)";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para buscar un producto
    function sql_BuscaProducto(&$db_link,&$query){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT idProducto,nombreProducto FROM producto";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_BuscaProductoTienda(&$db_link,&$query){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT producto.idProducto,
                    producto.nombreProducto,
                    categoria.nombreCategoria
                    FROM producto
                    JOIN categoria ON producto.categoria_id=categoria.idCategoria
                    WHERE producto.cantidadProducto > 0 ";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_BuscaProductoRelacionado(&$db_link,&$query,$strCat,$idProd){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT 				
                    producto.*,
                    categoria.nombreCategoria
                    FROM producto
                    JOIN categoria ON producto.categoria_id=categoria.idCategoria
                    WHERE producto.cantidadProducto > 0 AND
                    producto.idProducto!=$idProd
                    ORDER BY RAND()
                    LIMIT 12;";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_ConsultaNombreTienda(&$db_link,&$query,$strProd){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT producto.*, categoria.nombreCategoria
                    FROM producto
                    JOIN categoria ON producto.categoria_id=categoria.idCategoria
                    WHERE producto.cantidadProducto > 0 
                    AND producto.nombreProducto='$strProd'";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para tomar los datos de los productos
    function sql_ConsultaNombreProducto(&$db_link,&$query,$strProd){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT producto.*, categoria.nombreCategoria
                    FROM producto
                    JOIN categoria ON producto.categoria_id=categoria.idCategoria
                    WHERE producto.nombreProducto='$strProd';";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para la consultas del carrito para elimianr (eliminaProducto.php)
    function sql_ComparaCarrito(&$db_link,&$query,$idProd){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT 
                    carrito.idCarrito, 
                    producto.nombreProducto, 
                    nuevocliente.correoCliente
                    FROM 
                    carrito
                    JOIN 
                    producto ON carrito.producto_id = producto.idProducto
                    JOIN 
                    cliente ON carrito.cliente_id = cliente.idCliente
                    JOIN 
                    nuevocliente ON cliente.correo_id = nuevocliente.idNuevo
                    WHERE carrito.producto_id=$idProd;";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_TomaCarrito(&$db_link,&$query,$strProd){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT 
                    carrito.idCarrito,
                    producto.idProducto,
                    producto.nombreProducto,
                    nuevocliente.correoCliente
                    FROM 
                    carrito
                    JOIN 
                    producto ON carrito.producto_id = producto.idProducto
                    JOIN 
                    cliente ON carrito.cliente_id = cliente.idCliente
                    JOIN 
                    nuevocliente ON cliente.correo_id = nuevocliente.idNuevo
                    WHERE producto.nombreProducto='$strProd';";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_TomaCarritoParaEmail(&$db_link,&$query,$strProd,$strCliente){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT 
                    carrito.idCarrito,
                    producto.idProducto,
                    producto.nombreProducto,
                    nuevocliente.correoCliente,
                    cliente.nombreCliente
                    FROM 
                    carrito
                    JOIN 
                    producto ON carrito.producto_id = producto.idProducto
                    JOIN 
                    cliente ON carrito.cliente_id = cliente.idCliente
                    JOIN 
                    nuevocliente ON cliente.correo_id = nuevocliente.idNuevo
                    WHERE producto.nombreProducto='$strProd' AND cliente.nombreCliente!='$strCliente'";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para eliminar carrito
    function sql_EliminaCarrPorId(&$db_link,&$query,$idCarr){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="DELETE FROM carrito WHERE idCarrito=$idCarr";
        $query=mysqli_query($db_link,$str_query);
    }
    function email_MandaCodigo($strCorreo,$codigo){
        $mensaje = "
        <html>
        <head>
            <title>Código de Verificación</title>
        </head>
        <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;'>
            <div style='width: 100%; background-color: #ffc107; color: black; text-align: center; padding: 20px 0;'>
                <h1 style='margin: 0;'>BEE-WEB</h1>
            </div>
            <div style='max-width: 600px; margin: 20px auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);'>
                <h2 style='font-size: 24px; color: #333333;'>¡Bienvenido a BEE-WEB!</h2>
                <p style='font-size: 16px; color: #555555;'>Tu clave para crear tu usuario es: <strong style='color: #007bff;'>$codigo</strong></p>
                <p style='font-size: 16px; color: #555555;'>Ingresa este código en el sitio web para completar tu registro.</p>
                <a href='https://beeweb.site/registroUsuario.php'><p style='font-size: 14px; color: #888888;'>Da click para crear usuario</p></a>
                <p style='font-size: 14px; color: #888888;'>Si no has solicitado este código, por favor ignora este correo.</p>
            </div>
            <div style='text-align: center; margin-top: 20px; font-size: 12px; color: #888888;'>
                <p>Este es un correo automatizado. No respondas a este mensaje.</p>
            </div>
        </body>
        </html>
        ";
        $headers .= "From: noreply@beeweb.site\r\n"; 
        $headers .= "Reply-To: noreply@beeweb.site\r\n"; 
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $rta=mail($strCorreo,'Codigo de verificacion BEE-WEB',$mensaje,$headers);
    }
    //Funcion para mandar correo de que se elimino un producto del carrito
    function email_EliminaProductoCar($strCorreo,$strProd){
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: noreply@beeweb.site\r\n"; 
        $headers .= "Reply-To: noreply@beeweb.site\r\n";
        $headers .= "Content-type: text/html; charset=utf8\r\n";
        
        $mensaje = "
            <html>
            <head>
                <title>Producto Eliminado</title>
                <style>
                    body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    color: #333;
                    margin: 0;
                    padding: 0;
                }
                .email-container {
                    width: 100%;
                    max-width: 600px;
                    margin: 20px auto;
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                }
                .email-header {
                    text-align: center;
                    background-color: #ffc107;
                    color: black;
                    padding: 10px;
                    border-radius: 8px 8px 0 0;
                }
                .email-body {
                    padding: 20px;
                    line-height: 1.6;
                }
                .product-name {
                    font-weight: bold;
                    color: #e74c3c;
                }
                .email-footer {
                    text-align: center;
                    font-size: 12px;
                    color: #777;
                    margin-top: 20px;
                }
                .email-footer a {
                    color: #4CAF50;
                    text-decoration: none;
                }
                </style>
            </head>
            <body>
                <div class='email-container'>
                    <div class='email-header'>
                        <h2>Producto Eliminado</h2>
                    </div>
                    <div class='email-body'>
                        <p>Estimado usuario,</p>
                        <p>Hemos eliminado el producto <span class='product-name'>$strProd</span> de nuestro inventario.</p>
                        <p>Sabemos que tenías este producto agregado a tu carrito de compras, y lamentamos cualquier inconveniente que esto pueda haber causado. Te ofrecemos nuestras más sinceras disculpas.</p>
                        <p>Si necesitas más información o ayuda, no dudes en contactarnos.</p>
                    </div>
                    <div class='email-footer'>
                        <p>Gracias por tu comprensión.</p>
                        <p>Atentamente, <br>El equipo de tu tienda.</p>
                        <p><a href='https://beeweb.site/index.php'>Visítanos en nuestra página web</a></p>
                    </div>
                </div>
            </body>
            </html>
            ";
        
        $rta=mail($strCorreo,'Se ha eliminado un producto de tu carrito',$mensaje,$headers);
    }
    function correo_Contacto($strCliente, $strCorreo, $asunto, $mensaje) {
        $para = "beewebima@gmail.com";
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=utf8\r\n";
        
        // Cuerpo del mensaje con estilos
        $cuerpo = "
            <html>
            <head>
                <title>$asunto</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
                    .email-container {
                        width: 100%;
                        max-width: 600px;
                        margin: 20px auto;
                        background-color: #ffffff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    }
                    .email-header {
                        text-align: center;
                        background-color: #ffc107;
                        color: black;
                        padding: 15px;
                        border-radius: 8px 8px 0 0;
                    }
                    .email-header h2 {
                        margin: 0;
                    }
                    .email-body {
                        padding: 20px;
                        line-height: 1.6;
                        color: #333;
                    }
                    .email-body p {
                        margin: 10px 0;
                    }
                    .info-label {
                        font-weight: bold;
                        color: #3498db;
                    }
                    .footer {
                        text-align: center;
                        font-size: 12px;
                        color: #777;
                        margin-top: 20px;
                    }
                </style>
            </head>
            <body>
                <div class='email-container'>
                    <div class='email-header'>
                        <h2>Nuevo Mensaje de Contacto</h2>
                    </div>
                    <div class='email-body'>
                        <p><span class='info-label'>Enviado por:</span> $strCliente</p>
                        <p><span class='info-label'>E-Mail:</span> $strCorreo</p>
                        <p><span class='info-label'>Mensaje:</span></p>
                        <p>$mensaje</p>
                    </div>
                    <div class='footer'>
                        <p>Este mensaje ha sido enviado a través del formulario de contacto de tu página web.</p>
                    </div>
                </div>
            </body>
            </html>
            ";
        
        $bool = mail($para, $asunto, $cuerpo, $headers);
    }
    //Funcion para eliminar producto
    function sql_EliminaProducto(&$db_link,&$query,$idProd){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="DELETE FROM producto WHERE idProducto=$idProd";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para consultar productos de la tienda
    function sql_ConsultaTienda(&$db_link,&$query){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT 
                        producto.idProducto,
                        producto.nombreProducto,
                        producto.costoProducto,
                        producto.cantidadProducto,
                        producto.imagenProducto,
                        producto.descripcionProducto,
                        categoria.nombreCategoria
                    FROM producto
                    JOIN categoria ON producto.categoria_id = categoria.idCategoria";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funciona para consulta de categorias
    function sql_ConsultaCategorias(&$db_link,&$query){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT * FROM categoria";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para el filtro de categorias
    function sql_FiltroCategoria(&$db_link,&$query,$idCat){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT 
                        producto.idProducto,
                        producto.nombreProducto,
                        producto.costoProducto,
                        producto.cantidadProducto,
                        producto.imagenProducto,
                        producto.descripcionProducto,
                        categoria.nombreCategoria
                    FROM producto
                    JOIN categoria ON producto.categoria_id = categoria.idCategoria
                    WHERE producto.categoria_id=$idCat";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion consulta producto individual para agregar al carrito
    function sql_ConsultaProducto(&$db_link,&$query,$idProd){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT 
                    producto.*,
                    categoria.nombreCategoria
                    FROM producto
                    JOIN categoria ON producto.categoria_id=categoria.idCategoria
                    WHERE producto.idProducto=$idProd";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion consultar cantidad de productos en carrito
    function sql_CantidadCarrito(&$db_link,&$query,$strUsuario){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT carrito.*,cliente.nombreCliente FROM carrito JOIN cliente ON 
        carrito.cliente_id=cliente.idCliente WHERE cliente.nombreCliente='$strUsuario'";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion consulta nombre producto carrito
    function sql_NombreCarrito(&$db_link,&$query,$strUsuario,$strProducto){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT carrito.*, cliente.nombreCliente, producto.idProducto
        FROM carrito 
        JOIN cliente ON carrito.cliente_id = cliente.idCliente
        JOIN producto ON carrito.producto_id = producto.idProducto
        WHERE cliente.nombreCliente = '$strUsuario' AND producto.idProducto = $strProducto;";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion crear carrito
    function sql_AltaCarrito(&$db_link,&$query,$strUsuario,$strProducto,$intCantidad){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="INSERT INTO carrito (cliente_id, producto_id, cantidad) 
        SELECT c.idCliente, p.idProducto, $intCantidad 
        FROM cliente c, producto p 
        WHERE c.nombreCliente = '$strUsuario' AND p.idProducto = $strProducto";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion consultar carrito
    function sql_ConsultaCarrito(&$db_link,&$query,$strUsuario){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT carrito.*, 
            cliente.nombreCliente, 
            producto.nombreProducto,
            producto.costoProducto,
            producto.cantidadProducto,
            producto.imagenProducto
            FROM carrito 
            JOIN cliente ON carrito.cliente_id = cliente.idCliente
            JOIN producto ON carrito.producto_id = producto.idProducto 
            WHERE cliente.nombreCliente = '$strUsuario'";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion para eliminar un producto del carrito
    function sql_EliminaCarrito(&$db_link,&$query,$strCarrito,$strUser){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="DELETE car FROM carrito car JOIN cliente cli ON 
        car.cliente_id=cli.idCliente  WHERE 
        car.idCarrito=$strCarrito AND cli.nombreCliente='$strUser'";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_ConsultaMasVendido(&$db_link,&$query){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT * FROM producto 
                    ORDER BY cantidadVenta DESC
                    LIMIT 3;";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_ConsultaRelacionados(&$db_link,&$query,$idCat){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT * FROM producto
                    ORDER BY RAND()
                    LIMIT 5";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_tomaIdCliente(&$db_link,&$query,$strCliente){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT idCliente,nombreCliente,imgCliente FROM cliente 
                    WHERE cliente.nombreCliente='$strCliente';";
        $query=mysqli_query($db_link,$str_query);
    }
    //Funcion que al comprar en carrito se elimine la cantidad del stock y se elimine del carrito
    function sql_CompraProducto(&$db_link, &$query, $idCarrito, $strProd, $strUser, $intCantidad, $floatSaldo, $id,$img,$fecha,$floatGasto) {
        mysqli_select_db($db_link, $GLOBALS["db"]);
        
        // Iniciar transacción
        mysqli_begin_transaction($db_link);
        
        try {
            // Preparar y ejecutar la primera consulta
            $stmt1 = $db_link->prepare("UPDATE producto SET cantidadVenta = cantidadVenta + ?, cantidadProducto = cantidadProducto - ? WHERE nombreProducto = ?");
            $stmt1->bind_param("iis", $intCantidad, $intCantidad, $strProd);
            $stmt1->execute();
            
            // Preparar y ejecutar la segunda consulta
            $stmt2 = $db_link->prepare("UPDATE cliente SET saldoCliente = ? WHERE nombreCliente = ?");
            $stmt2->bind_param("ds", $floatSaldo, $strUser);
            $stmt2->execute();
            
            // Preparar y ejecutar la tercera consulta
            $stmt3 = $db_link->prepare("DELETE car FROM carrito car JOIN cliente cli ON car.cliente_id = cli.idCliente WHERE car.idCarrito = ? AND cli.nombreCliente = ?");
            $stmt3->bind_param("is", $idCarrito, $strUser);
            $stmt3->execute();

            //Preparar y ejecutar la cuarta consulta
            $stmt4=$db_link->prepare("INSERT INTO compra(cliente_id,cantidadCompra,costoCompra,fechaCompra,productoCompra,imgCompra) 
            VALUES (?,?,?,?,?,?)");
            $stmt4->bind_param("iidsss",$id,$intCantidad,$floatGasto,$fecha,$strProd,$img);
            $stmt4->execute();

            // Confirmar transacción
            mysqli_commit($db_link);
            
            $query = true;
        } catch (Exception $e) {
            // Revertir transacción en caso de error
            mysqli_rollback($db_link);
            
            $query = false;
        }
    }
    function sql_VerificaCompras(&$db_link,&$query,$idUsser){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT * FROM compra WHERE cliente_id=$idUsser";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_GraficaMasVendido(&$db_link,&$query){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT nombreProducto,cantidadVenta FROM producto WHERE cantidadVenta!=0 
        ORDER BY cantidadVenta DESC LIMIT 10";
        $query=mysqli_query($db_link,$str_query);
    }
    function sql_GraficaMenosVendido(&$db_link,&$query){
        mysqli_select_db($db_link,$GLOBALS["db"]);
        $str_query="SELECT nombreProducto,cantidadVenta FROM producto WHERE cantidadVenta!=0 
        ORDER BY cantidadVenta ASC LIMIT 10";
        $query=mysqli_query($db_link,$str_query);
    }
?>