<?php
    if(!isset($_COOKIE['user'])){
        //http_response_code(403);
        //die('403 - Forbidden');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mai Social</title>
    <link rel="stylesheet" href="css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
</head>
<?php
require_once 'php/components/functions/date.php';
?>

<body style="background: #f4f4f4;">
<div class="container-fluid mt-3">
    <!--Row sys-->
    <div class="row">
        <!--User details col-->
        <div class="col-md-3">
            <!--User time info-->
            <div class="alert alert-info rounded-widget text-center mb-3">
                <b class="fontlu fs-5"><?= getDay(); ?>, yasinldev</b>
            </div>
            <!--Profile card-->
            <div class="card mb-2 rounded-widget">
                <!--Card header img-->
                <div class="card-header header-img" style="background-image: url('https://i.pinimg.com/originals/6f/2d/34/6f2d34fe6c8746c56c14fbc55308ef99.jpg');"></div>
                <!--centered profile img-->
                <div class="text-center position-absolute" style="margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                    <img src="https://i.pinimg.com/280x280_RS/cc/df/91/ccdf913cd6a6439b5c7481e8f033157f.jpg" class="img-profile rounded-circle" style="margin-top: 10px;">
                </div>
                <!--User card body start-->
                <div class="card-body position-relative">
                    <!-- user name -->
                    <div class="fontlu text-center fs-4 mt-3">
                        <strong>yasinldev</strong>
                    </div>
                    <!-- User bio -->
                    <div class="small text-muted mt-1 text-center">
                        Web Developer in artado project
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
                    <hr>
                    <!-- Navigation -->
                    <div class="fs-4">
                        <!-- Feed -->
                        <div class="mb-4">
                            <i class="bi bi-house-heart"></i>
                            <b class="mx-2 fontlu">Feed</b>
                        </div>
                        <div class="mb-4">
                            <i class="bi bi-newspaper"></i>
                            <b class="mx-2 fontlu">News</b>
                        </div>
                        <div class="mb-4">
                            <i class="bi bi-calendar-event"></i>
                            <b class="mx-2 fontlu">Events</b>
                        </div>
                        <div class="mb-4">
                            <i class="bi bi-code-slash"></i>
                            <b class="mx-2 fontlu">Projects</b>
                        </div>
                    </div>
                </div>
                <div class="btn btn-outline-info card-footer position-relative">Settings</div>
            </div>
            <p class="fontlu text-center mt-2"><b>©2022 Mai Social</b></p>
        </div>
        <style>
            .badge-white{
                background-color: #ffffff;
                color: black;
            }
            .overlay-dark {
                filter: brightness(60%);

            }
        </style>
        <div class="col-md-6">
            <div class="card mb-3" data-mdb-toggle="modal" data-mdb-target="#">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <img class="img-profile rounded-circle" src="https://i.pinimg.com/280x280_RS/cc/df/91/ccdf913cd6a6439b5c7481e8f033157f.jpg" />
                        </div>
                        <div class="col-auto">
                            <div class="text-muted mt-4">
                                Share what's on your mind, yasinldev
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <i class="bi bi-camera mx-2"></i>
                    <i class="bi bi-camera-video mx-2"></i>
                    <i class="bi bi-terminal-dash mx-2"></i>
                    <i class="bi bi-filetype-gif mx-2"></i>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="float-end mt-2 fs-5">
                        <i class="bi bi-three-dots"></i>
                    </div>
                    <div class="row mb-4">
                        <div class="col-auto">
                            <img src="https://pbs.twimg.com/media/E370sx_VoAMBQVU?format=jpg&name=large" class="img-profile rounded-circle">
                        </div>
                        <div class="col-auto">
                            <b>Kayega</b>
                            <div class="text-muted mt-2">23 August 2022, 00:24</div>
                        </div>
                    </div>
                    <div class="card-text mb-1">
                        That it's too late to apologize, it's too late, I said it's too late to apologize, it's too late
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-start">
                        <i class="bi fs-4 bi-heart mx-3"><small class="mx-1 text-center fs-6 mb-1">322</small></i>
                        <i class="bi fs-4 bi-chat mx-3"><small class="mx-1 text-center fs-6 mb-1">13</small></i>
                    </div>
                    <div class="fs-4 float-end">
                        <i class="bi bi-bookmark mx-3"></i>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="float-end mt-2 fs-5">
                        <i class="bi bi-three-dots"></i>
                    </div>
                    <div class="row mb-4">
                        <div class="col-auto">
                            <img src="https://i.pinimg.com/474x/91/ae/f2/91aef2b69fed61bd865c71408c243f29.jpg" class="img-profile rounded-circle">
                        </div>
                        <div class="col-auto">
                            <b>ArdaTDev</b>
                            <div class="text-muted mt-2">23 August 2022, 01:14</div>
                        </div>
                    </div>
                    <div class="card-text mb-1">
                        But I crumble completely when you cry, It seems like once again you've had to greet me with goodbye.
                    </div>

                    <img src="https://www.sabanciuniv.edu/sites/default/files/arctic-monkeys-grup-elemanlari-blog-kapak.png" class="post-img img-fluid mt-1">
                </div>
                <div class="card-footer">
                    <div class="float-start">
                        <i class="bi fs-4 bi-heart mx-3"><small class="mx-1 text-center">322</small></i>
                        <i class="bi fs-4 bi-chat mx-3"><small class="mx-1 text-center">13</small></i>
                    </div>
                    <div class="fs-4 float-end">
                        <i class="bi bi-bookmark mx-3"></i>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">
                    Recently Added Projects
                </div>
                <div class="card-body">
                    <a href="#">
                        <div class="alert alert-success text-center project-hover">
                            Nova Search From Artado Project
                            <div class="badge badge-light mt-3">View in Github</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    Changelog for Mai Social
                    <a href="#" class="float-end">View All</a>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-light">
                        <li class="list-group-item">
                            <h5 class="fw-bold">Our company starts its operations</h5>
                            <p class="text-muted mb-2 fw-bold">11 March 2020</p>
                            <p class="text-muted mb-0">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                                necessitatibus adipisci, ad alias, voluptate pariatur officia
                                repellendus repellat inventore fugit perferendis totam dolor
                                voluptas et corrupti distinctio maxime corporis optio?
                            </p>
                        </li>
                    </div>
                </div>
            </div>
            <div class="alert text-center fs-5 rounded-widget alert-primary">
                <div class="badge badge-light mx-1">About</div>
                <div class="badge badge-light mx-1">Support</div>
                <div class="badge badge-light mx-1">Docs</div>
                <div class="badge badge-light mx-1">Help</div>
                <div class="badge badge-light mx-1">Privacy & terms</div>
            </div>
        </div>
    </div>

</div>

<script src="js/main.js"></script>
</body>
</html>