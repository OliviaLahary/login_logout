<?php

require_once(__DIR__ . '/config/database.php');
include_once( __DIR__. '/includes/header.php');
require_once(__DIR__. '/includes/env.php');

?>

     <main role="main">

        <div class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php
                    if(isset($_SESSION['user_id'])){
                        ?>
                    <p>
                    <a href="<?=$baseUrl?>src/user/logout.php" class="btn btn-success"> Déconnexion </a>
                    </p>
                    <?php
                    }else {
                    ?>
                    <p>
                        <a href="<?=$baseUrl?>src/user/new.php" class="btn btn-success"> Creer un compte </a>
                        <a href="<?=$baseUrl?>src/user/login.php" class="btn btn-primary"> Login </a>
                    </p>
                    <?php }?>
                </div>
            </div>
        </div>

    </main>

<?php
require_once(__DIR__. '/includes/footer.php');
