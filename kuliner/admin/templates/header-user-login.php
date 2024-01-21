<?php
session_start();
require("../db/conn.php");
$user  = $_SESSION['login'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

foreach ($rows as $role) {
    $role = $role['role'];
}

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
}
if (isset($_SESSION['login'])) {
    if ($role == 'user') {
        header("Location: ../index.php");
    }
}
