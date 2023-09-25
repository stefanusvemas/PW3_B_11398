<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ./login.php");
    exit;
}

if (isset($_GET["indexLayanan"])) {
    $indexLayanan = $_GET["indexLayanan"];
    if (isset($_SESSION["layanan"][$indexLayanan])) {
        $_SESSION["alertHapus"] = "Berhasil menghapus data " . $_SESSION["layanan"][$indexLayanan]["namaLayanan"];
        unset($_SESSION["layanan"][$indexLayanan]);
        $_SESSION["layanan"] = array_values($_SESSION["layanan"]);
        
    }
}

header("Location: ./dashboard.php");
exit;

?>