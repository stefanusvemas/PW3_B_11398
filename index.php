<?php
session_start();

$detail = [
    "name" => "Grand Atma",
    "tagline" => "Hotel & Resort",
    "page_title" => "Grand Atma Hotel & Resort",
    "logo" => "./assets/images/crown.png"
];

$gambar = [
    ".assets/images/hotel1.jpg",
    ".assets/images/hotel2.jpg",
    ".assets/images/hotel3.jpg"
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $detail['page_title']; ?></title>
    
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
    <link href="./assets/css/poppins.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/style.css"/>
</head>
<body>
    <header class="fixed-top" id="navbar">
        <nav class="container nav-top py-2">
            <a href="./" class="rounded bg-white py-2 px-3 d-flex align-item-center nav-home-btn">
                <img src="<?php echo $detail["logo"]; ?>" class="crown-logo">
                <div>
                    <p class="mb-0 fs-5 fw-bold"><?php echo $detail["name"]; ?></p>
                    <p class="small mb-0"><?php echo $detail["tagline"]; ?></p>
                </div>
            </a>

            <ul class="nav nav0pills">
                <li class="nav-item"><a href="#" class="nav-link active" area-current="page">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-bg-success">Admin Login</a></li>
            </ul>
        </nav>
    </header>
    
</body>
</html>