<?php
    include "database.php";

    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        if(isset($_COOKIE['UserName'])){
            $nombreUsuario=$_COOKIE['UserName'];
        }
        if(isset($_POST['carritoId']) && isset($_POST['compara']) && isset($_POST['cantidad'])
            && isset($_POST['nombreProducto']) && isset($_POST['saldo']) 
            && isset($_POST['imagen']) && isset($_POST['dif'])){
            $carritoId=$_POST['carritoId'];
            $costo=$_POST['compara'];
            $cantidad=$_POST['cantidad'];
            $strProducto=$_POST['nombreProducto'];
            $gasto=$_POST['saldo'];
            $nImagen=$_POST['imagen'];
            $diferencia=$_POST['dif'];
            
            $saldo=number_format($costo,2,'.','');
            $link=null;
            conectar_db($link);
            if($link){
                $query2=null;
                sql_tomaIdCliente($link,$query2,$nombreUsuario);
                if (!$query2) {
                    echo json_encode(['success' => false, 'error' => 'Error en la compra']);
                    exit;
                }
                $lista=mysqli_fetch_array($query2);
                $id=$lista['idCliente'];
                $fecha=date("Y-m-d");
                $query1=null;
                sql_CompraProducto($link,$query1,$carritoId,$strProducto,$nombreUsuario,$cantidad,$saldo,$id,$nImagen,$fecha,$gasto);
                if (!$query1) {
                    echo json_encode(['success' => false, 'error' => 'Error en la compra']);
                    exit;
                }
                $ruta="../imgCompras/".$nombreUsuario;
                if(!is_dir($ruta)){
                    mkdir($ruta);
                }
                if($diferencia==0){
                    $query6=null;
                    sql_DatosCliente($link,$query6,$nombreUsuario);
                    if (!$query6) {
                        echo json_encode(['success' => false, 'error' => 'Error en la compra']);
                        exit;
                    }
                    if(mysqli_num_rows($query6) > 0){
                        $lista=mysqli_fetch_array($query6);
                        $miCorreo=$lista['correoCliente'];
                    }
                    
            
                    $query4=null;
                    sql_TomaCarrito($link,$query4,$strProducto);
                    if (!$query4) {
                        echo json_encode(['success' => false, 'error' => 'Error en la compra']);
                        exit;
                    }
                    if(mysqli_num_rows($query4) > 0){
                        while($row=mysqli_fetch_array($query4)){
                            $idElimina=$row['idCarrito'];
                            $correoElimina=$row['correoCliente'];
                            
                            if($correoElimina!=$miCorreo){
                                email_EliminaProductoCar($correoElimina,$strProducto);
                            }
                            
                            $query5=null;
                            sql_EliminaCarrPorId($link,$query5,$idElimina);
                            
                            if (!$query5) {
                                echo json_encode(['success' => false, 'error' => 'Error en la compra']);
                                exit;
                            }
                        }
                    }
                }
                $imagen=$ruta."/".$nImagen;
                $origen="../imgProductos/".$nImagen;
                if(file_exists($origen)){
                    if(!file_exists($imagen)){
                        if(copy($origen,$imagen)){
                            echo json_encode(['success' => true]);
                            exit; 
                        }
                    }
                }else{
                    $origen="../imgProductos/temporal.jpg";
                    if(!file_exists($imagen)){
                        if(copy($origen,$imagen)){
                            echo json_encode(['success' => true]);
                            exit;  
                        }
                    }
                }
                echo json_encode(['success' => true]);
                exit;
            }
        }
    }
?>