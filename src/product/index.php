<?php

require_once (__DIR__ . '/../../config/database.php');
require_once (__DIR__ . '/../../includes/header.php');


$stm = $pdo->query("SELECT id, name, file, price FROM product");

$rows = $stm->fetchAll(PDO::FETCH_ASSOC);



?>
<main role="main">
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php foreach($rows as $row) { ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                             <img class="img-fluid" src="<?=$baseUrl?>uploads/<?=$row['file']?>"/> 
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="<?=$baseUrl?>src/product/show.php?id=<?=$row['id'];?>"><?=$row['name'];?></a>
                                </p>
                                <p class="card-text"> <?= $row['price']?> € </p>
                            </div>
                        </div>
                    </div>
                <?php }; ?> 
            </div>
            <a href="<?=$baseUrl?>src/product/new.php" class="btn btn-primary"> New </a>
        </div>
    </div>

</main>

<?php

require_once (__DIR__ . '/../../includes/footer.php');

?>