<?php

require_once(__DIR__.'/../../config/database.php');

if($_GET){
    $rows = $pdo->exec('DELETE FROM product WHERE id= '.$_GET['id']);

    if($rows>0){
        header('Location:'.$baseUrl.'index.php');
    } else{
        echo('Erreur de stock');
    }
}


?>