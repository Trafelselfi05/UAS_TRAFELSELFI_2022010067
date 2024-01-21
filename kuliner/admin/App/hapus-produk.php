<?php
require("function.php");

$idproduk = $_POST['idproduk'];
hapusProduk($idproduk);

echo json_encode([
    'response' => 'True'
]);
