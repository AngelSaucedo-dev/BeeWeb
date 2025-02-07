<?php
    //Primera refactorizacion para la alta de nuevos productos
    include "database.php";

    //Valida que se manden los datos desde un formulario
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') { 
        echo json_encode(['success' => false, 'error' => 'Método no permitido.']);
        exit;
    }

    //Validar que los campos del formulario no estén vacíos
    $requeridos = ['producto', 'cantidad', 'costo', 'message', 'miSelect'];
    foreach ($requeridos as $campo) {
        if (empty($_POST[$campo])) {
            echo json_encode(['success' => false, 'error' => "El campo $campo está vacío."]);
            exit;
        }
    }

    //Validar que la imagen fue subida correctamente
    if (!isset($_FILES['ImgProd']) || $_FILES['ImgProd']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'error' => 'Error al subir la imagen.']);
        exit;
    }

    //Obtener los datos del formulario
    $archivoInfo = $_FILES['ImgProd'];
    $destino = "../imgProductos/";
    $strProducto = $_POST['producto'];
    $intCantidad = $_POST['cantidad'];
    $intCosto = $_POST['costo'];
    $strDescripcion = $_POST['message'];
    $strCat = $_POST['miSelect'];

    //Funcion para hacer una llamada a la base de datos
    $link1 = null;
    conectar_db($link1);
    if (!$link1) {
        echo json_encode(['success' => false, 'error' => 'Error al conectar a la base de datos.']);
        exit;
    }

    //Verificar si el producto ya existe
    $query1 = null;
    sql_ConsultaNombreProducto($link1, $query1, $strProducto);
    if (!$query1) {
        echo json_encode(['success' => false, 'error' => 'Error en la consulta del nombre.']);
        exit;
    }

    if (mysqli_num_rows($query1) > 0) {
        echo json_encode(['success' => false, 'error' => 'Error: Ya existe un producto con este nombre.']);
        exit;
    }

    //Asignamos un nombre y una ubicacion a la imagen para ser almacenada en un repositorio
    $ext = pathinfo($archivoInfo['name'], PATHINFO_EXTENSION);
    $strArchivo = $strProducto . '.' . $ext;
    $ubicacion = $destino . $strArchivo;

    //Validaciones para mover las imagenes a los repositorios
    if (file_exists($ubicacion)) {
        unlink($ubicacion);
    }

    if (!move_uploaded_file($archivoInfo['tmp_name'], $ubicacion)) {
        echo json_encode(['success' => false, 'error' => 'Error al mover la imagen.']);
        exit;
    }

    //Insertar en la base de datos
    $query = null;
    sql_AltaProductos($link1, $query, $strProducto, $intCantidad, $intCosto, $strDescripcion, $strArchivo, $strCat);
    if (!$query) {
        echo json_encode(['success' => false, 'error' => 'Error en la consulta de alta.']);
        exit;
    }

    echo json_encode(['success' => true, 'message' => 'Producto registrado correctamente.']);
    exit;
?>