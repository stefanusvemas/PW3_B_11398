<?php
session_start();

if(!isset($_SESSION["user"])) {
    header("Location: ./login.php");
    exit;
}

$detail = [
    "name" => "Grand Atma",
    "tagline" => "Hotel & Resort",
    "page_title" => "Admin Panel - Grand Atma Hotel & Resort",
    "logo" => "./assets/images/crown.png"
];

if(!isset($_SESSION["layanan"])) {
    $_SESSION["layanan"] = [];
}

if(isset($_POST["simpanLayanan"])){
    $namaLayanan = $_POST["namaLayanan"];
    $deskripsiLayanan = $_POST["deskripsiLayanan"];
    $satuanPesanan = $_POST["inputSatuanPemesanan"];
    $hargaLayanan = $_POST["hargaLayanan"];

    $layanan = [
        "namaLayanan" => $namaLayanan,
        "deskripsiLayanan" => $deskripsiLayanan,
        "satuanPesanan" => $satuanPesanan,
        "hargaLayanan" => $hargaLayanan
    ];

    array_push($_SESSION["layanan"], $layanan);
    $_SESSION["alertSimpan"] = "Berhasil menyimpan data " . $namaLayanan;
    header("Location: ./dashboard.php");
}
?>