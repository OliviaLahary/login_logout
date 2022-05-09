<?php
include_once(__DIR__.'/env.php');


?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=$baseUrl?>index.php">Home</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link" href="<?=$baseUrl?>src/product/index.php">Produits</a>
                    <!-- essayer de mettre dans l'onglet produits quand on est pas connecté, une phrase 'Merci de vous connecter pour un appreçu des produits mais je sais pas ou le mettre'-->
                </li>
            </ul>
        </div>
    </nav>
</header>