<?php
    include_once "database.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(!empty($_POST['txtEmail'])){
            $strCorreo=filter_var($_POST['txtEmail'], FILTER_SANITIZE_EMAIL);
            if(str_ends_with($strCorreo, '@gmail.com')){
                $letra='';
                $numAl=rand(0,99);
                $numForm=str_pad($numAl,2,'0',STR_PAD_LEFT);
                for($i=0;$i<2;$i++){
                    $letra.=chr(rand(65,90));
                }
                $codigo=$numForm.$letra;
                $link=null;
                conectar_db($link);
                if($link){
                    $query1=null;
                    sql_VerificaCorreoCuenta($link,$query1,$strCorreo);
                    if (!$query1) {
                        echo json_encode(['success' => false, 'error' => 'Error en la consulta de verificar']);
                        exit;
                    }
                    if(mysqli_num_rows($query1) > 0){
                        echo json_encode(['success' => false, 'error' => 'Ya esta registrado este correo']);
                        exit;
                    }
                    $query4=null;
                    sql_ComparaCorreo($link,$query4,$strCorreo);
                    if (!$query4) {
                        echo json_encode(['success' => false, 'error' => 'Error en la consulta de verificar 2']);
                        exit;
                    }
                    if(mysqli_num_rows($query4) > 0){
                        $query2=null;
                        sql_ModificaNuevoCliente($link,$query2,$strCorreo,$codigo);
                        if (!$query2) {
                            echo json_encode(['success' => false, 'error' => 'Error en la consulta de modificar']);
                            exit;
                        }
                    }else{
                        $query3=null;
                        sql_CreaNuevoCliente($link,$query3,$strCorreo,$codigo);
                        if(!$query3){
                            echo json_encode(['success' => false, 'error' => 'Error en la consulta de crear nuevo reg']);
                            exit;
                        }
                    }
                    
                    email_MandaCodigo($strCorreo,$codigo);

                    echo json_encode(['success' => true]);
                    exit;
                    /*
                        echo json_encode(['success' => false, 'error' => "Tu clave es $codigo"]);
                        exit;
                    */
                }
            }
            echo json_encode(['success' => false, 'error' => 'No es formato valido de correo']);
            exit;
        }
            echo json_encode(['success' => false, 'error' => 'No haz ingresado tu correo']);
            exit;
    }
?>