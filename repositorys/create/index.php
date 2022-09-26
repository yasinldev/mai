<?php
require_once '../../app/php/components/class/system.php';
$Info = new accountSystem();
$getRepo = new mai_repositorys();
$Info->cookieSecure();
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Repository</title>
    <link rel="stylesheet" href="../../css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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

        .scrollbar::-webkit-scrollbar-track {
            background: #f4f4f4;
            border-radius: 3px;
            animation-delay: 0.5s;

        }
    </style>

</head>
<body style="background-color: #f4f4f4">
    <div class="container mt-3">
        <form action="" method="post">
            <div class="btn btn-light" style="border: 1px solid cornflowerblue;"><img src="<?=$Info->getData('picture')?>" class="rounded" style="width: 30px; height: 30px;"> &nbsp; <b><?=$Info->getData('username')?></b></div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Depo Oluştur</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="badge badge-dot badge-danger" style="background-color: darkred;"></div>
                                    <input type="text" required name="repoName" class="form-control mb-2" placeholder="Depo Adı" style="height: 50px;">
                                </div>
                                <div class="col-md-6">
                                    <div class="badge badge-dot badge-danger" style="background-color: darkred;"></div>
                                    <input type="text" required name="repoDesc" class="form-control" placeholder="Depo Açıklaması" style="height: 50px;">
                                </div>
                            </div>
                            <hr>
                            <p class="text-muted">Görünürlük</p>
                            <select class="form-select mb-4" name="visib" id="form1" aria-label="select">
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                            <p class="text-muted">Lisans</p>
                            <select class="form-select mb-4" name="lisans" id="form1" aria-label="select">
                                <option value="null">Boş</option>
                                <option value="MIT Lisansı">MIT</option>
                                <option value="Apache Lisansı">Apache</option>
                                <option value="GNU Genel Kamu Lisansı">GNU Genel Kamu Lisansı</option>
                                <option value="GNU Kısıtlı Genel Kamu Lisansı">GNU Kısıtlı Genel Kamu Lisansı</option>
                                <option value="BSD Lisansı">BSD Lisansı</option>
                                <option value="Mozilla Kamu Lisansı">Mozilla Lisansı</option>
                            </select>
                            <p class="text-muted">Dil</p>
                            <div class="note note-primary mb-4">
                                Proje dilini sistem otomatik olarak algılayacaktır.
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" name="readme" type="checkbox" value="true" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault">README dosyası ekle</label>
                                <div class="text-muted">
                                    Projeniz için uzun bir açıklama yazabileceğiniz yer burasıdır.
                                </div>
                            </div>
                            <button type="submit" name="repo" class="btn btn-primary" style="width: 100%; height: 50px;">Depo Oluştur</button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="alert alert-info">
                            Depolar hakkında daha fazla bilgi almak için <a href="info.phtml">buraya</a> tıklayın.
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row justify-content-center">
            <?php
            if(isset($_POST['repo'])){
                $owner = $Info->getData('username');
                $repoName = $_POST['repoName'];
                $repoDesc = $_POST['repoDesc'];
                $visib = $_POST['visib'];
                $lisans = $_POST['lisans'];
                $readme = @$_POST['readme'];
                if (@$_POST['readme'] == null): $readme = false; endif;
                $getRepo->createRepo($repoName, $repoDesc, $visib, $owner, $lisans, $readme);
            }
            ?>
        </div>
    </div>
    <script src="../../js/mdb.min.js"></script>
</body>
</html>