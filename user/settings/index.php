<?php
        require_once '../../php/components/class/system.php';
    $Info = new accountSystem();

    $Info->cookieSecure();
    $repo = new OAuthGitHub();

    ?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mai Social - <?= $Info->getData('name'); ?></title>
    <link rel="stylesheet" href="../../css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        .scrollbar::-webkit-scrollbar {
            width: 4px;
            transition: 0.5s;

        }

        .scrollbar::-webkit-scrollbar-thumb {
            background: #3c3c3c;
            border-radius: 3px;
            animation-delay: 0.5s;

        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
</head>
<body style="background-color: #f4f4f4 !important;">
    <div class="container mt-3">
        <!-- Navbar -->
        <nav class="navbar mb-3 navbar-expand-lg navbar-light bg-light" style="border-radius: 6px; border: 1px solid #3c3c3c;">
            <div class="container">

                <button
                    class="navbar-toggler justify-content-center"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#settingsNavbar"
                    aria-controls="settingsNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <i class="bi bi-arrow-bar-down float-end"></i>
                </button>
                    <div class="collapse navbar-collapse justify-content-center" id="settingsNavbar">
                        <form method="get">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item text-center mb-2 mt-2">
                                    <button name="userS" class="nav-link border-0 badge badge-warning mx-3 fs-6">Kullanıcı Ayarları &nbsp; <i class="bi bi-person"></i> </button>
                                </li>
                                <li class="nav-item text-center mb-2 mt-2">
                                    <button name="privacyS" class="nav-link border-0 badge badge-warning mx-3 fs-6">Gizlilik ve Güvenlik &nbsp; <i class="bi bi-lock"></i> </button>
                                </li>
                                <li class="nav-item text-center mb-2 mt-2">
                                    <button name="githubS" class="nav-link border-0 badge badge-warning mx-3 fs-6">Github Ayarları &nbsp; <i class="bi bi-github"></i> </button>
                                </li>
                                <li class="nav-item text-center mb-2 mt-2">
                                    <button name="docs" class="nav-link border-0 badge badge-warning mx-3 fs-6">Dökümantasyon &nbsp; <i class="bi bi-file-earmark"></i> </button>
                                </li>
                            </ul>
                        </form>
                    </div>
            </div>
        </nav>
        <?php
            if (@isset($_GET['userS'])){
                require_once 'userS/userS.php';
            }

        ?>
    </div>

    <script src="../../js/mdb.min.js"></script>
</body>
</html>