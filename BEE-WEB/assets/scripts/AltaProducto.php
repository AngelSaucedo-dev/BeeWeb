<?php
    include "database.php";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['producto']) && !empty($_POST['cantidad']) && !empty($_POST['costo']) 
            && !empty($_POST['message']) && !empty($_POST['miSelect']) && isset($_FILES['ImgProd'])
            && ($_FILES['ImgProd']['error'] === UPLOAD_ERR_OK)){
            //header('Content-Type: application/json');
            
            $archivoInfo = $_FILES['ImgProd']; 
            $destino = "../imgProductos/";
            
            $strProducto = $_POST['producto'];
            $intCantidad = $_POST['cantidad'];
            $intCosto = $_POST['costo'];
            $strDescripcion = $_POST['message'];
            $strCat = $_POST['miSelect'];
            $strArchivo = '';

            $link1 = null;
            conectar_db($link1);
            if ($link1) {
                $query1 = null;
                sql_ConsultaNombreProducto($link1, $query1, $strProducto);
                if (!$query1) {
                    echo json_encode(['success' => false, 'error' => 'Error en la consulta del nombre']);
                    exit;
                }

                // Comprobar si el producto ya existe excluyendo el actual
                if(mysqli_num_rows($query1) > 0){
                    echo json_encode(['success' => false, 'error' => 'Error: Ya existe un producto con este nombre']);
                    exit;
                }

                // Manejo de la nueva imagen
                if ($archivoInfo && $archivoInfo['error'] === UPLOAD_ERR_OK) {
                    $ext = pathinfo($archivoInfo['name'], PATHINFO_EXTENSION);
                    $strArchivo = $strProducto . '.' . $ext;
                    $ubicacion = $destino . $strArchivo;

                    if (file_exists($ubicacion)) {
                        unlink($ubicacion);
                    }

                    // Mover la nueva imagen
                    if (!move_uploaded_file($archivoInfo['tmp_name'], $ubicacion)) {
                        echo json_encode(['success' => false, 'error' => 'Error al mover la imagen.']);
                        exit();
                    }
                }else{
                    echo json_encode(['success' => false, 'error' => 'Error en la consulta de actualiza']);
                    exit;
                } 
                // Inserción en la base de datos
                $query = null;
                sql_AltaProductos($link1,$query,$strProducto,$intCantidad,$intCosto,$strDescripcion,$strArchivo,$strCat);
                if (!$query) {
                    echo json_encode(['success' => false, 'error' => 'Error en la consulta de alta']);
                    exit;
                }
                echo json_encode(['success' => true, 'message' => 'Producto modificado correctamente.']);
                exit();
            } else {
                echo json_encode(['success' => false, 'error' => 'Error al conectar a la base de datos.']);
                exit();
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Haz dejado campos vacios']);
            exit;
        }
    }
?>