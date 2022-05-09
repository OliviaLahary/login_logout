<?php

require_once (__DIR__ . '/../../config/database.php');
require_once (__DIR__ . '/../../includes/header.php');


if($_GET){
    $stm=$pdo->prepare("SELECT * FROM product WHERE id=?");
    $stm->bindValue(1, $_GET['id']);
    $stm->execute();

    $row = $stm->fetch(PDO::FETCH_ASSOC);
};
?>


<main role="main">
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1><?= $row['name']?></h1>
                        <img class="img-fluid" src="<?=$baseUrl?>uploads/<?=$row['file']?>"/> 
                </div>
                <div class="col-md-4 box-shadow"> 
                    <div class="card-body">
                        <p class="card-text">
                            <a href="<?=$baseUrl?>src/product/show.php?id=<?=$row['id'];?>"><?=$row['name'];?></a>
                        </p>
                        <p class="card-text"> <?= $row['price']?> € </p>
                    </div>
                </div>
                

                
                <p>
                    <br><br><br>
                    <a class="btn btn-warning" href="<?=$baseUrl?>src/product/edit.php?id=<?=$row['id']?>"> Modifier </a>

                    <a class="btn btn-danger" href="<?=$baseUrl?>src/product/delete.php?id=<?=$row['id']?>"> Effacer </a>
                </p>
                
            </div>
        </div>
    </div>

</main>









<?php


require_once (__DIR__ . '/../../includes/footer.php');
?>