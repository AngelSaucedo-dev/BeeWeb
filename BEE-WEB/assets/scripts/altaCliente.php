<?php
    include "database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['correo']) && !empty($_POST['clave']) 
            && !empty($_POST['nombreCliente']) && !empty($_POST['contraCliente']) && !empty($_POST['ubicacionCliente'])) {
            $correo=filter_var($_POST['correo'],FILTER_SANITIZE_EMAIL);
            $clave=$_POST['clave'];
            $clienteN=$_POST['nombreCliente'];
            $contrC=$_POST['contraCliente'];
            $ubi=$_POST['ubicacionCliente'];
            
            $min=80000;
            $max=200000;
            $rand=mt_rand($min,$max)/100;
            $saldo=number_format($rand,2,'.','');
            
            $conex=null;
            conectar_db($conex);
            if (mysqli_errno($conex)) {
                echo json_encode(['success' => false, 'error' => 'Error de SQL: ' . mysqli_error($conex)]);
                exit;
            }
            
            if($conex){
                $query1=null;
                sql_ComparaUsuarios($conex,$query1,$clienteN,$correo);
                if (!$query1) {
                    echo json_encode(['success' => false, 'error' => 'Error en la consulta de carrito']);
                    exit;
                }
                if(mysqli_num_rows($query1) > 0){
                    echo json_encode(['success' => false, 'error' => 'Correo o uusario ya registrados']);
                    exit;
                }else{
                    $query2=null;
                    sql_VerificaCorreo($conex,$query2,$correo,$clave);
                    if(mysqli_num_rows($query2) > 0){
                        $nuevoC=mysqli_fetch_array($query2);
                        $id=$nuevoC[0];
                        $query3=null;
                        sql_AltaCliente($conex,$query3,$clienteN,$contrC,$id,$saldo,$ubi);
                        /*
                        $carpeta="../imgCompras/".$clienteN;
                        if(!mkdir($carpeta)){
                            echo json_encode(['success' => false, 'error' => 'No coincide la clave y el correo']);
                            exit;
                        }*/
                        echo json_encode(['success' => true]);
                        exit;
                    }else{
                        echo json_encode(['success' => false, 'error' => 'No coincide la clave y el correo']);
                        exit;
                    }
                }
            }
        }
        echo json_encode(['success' => false, 'error' => 'Te falta llenar campos']);
        exit;
    }
?>