<?php
    include "database.php";
    
    
    
    $link=null;
    conectar_db($link);
    if($link){
        $query=null;
        sql_DatosTrabajador($link,$query,$nombreUsuario);
        if(mysqli_num_rows($query) > 0){
            $datosEmp=mysqli_fetch_array($query);
            $nombreEmp=$datosEmp['nombreEmpleado'];
            $correoEmp=$datosEmp['correoEmpleado'];
        }
        
    }
    

    $ubicacion="C. Morelos 1670, Barrio de San Sebastian, 78139 San Luis Potosí, S.L.P.";
    $numLocal="444 814 2130";
    $anioAct=date("Y");
    $correoLocal="beewebima@gmail.com";
?>