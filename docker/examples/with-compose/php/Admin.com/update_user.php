<?php
session_start();
if (isset($_SESSION['admin']) and $_SESSION['admin'] == true) {
} else {
    $_SESSION['alertadmin']  = true;
    header('location: ../../');
}

session_start();
include "../service/database.php";

$id = $_POST['id'];

$userbios = $_POST['username'];
$passwordbios = $_POST['password'];
$query = "UPDATE users SET username = '$userbios', password '$passwordbios', WHERE id = '$id'";

if($db->query($query)) {
    $_SESSION['alertupdate'] == true;
    header("location: Ekspor.php");
} else {

    echo "Data Gagal Diupate!";
}

?>