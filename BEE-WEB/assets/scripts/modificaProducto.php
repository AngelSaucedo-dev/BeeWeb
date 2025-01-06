<?php
    include "database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['producto']) && !empty($_POST['cantidad']) && !empty($_POST['costo']) 
            && !empty($_POST['message']) && !empty($_POST['miSelect'])) {
            
            $archivoInfo = $_FILES['file'] ?? null; 
            $destino = "../imgProductos/";
            
            $id = $_POST['id'];
            $viejaImg = $_POST['nImagen'];
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
                sql_ConsultaNombreProductoID($link1, $query1, $strProducto,$id);
                if (!$query1) {
                    echo json_encode(['success' => false, 'error' => 'Error en la consulta del nombre']);
                    exit;
                }

                // Comprobar si el producto ya existe excluyendo el actual
                if(mysqli_num_rows($query1) > 0){
                    echo json_encode(['success' => false, 'error' => 'Ya existe el producto']);
                    exit;
                }

                // Manejo de la nueva imagen
                if ($archivoInfo && $archivoInfo['error'] === UPLOAD_ERR_OK) {
                    $ext = pathinfo($archivoInfo['name'], PATHINFO_EXTENSION);
                    $strArchivo = $strProducto . '.' . $ext;
                    $ubicacion = $destino . $strArchivo;

                    // Eliminar la imagen anterior
                    $rutaVieja = $destino . $viejaImg;
                    if (file_exists($rutaVieja)) {
                        unlink($rutaVieja);
                    }

                    // Mover la nueva imagen
                    if (!move_uploaded_file($archivoInfo['tmp_name'], $ubicacion)) {
                        echo json_encode(['success' => false, 'message' => 'Error al mover la imagen.']);
                        exit();
                    }
                } else {
                    // Usar la imagen existente y renombrarla
                    $rutaVieja = $destino . $viejaImg;
                    $ext = pathinfo($rutaVieja, PATHINFO_EXTENSION);
                    $strArchivo = $strProducto . '.' . $ext;
                    $ubicacionVieja = $destino . $viejaImg;
                    $ubicacionNueva = $destino . $strArchivo;
                    if (!file_exists($ubicacionVieja)) {
                        $temporal=$destino."temporal.jpg";
                        if(!copy($temporal,$ubicacionNueva)){
                            echo json_encode(['success' => false, 'message' => 'Error al mover la imagen.']);
                            exit();
                        }
                    }else if(file_exists($ubicacionVieja)) {
                        rename($ubicacionVieja, $ubicacionNueva);
                    }
                }

                // Inserción en la base de datos
                $query = null;
                sql_ModificaProducto($link1, $query, $id, $strProducto, $intCosto, $intCantidad, $strArchivo, $strDescripcion, $strCat);
                if (!$query) {
                    echo json_encode(['success' => false, 'error' => 'Error en la consulta de actualiza']);
                    exit;
                }
                echo json_encode(['success' => true, 'message' => 'Producto modificado correctamente.']);
                exit();
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al conectar a la base de datos.']);
                exit();
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Haz dejado campos en blanco']);
            exit;
        }
    }
?>