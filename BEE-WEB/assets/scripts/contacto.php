<?php
    include "database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(!empty($_POST['usuario']) && !empty($_POST['correo']) && !empty($_POST['asunto'])
            && !empty($_POST['msj'])){
            $usuario=$_POST['usuario'];
            $correo=$_POST['correo'];
            $asunto=$_POST['asunto'];
            $mensaje=$_POST['msj'];
            
            correo_Contacto($usuario,$correo,$asunto,$mensaje);
            echo json_encode(['success' => true, 'message' => 'Correo enviado correctamente']);
            exit();
        }else{
            echo json_encode(['success' => false, 'error' => 'Haz dejado campos vacios']);
            exit;
        }
    }
?>