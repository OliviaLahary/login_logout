<?php

session_start();

include_once(__DIR__.'/../../includes/env.php');

session_destroy();
header("location:" . $baseUrl . "index.php");
exit();

?>