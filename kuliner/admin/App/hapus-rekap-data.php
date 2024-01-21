<?php
require("function.php");


$id_pemesan = $_POST['idproduk'];

hapusRekapData($id_pemesan);

echo json_encode([
    'response' => 'True'
]);
