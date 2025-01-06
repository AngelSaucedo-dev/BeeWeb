<?php
    include "database.php";

    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        if(isset($_POST['id_Cat'])){
            $idFiltro=$_POST['id_Cat'];

            $link=null;
            conectar_db($link);
            if($link){
                $query=null;
                sql_FiltroCategoria($link,$query,$idFiltro);//Realiza la consulta que devuelve la categoria con el id clikeado en el archivo clienteTienda.php
            }
        }
    }
?>