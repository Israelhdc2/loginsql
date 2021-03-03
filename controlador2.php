<?php

    require "model2.php";

    $model = new Model();

    /*$model->user=$_POST['aa'];
    $model->pass=$_POST['pa'];*/

    $model->set_usuario($_POST['aa']);
    $model->set_pass($_POST['pa']);

    $fila = $model->logear();

    if($fila > 0){
        echo "bien";
    }else{
        echo "mal";
        header('refresh:2; url=http://localhost/prueba2/login2.php');
        //header('location:login2.php');
    }

?>