<?php
    include "database.php";


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['producto'])){
            $strProducto=$_POST['producto'];
            $link=null;
            conectar_db($link);
            if($link){
                $query=null;
                sql_ConsultaNombreProducto($link,$query,$strProducto);
                if(mysqli_num_rows($query) > 0){
                    $listaProd=mysqli_fetch_array($query);
                    $imagen=$listaProd['imagenProducto'];
                    $ruta="../imgProductos/".$imagen;
                    if(!file_exists($ruta)){
                        $listaProd['imagenProducto']="temporal.jpg";
                    }
                    
                    echo json_encode(['success' => true, 'data' => $listaProd]);
                } else {
                    echo json_encode(['success' => false]);
                }      
            }
        }
    }
?>