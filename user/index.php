<?php
    require_once '../php/components/class/system.php';
    require_once '../php/components/functions/date.php';

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
    <link rel="stylesheet" href="../css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css">
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
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-3">
                <!--User time info-->
                <div class="alert alert-info rounded-widget text-center mb-3">
                    <b class="fontlu fs-5"><?= getDay(); ?>, <?= $Info->getData('username'); ?></b>
                </div>
                <!--Profile card-->
                <div class="card mb-2 rounded-widget">
                    <!--Card header img-->
                    <div class="card-header header-img" style="background-image: url('https://i.pinimg.com/originals/6f/2d/34/6f2d34fe6c8746c56c14fbc55308ef99.jpg');"></div>
                    <!--centered profile img-->
                    <div class="text-center position-absolute" style="margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                        <img src="<?=$Info->getData('picture')?>" class="rounded" style="margin-top: 10px; width: 100px; height: 100px;">
                    </div>
                    <!--User card body start-->
                    <div class="card-body position-relative">
                        <?php if (@$_COOKIE['admin'] || @isset($_COOKIE['admin'])){ ?>
                            <div data-mdb-toggle="tooltip" title="Mai Staff" class="float-end badge badge-danger">
                                <i class="bi bi-code-slash"></i>
                            </div>
                        <?php } ?>
                        <!-- user name -->
                        <div class="fontlu text-center fs-4 mt-5">
                            <strong><?=$Info->getData('username')?></strong>
                        </div>
                        <!-- User bio -->
                        <div class="small text-muted mt-1 text-center">
                            <?=$Info->getData('bio')?>
                        </div>
                        <!-- Followers & post section -->
                        <div class="row mt-3 justify-content-center">
                            <div class="col-auto mx-1 text-center">
                                <!-- Posts number-->
                                <div class="fs-4">
                                    21
                                </div>
                                <div class="badge badge-info">
                                    Posts
                                </div>
                            </div>
                            <div class="col-auto mx-1 text-center">
                                <!-- Following -->
                                <div class="fs-4">
                                    322
                                </div>
                                <div class="badge badge-primary">
                                    Following
                                </div>
                            </div>
                            <div class="col-auto mx-1 text-center">
                                <!-- Followers -->
                                <div class="fs-4">
                                    279
                                </div>
                                <div class="badge badge-secondary">
                                    Followers
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn btn-outline-info card-footer position-relative">Settings</div>
                </div>
            </div>
            <div class="col-md-6">
                <!--github and projects-->
                <div class="justify-content-center">
                    <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a
                                    class="nav-link active"
                                    id="mai-github"
                                    data-mdb-toggle="tab"
                                    href="#github"
                                    role="tab"
                                    style="border-radius: 3px;"
                                    aria-controls="github"
                                    aria-selected="true"
                            >GıtHub &nbsp;&nbsp; <i class="bi bi-github fs-5"></i> </a
                            >
                        </li>
                        <li class="nav-item" role="presentation">
                            <a
                                    class="nav-link"
                                    id="mai-post"
                                    data-mdb-toggle="tab"
                                    href="#post"
                                    role="tab"
                                    style="border-radius: 3px;"
                                    aria-controls="post"
                                    aria-selected="false"
                            >Feed &nbsp; &nbsp; <i class="bi bi-house-door-fill"></i></a
                            >
                        </li>
                    </ul>
                    <div class="tab-content" id="mai-content">

                        <div
                                class="tab-pane fade show active"
                                id="github"
                                role="tabpanel"
                                aria-labelledby="github"

                        >
                            <div class="row">
                                <div class="badge badge-info col-md-12">
                                    Kaydırılabilir!
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row mt-3 overflow-auto scrollbar" style="max-height: 550px;" >
                                <?= $repo->getRepo($Info->getData('repoUrl'), $Info->getData('name')); ?>
                            </div>
                        </div>
                        <div
                                class="tab-pane fade"
                                id="post"
                                role="tabpanel"
                                aria-labelledby="post"
                        >
                            <div class="alert text-center alert-warning">
                                <b>Burası boş görünüyor...</b>
                                <hr>
                                Herhangi bir post oluşturup arkadaşlarınla eğlenenebilirsin tabi varsa... O-olsun be bizim için atarsın en kötü oda mı olmaz... her neyse hadi anasayfadan bir gönderi oluşturalım!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3 rounded-widget">
                    <div class="card-header text-center">
                        Sizin için Önerilenler
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="https://i.pinimg.com/474x/f4/15/63/f41563e75cb6201e57d7c4ed5a2b50f6.jpg" class="img-fluid rounded mx-1" style="width: 60px !important; height: 60px!important;">
                            </div>
                            <div class="col-auto mt-3">
                                <b>ardatdev</b>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-auto">
                                <img src="https://i.pinimg.com/originals/d3/67/2c/d3672c05f618c1aaeac7755cefcd7b0b.png" class="img-fluid rounded mx-1" style="width: 60px !important; height: 60px!important;">
                            </div>
                            <div class="col-auto mt-3">
                                <b>Kayega</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 card alert-dark rounded-widget">
                    <div class="card-header text-center">
                        <i class="fs-4 bi bi-github"></i>
                    </div>
                    <div class="card-body text-center">
                        Github ayarlarınızı kontrol edin ve tamamlamanız gereken bir şey olup olmadığını teyit edin.
                    </div>
                </div>
                <div class="card mb-3 alert-info rounded-widget">
                    <div class="card-header text-center">
                        Yardım ve Destek
                    </div>
                    <div class="card-body">
                        Yardım ve Destek için Discord sunucumuzu veya <a href="mailto: mai@artado.xyz">Email'imize ulaşabilirsiniz.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/mdb.min.js"></script>

</body>
</html>