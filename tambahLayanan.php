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
                <li class="nav-item"><a href="./dashboard.php" class="nav-link active" area-current="page">Admin Panel</a></li>
                <li class="nav-item"><a href="./processLogout.php" class="nav-link text-danger" area-current="page">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main style="padding-top: 74px;" class="container">
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Tambah Layanan</h1>
        <form action="./processTambahLayanan.php" method="POST" id="formAuth" enctype="multipart/form-data">
            <div class="row align-items-center mb-3">
                <div class="col">
                    <label for="namaLayanan">Nama Layanan</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="namaLayanan" id="inputNamaLayanan" required>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col">
                    <label for="deskripsi">Deskripsi</label>
                </div>
                <div class="col">
                    <textarea class="form-control" name="deskripsiLayanan" id="inputDeskripsi" cols="75" rows="3" required></textarea>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col">
                    <label for="satuanPemesanan">Satuan Pemesanan</label>
                </div>
                <div class="col">
                    <select name="inputSatuanPemesanan" id="inputSatuanPemesanan" class="form-control" required>
                        <option value="">Pilih Satuan</option>
                        <option value="pcs">per pcs</option>
                        <option value="jam">per jam</option>
                        <option value="pax">per pax</option>
                    </select>
                </div>
            </div>

            <div class="row align-items-center mb-3">
                <div class="col">
                    <label for="hargaLayanan">Harga Layanan (Rp)</label>
                </div>
                <div class="col">
                    <input type="number" class="form-control" name="hargaLayanan" id="inputHargaLayanan" required>
                </div>
            </div>
            
            <div class="row align-items-center mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                    <input type="hidden" name="simpanLayanan" value="1">
                </div>
            </div>
        </form>
        
    </main>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/098cbe1db3.js" crossorigin="anonymous"></script>
</body>
</html>