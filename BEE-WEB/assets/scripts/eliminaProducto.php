<?php
    include "database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['idElimina']) && isset($_POST['nProducto'])) {
            
            $idProducto = $_POST['idElimina'];
            $producto = $_POST['nProducto'];
            $link1 = null;
            conectar_db($link1);
            
            if ($link1){
                $query1 = null;
                sql_ComparaCarrito($link1, $query1, $idProducto);
    
                if (!$query1) {
                    echo json_encode(['success' => false, 'error' => 'Error en la consulta de carrito']);
                    exit;
                }
    
                if (mysqli_num_rows($query1) > 0) {
                    //$fechaEl = date('Y-m-d');
                    while ($row = mysqli_fetch_array($query1)) {
                        $idCarr = $row['idCarrito'];
                        $correoCliente = $row['correoCliente'];
                        $nomProducto = $row['nombreProducto'];
                        
                        email_EliminaProductoCar($correoCliente,$nomProducto);
                        $query3=null;
                        sql_EliminaCarrPorId($link1, $query3, $idCarr);
                        if (!$query3) {
                            echo json_encode(['success' => false, 'error' => 'Error en la consulta elimina carrito']);
                            exit;
                        }
                    }
                }
    
                $query2 = null;
                sql_EliminaProducto($link1, $query2, $idProducto);
                if (!$query2) {
                    echo json_encode(['success' => false, 'error' => 'Error en eliminar producto']);
                    exit;
                }
                $ubicacion="../imgProductos/";
                $imagen=$producto.'.jpg';
                $img=$ubicacion.$imagen;
                if(file_exists($img)){
                    unlink($img);
                }

                echo json_encode(['success' => true]);
                exit;
            }
        }
    }
    
    echo json_encode(['success' => false, 'error' => 'Error desconocido']);
    
?>