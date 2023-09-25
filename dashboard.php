<?php
session_start();

if (!isset($_SESSION["user"])) {
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $detail['page_title']; ?></title>

    <link rel="icon" href="<?php echo $detail["logo"]; ?>" type="image/x-icon" />

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="./assets/css/poppins.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/style.css" />

    <style>
        .img-bukti-ngantor {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <header class="fixed-top scrolled" id="navbar">
        <nav class="container nav-top py-2">
            <a href="./" class="rounded bg-white py-2 px-3 d-flex align-item-center nav-home-btn">
                <img src="<?php echo $detail["logo"]; ?>" class="crown-logo">
                <div>
                    <p class="mb-0 fs-5 fw-bold"><?php echo $detail["name"]; ?></p>
                    <p class="small mb-0"><?php echo $detail["tagline"]; ?></p>
                </div>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="./" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link active" area-current="page">Admin Panel</a></li>
                <li class="nav-item"><a href="./processLogout.php" class="nav-link text-danger" area-current="page">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main style="padding-top: 84px;" class="container">
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Dashboard</h1>

        <!-- Alert Berhasil Simpan -->
        <?php if(isset($_SESSION["alertSimpan"])) { ?>
            <div class="alert alert-success" role="alert">
                <strong>Berhasil!</strong> <?php echo $_SESSION["alertSimpan"] ?>
            </div>
            <?php $_SESSION["alertSimpan"] = null; ?>
        <?php } ?>
        
        <!-- Alert Berhasil Delete -->
        <?php if(isset($_SESSION["alertHapus"])) { ?>
            <div class="alert alert-success" role="alert">
                <strong>Berhasil!</strong> <?php echo $_SESSION["alertHapus"] ?>
            </div>
            <?php $_SESSION["alertHapus"] = null; ?>
        <?php } ?>

        <div class="row">
            <div class="col-lg-10">
                <div class="card card-body h-100 justify-content-center">
                    <h4>Selamat datang,</h4>
                    <h1 class="fw-bold display-6 mb-3"><?php echo $_SESSION["user"]["username"]; ?></h1>

                    <p class="mb-0">Kamu sudah login sejak:</p>
                    <p class="fw-bold lead mb-0"><?php echo $_SESSION["user"]["login_at"] ?></p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card card-body">
                    <p>Bukti sedang ngantor:</p>
                    <img src="<?php echo $_SESSION["user"]["bukti_ngantor"]; ?>" class="img-fluid rounded img-bukti-ngantor" alt="Bukti ngantor (sudah dihapus)">
                </div>
            </div>
        </div>
        
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Daftar Layanan</h1>
        <p>Grand Atma memiliki <strong><?php echo count($_SESSION["layanan"]) ?></strong> fasilitas dan layanan yang dapat digunakan customer.</p>
        <a href="./tambahLayanan.php" class="btn btn-success"><i class="fa-regular fa-square-plus"></i> Tambah Layanan</a>

        <?php foreach ($_SESSION["layanan"] as $index => $layanan): ?>
            <div class="mt-3">
                <div class="w-100 p-3 border rounded">
                    <div class="d-flex gap-3">
                        <img src="./assets/images/featurette-2.jpeg" class="card-img-top" alt="serviceImage"
                            style="width: 250px; border-radius: 10px;">
                        <div style="width: 100%;">
                            <h4>
                                <?php echo $layanan['namaLayanan'] ?>
                            </h4>
                            <p>
                                <?php echo $layanan['deskripsiLayanan'] ?>
                            </p>
                            <hr>
                            <div class="d-flex gap-4">
                                <p>Satuan: <strong>
                                        <?php echo $layanan['satuanPesanan'] ?>
                                    </strong></p>
                                <p>Harga: <strong>
                                        <?php echo $layanan['hargaLayanan'] ?>
                                    </strong></p>
                            </div>
                            <a href="./processHapusLayanan.php?indexLayanan=<?php echo $index; ?>"
                                class="btn btn-danger"><i class="fa-regular fa-trash-can"></i> Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        
    </main>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/098cbe1db3.js" crossorigin="anonymous"></script>
</body>

</html>