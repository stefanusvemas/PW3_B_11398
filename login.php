<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location: ./dashboard.php");
    exit;
}

$detail = [
    "name" => "Grand Atma",
    "tagline" => "Hotel & Resort",
    "page_title" => "Log in - Grand Atma Hotel & Resort",
    "logo" => "./assets/images/crown.png"
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $detail["page_title"]; ?></title>
    <link rel="icon" href="<?php echo $detail["logo"]; ?>" type="image/x-icon" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

    <!-- Poppins dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https: //fonts.gstatic.com" crossorigin>
    <link href=". /assets/css/poppins.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <style>
        #formAuth {
            max-width: 576px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
<header class="fixed-top scrolled" id="navbar">
        <nav class="container nav-top py-2">
            <a href="./" class="rounded bg-white py-2 px-3 d-flex align-items-center nav-home-btn">
                <img src="<?php echo $detail["logo"]; ?>" class="crown-logo" />
                <div>
                    <p class="mb-0 fs-5 fw-bold"><?php echo $detail["name"]; ?></p>
                    <p class="small mb-0"><?php echo $detail["tagline"]; ?></p>
                </div>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="./" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Admin Login</a></li>
            </ul>
        </nav>
    </header>


    <main style="padding-top : 84px;" class="container">
        <h1 class="text-center mt-5 display-4">Welcome Admin!</h1>
        <p class="text-center lead">Untuk memestikan identitas, silahkan isi form berikut:</p>

        <hr class="featurette-divider" />
        <form action="./processLogin.php" method="POST" id="formAuth" enctype="multipart/form-data">

            <div class="alert alert-info mb-4 text-center" role="alert">
                <strong>Info!</strong>Username dan Password bebas, yang penting diisi.
            </div>

            <?php if (isset($_SESSION["error"])) { ?>
                <div class="alert alert-danger mb-4 text-center" role="alert">
                    <strong>Error!</strong> <?php echo $_SESSION["error"]; ?>
                </div>
            <?php
                unset($_SESSION["error"]);
            } ?>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username">
                <label for="inputUsername">Username</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" />
                <label for="inputPassword">Password</label>
            </div>

            <div>
                <label for="inputFile" class="form-label d-block text-center">Bukti sedang ngantor:</label>
                <input type="file" class="form-control" id="inputFile" accept=".jpg,.jpeg,.png" name="bukti_ngantor" />

            </div>

            <div>
                <button type="submit" class="btn btn-primary w-100 fw-bold">Login</button>

                <input type="hidden" name="mencoba_login" value="1">
            </div>
        </form>
    </main>
    <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>