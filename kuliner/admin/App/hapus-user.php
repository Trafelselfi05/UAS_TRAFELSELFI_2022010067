<?php
require("function.php");


$id_user = $_POST['idproduk'];

hapusUser($id_user);
echo json_encode([
    'response' => 'True'
]);

