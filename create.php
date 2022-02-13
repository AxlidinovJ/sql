<?php
require_once "./connections.php";
$connection = new Connection();
$add = $connection->addNews($_POST);
header("location:./");

?>