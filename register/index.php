<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mai Social</title>
    <link rel="stylesheet" href="../css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <style>
        ::-webkit-scrollbar {
            width: 0px;
            transition: 0.5s;
        }
        ::-webkit-scrollbar-thumb {
            background: #3c3c3c;
            border-radius: 3px;
            animation-delay: 0.5s;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #3c3c3c;
            border-radius: 3px;
            animation-delay: 0.5s;
        }
        ::-webkit-scrollbar-thumb:active {
            background: #3c3c3c;
            border-radius: 3px;
            animation-delay: 0.5s;
        }
    </style>
</head>
<body style="background-color: #f4f4f4">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
            <div class="container-fluid">
                <button
                        class="navbar-toggler"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                >
                    <i class="bi bi-arrow-down-up"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <img
                                src="../attachments/mai.png"
                                height="60"
                                loading="lazy"
                        />
                    </a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Depolara Göz At</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Problemler</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Market</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Keşfet</a>
                        </li>
                    </ul>
                </div>
                <div class="float-end">
                    <a href="../oauth/github/github-callback.php">
                        <div class="btn btn-dark"><i class="fs-6 bi bi-github"></i> &nbsp; GitHub ile giriş yap</div>
                    </a>
                </div>
            </div>
        </nav>
        <div
                class="p-5 text-center bg-image"
                style="
      background-image: url('../attachments/coverbg.png');
      height: 700px;
    "
        >
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white animate__fadeInDown animate__animated">
                        <h1 class="mb-3">Mai'ye hoşgeldiniz</h1>
                        <h4 class="mb-3">Hadi başlayalım.</h4>
                        <a class="btn btn-rounded btn-outline-light btn-lg animate__animated animate__fadeInDown" href="../docs/" role="button" style="animation-delay: 0.5s"><i class="bi bi-book"></i> &nbsp; Dökümantasyon</a>
                        <div class="btn-lg btn mt-3 btn-rounded btn-outline-light animate__animated animate__fadeInDown" style="animation-delay: 1s"  data-ripple-color="dark">
                            <i class="bi bi-arrow-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mt-3"></div>
    <div class="container-fluid">
        <h2  class="fontlu text-center mb-3"><b><code>Nasıl Kullanılır;</code></b></h2>
        <div class="row">
            <div class="col-md-3">
                <div class="alert alert-info">
                    <h5 class="text-center"><b>1. GitHub hesabınızı oluşturun</b></h5>
                    <p class="text-center">Mai'yi kullanabilmek için GitHub hesabınız şart. Eğer GitHub hesabınız yoksa <a href="https://github.com">buradan</a> oluşturabilirsiniz.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-warning">
                    <h5 class="text-center"><b>2. GitHub hesabınızı uygulamaya bağlayın</b></h5>
                    <p class="text-center">Mai'yi kullanabilmek için GitHub hesabınızı uygulamaya bağlamanız gerekiyor. Bunun için <a href="../oauth/github/github-callback.php">buraya</a> tıklayarak GitHub hesabınızı uygulamaya bağlayabilirsiniz.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="alert alert-success">
                    <h5 class="text-center"><b>3. Uygulamayı kullanmaya başlayın</b></h5>
                    <p class="text-center">Mai'yi kullanmaya başlamak için <a href="../docs/">buraya</a> tıklayarak dökümantasyona ulaşabilirsiniz.</p>
                </div>
            </div>
        </div>
        </div>
    </div>
    

    <script src="../js/mdb.min.js"></script>
</body>
</html>