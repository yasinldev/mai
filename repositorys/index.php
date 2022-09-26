<?php
require_once '../app/php/components/class/system.php';
$Info = new accountSystem();
$getRepo = new mai_repositorys();
$Info->cookieSecure();

$url = $_GET['name'];
$DB = new Connection();

$projectName = $DB->conn->prepare("SELECT * FROM repos WHERE n_name = ?");
$projectName->execute(array($url));
$getData = $projectName->fetch(PDO::FETCH_OBJ);

if ($projectName->rowCount() == 0) {
    header("Location: ../not-found/");
}

$user = $DB->conn->prepare("SELECT * FROM users WHERE username = ?");
$user->execute(array($getData->owner));
$data2 = $user->fetch(PDO::FETCH_OBJ);

$starred = $DB->conn->prepare("SELECT * FROM starred WHERE project = ?");
$starred->execute(array($url));

$starred_user = $DB->conn->prepare("SELECT * FROM starred WHERE project = ? AND who = ?");
$starred_user->execute(array($url, $Info->getData('username')));

require_once '../vendor/erusev/parsedown/Parsedown.php';

$Parsedown = new Parsedown();

?>
<!doctype html>
<html lang="tr">
<head>
    <link rel="stylesheet" href="app.css" type="text/css" />
    <script src="../js/prism.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $getData->n_name ?></title>
    <link rel="stylesheet" href="../css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css">
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
    <link rel="stylesheet" href="../js/richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="../js/richtexteditor/rte.js"></script>
    <script type="text/javascript" src='../js/richtexteditor/plugins/all_plugins.js'></script>
</head>
<body style="background-color: #f4f4f4;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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

        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-4 mx-5">
                    <li class="breadcrumb-item"><a class="text-primary" href="../user/?visitor=<?= $getData->owner ?>"><?= $getData->owner ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $url ?></li>
                </ol>
            </nav>
            <img
                    src="<?= $data2->picture ?>"
                    class="rounded-circle"
                    height="40"
                    loading="lazy"
            />
        </div>
    </div>
</nav>
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <div
                        class="nav flex-column nav-pills text-center"
                        id="v-pills-tab"
                        role="tablist"
                        aria-orientation="vertical"
                    >
                        <a
                            class="nav-link active"
                            id="v-pills-home-tab"
                            data-mdb-toggle="pill"
                            href="#v-pills-home"
                            role="tab"
                            aria-controls="v-pills-home"
                            aria-selected="true"
                        ><i class="bi bi-code-slash"></i>&nbsp; Kod</a
                        >
                        <a
                            class="nav-link"
                            id="v-pills-profile-tab"
                            data-mdb-toggle="pill"
                            href="#v-pills-profile"
                            role="tab"
                            aria-controls="v-pills-profile"
                            aria-selected="false"
                        ><i class="bi bi-layout-text-window"></i>&nbsp; Wiki</a
                        >
                        <a
                            class="nav-link"
                            id="v-pills-messages-tab"
                            data-mdb-toggle="pill"
                            href="#v-pills-messages"
                            role="tab"
                            aria-controls="v-pills-messages"
                            aria-selected="false"
                        ><i class="bi bi-wrench-adjustable-circle"></i>&nbsp; Problemler</a
                        >
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <b>Proje Hakkında</b><br><br>
                    <?= $getData->n_desc ?> <br><br>
                    <div class="badge badge-info"><i class="bi bi-book"></i></div> <b>Lisans: </b> <?= $getData->license ?><br>
                    <div class="badge badge-info"><i class="bi bi-star"></i></div> <b>Takip:</b> <?= $starred->rowCount(); ?><br>
                    <div class="badge badge-info"><i class="bi bi-wrench-adjustable-circle"></i></div> <b>Problemler:</b> <?= $getData->watching ?><br>
                    <div class="badge badge-info"><i class="bi bi-diagram-3"></i></div> <b>Klon:</b> <?= $getData->fork ?><br>

                </div>
            </div>
            <ul class="list-group list-group-light mb-3">
                <li class="list-group-item-warning list-group-item px-3">
                    Kullanıcı Lisansı proje sahibi tarafından belirlenmiştir. Proje içerisinde gelen lisanslar <b>geçerli değildir</b>.
                </li>
                <li class="list-group-item-info list-group-item px-3">
                    Projede oluşturulan linkler'den Mai sorumlu değildir kullanıcı bu bağlantıları kullanırken dikkatli olmalıdır.
                </li>
            </ul>
        </div>
        <div class="col-md-7">
            <div class="tab-content" id="v-pills-tabContent">
                <div
                    class="tab-pane fade show active"
                    id="v-pills-home"
                    role="tabpanel"
                    aria-labelledby="v-pills-home-tab"
                >
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="<?= $data2->picture ?>" class="img-fluid img-profile rounded-circle">
                                </div>
                                <div class="col-auto">
                                    <div class="mt-2"></div>
                                    Son güncelleme tam olarak <div class="text-muted">9:54 PM 9/9/2022</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a
                                        class="nav-link active"
                                        id="ex3-tab-1"
                                        data-mdb-toggle="pill"
                                        href="#ex3-pills-1"
                                        role="tab"
                                        aria-controls="ex3-pills-1"
                                        aria-selected="true"
                                    ><i class="bi bi-folder"></i> &nbsp; Proje</a
                                    >
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a
                                        class="nav-link"
                                        id="ex3-tab-2"
                                        data-mdb-toggle="pill"
                                        href="#ex3-pills-2"
                                        role="tab"
                                        aria-controls="ex3-pills-2"
                                        aria-selected="false"
                                    ><i class="bi bi-file-code"></i> &nbsp; Readme</a
                                    >
                                </li>
                            </ul>
                            <div class="tab-content overflow-auto scrollbar"  style="max-height: 600px" id="ex2-content">
                                <div
                                    class="tab-pane fade show active"
                                    id="ex3-pills-1"
                                    role="tabpanel"
                                    aria-labelledby="ex3-tab-1"
                                >

                                    <?php
                                    $editor = @$_GET['editor'];
                                    $folder = @$_GET['folder'];
                                    $getlang = @explode('.', $editor)[1];
                                    if (empty($folder)) {
                                        $folder = null;
                                        $dosyalar = glob($url . "/*");
                                    }
                                    else{
                                        $dosyalar = glob($folder . "/*");
                                    }
                                    $arrayLang = array(); $license_ret = "";
                                    foreach ($dosyalar as $dosya => $file) {
                                        if($dosyalar != glob($url . "/*")){
                                            $pointer = substr_count($file, '.');
                                            if($pointer == 0): break;
                                            else:
                                                $arrayLang[] = @explode('.', $file)[$pointer];
                                            endif;
                                        }
                                    }
                                    $lic_pointer = substr_count($folder, '/');
                                    if($lic_pointer != 0):
                                        if(@explode('/', $folder)[$lic_pointer] == "LICENSE"):
                                            $license_ret = "returned";
                                        endif;
                                    endif;
                                    if (!empty($editor)) {
                                        echo '<pre><code class="language-'.$getlang.' line-numbers">';
                                        $file = htmlspecialchars(file_get_contents($editor));
                                        echo $file;
                                        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-'.@$arrayLang[$pointer].'.min.js"></script>';
                                        echo '</code></pre>';
                                    }
                                    elseif($license_ret == "returned"){
                                        echo '<div class="badge badge-warning">Lisans</div>';
                                        echo '<b>'.$Parsedown->text(file_get_contents($folder)).'</b>';
                                    }
                                    else{
                                        if (count($dosyalar) > 0 ){
                                            echo '<ul class="list-group list-group-light list-group-small">';
                                            foreach ($dosyalar as $anahtar => $deger) {
                                                if (@explode('.', $deger)[1] == "" && @explode('/', $deger)[substr_count($deger, '/')] != "LICENSE") {
                                                    echo '<div class="list-group-item"><i class="bi bi-folder text-info"></i> &nbsp; <a href="?name='. $url .'&folder=' . $deger. '"> ' . $deger. '</a></div>';
                                                }
                                            }
                                            foreach ($dosyalar as $item => $value) {
                                                if (@explode('.', $value)[1] != "" ) {
                                                    echo '<div class="list-group-item"><i class="bi bi-file-earmark-text text-info"></i> &nbsp; <a href="?name='. $url .'&editor=' . $value. '"> ' . $value. '</a></div>';
                                                }
                                                if (@explode('/', $value)[substr_count($value, '/')] == "LICENSE") {
                                                    echo '<div class="list-group-item"><i class="bi bi-file-earmark-break"></i> &nbsp; <a href="?name='. $url .'&editor=' . $value. '"> ' . $value. '</a></div>';

                                                }
                                            }
                                            echo '</ul>';
                                        }
                                        else{ ?>
                                            <div class="alert alert-warning mb-3 text-center">
                                                <b>Hey... kimse yok mu?</b>
                                                <hr>
                                                <p>Burada böyle bir klasör bulunamadı veya klasör boş.</p>
                                            </div>
                                        <?php
                                    }

                                    }
                                        ?>
                                </div>
                                <div
                                    class="tab-pane fade"
                                    id="ex3-pills-2"
                                    role="tabpanel"
                                    aria-labelledby="ex3-tab-2"
                                >
                                    <?php
                                    if (file_exists($url . "/README.md")) {
                                            $readme = file_get_contents($url . "/README.md");
                                            echo $Parsedown->text($readme);
                                    }
                                    else{
                                        echo '<div class="alert alert-warning mb-3 text-center">
                                            <b>README.md bulunamadı</b>
                                            <hr>
                                            <p>Projenizde bir README.md dosyası bulunmuyor. Lütfen bir README.md dosyası ekleyin.</p>
                                        </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="tab-pane fade"
                    id="v-pills-profile"
                    role="tabpanel"
                    aria-labelledby="v-pills-profile-tab"
                >
                    <div class="card mb-2">
                        <?php
                            $data = $DB->conn->prepare("SELECT * FROM wiki WHERE w_for = ?");
                            $data->execute(array($url));
                            $array = $data->fetch(PDO::FETCH_OBJ);

                            if ($data->rowCount() > 0):
                                echo '<div class="card-body">'.$array->wiki.'</div></div>';

                            else: ?>
                        <form method="post">
                            <div class="card-body">
                                <div class="alert alert-warning mb-5 text-center">
                                    <b>Dikkat!</b> <?= $url ?> Projesinin herhangi bir Wikisi bulunamadı veya oluşturulmadı.
                                    <hr>
                                    <p>Projenizde bir Wiki oluşturun!</p>
                                </div>
                                <textarea required name="wiki" id="div_editor1">
                                    <p>Merhaba, ben bir wiki sayfasıyım.</p>
                                    <p>Wiki sayfaları, projeniz hakkında daha fazla bilgi içeren sayfalardır.</p>
                                    <p>Wiki sayfalarınızı burada oluşturabilirsiniz.</p>
                                </textarea>
                                <script>
                                    var editor1 = new RichTextEditor("#div_editor1");
                                </script>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-info" name="create">Wiki sayfasını oluştur</button>
                            </div>
                        </form>
                        <?php if(isset($_POST['create'])){ $getRepo->createWiki($url, $_POST['wiki']); } ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div
                    class="tab-pane fade"
                    id="v-pills-messages"
                    role="tabpanel"
                    aria-labelledby="v-pills-messages-tab"
                >
                    <?php
                    $data = $DB->conn->prepare("SELECT * FROM problems WHERE prob_for = '$url'");
                    $data->execute();
                    if ($data->rowCount() > 0){
                    while ($array = $data->fetch(PDO::FETCH_ASSOC)): ?>
                        <div class="card mb-2">
                            <div class="card-header">
                                <div class="float-end">
                                    <?php if($array['prob_sol'] == null && $Info->getData('username') == $getData->owner){ ?>
                                    <form method="post">
                                        <button name="close" class="btn btn-outline-danger btn-sm">Kapat</button>
                                    </form>
                                    <?php
                                    if (isset($_POST['close'])) {
                                        $getRepo->closeProblem($array['id']);
                                    } }
                                    elseif($array['prob_sol'] == 'closed'){
                                        echo '<span class="badge badge-success">Çözüldü</span>';
                                    }
                                    else{
                                        echo '<span class="badge badge-warning">Bekliyor</span>';
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="<?= $array['picture'] ?>" class="img-fluid img-profile rounded-circle">
                                        </div>
                                        <div class="col-auto">
                                            <div class="mt-2"></div>
                                            Problem Yazarı <b><?= $array['prob_writer'] ?></b> <div class="text-muted"><?= $array['prob_date'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="accordion accordion-borderless" id="issue-<?= $array['id'] ?>">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="issue-<?= $array['id'] ?>-header">
                                            <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                                                    data-mdb-target="#issue-<?= $array['id'] ?>-body" aria-expanded="false" aria-controls="issue-<?= $array['id'] ?>">
                                                <?= $array['prob_header'] ?>
                                            </button>
                                        </h2>
                                        <div id="issue-<?= $array['id'] ?>-body" class="accordion-collapse collapse"
                                             aria-labelledby="issue-1-header" data-mdb-parent="#issue-<?= $array['id'] ?>">
                                            <div class="accordion-body">
                                                <?= $array['prob_text'] ?>
                                            </div>
                                            <?php
                                            $id = $array['id'];
                                            $getRepo->whileAns($id, $url);
                                            if($getData->owner == $Info->getData('username'))
                                            { ?>
                                                <form method="post" class="text-center">
                                                    <div class="form-outline mb-3">
                                                        <textarea name="yanit" class="form-control" id="textAreaExample" rows="4"></textarea>
                                                        <label class="form-label" for="textAreaExample">Yanıt ver</label>
                                                    </div>
                                                    <button class="btn btn-info" name="gonder">Gönder</button>
                                                </form>
                                                <?php if (isset($_POST['gonder'])): $getRepo->createAnswer($_POST['yanit'], $url, $Info->getData('username'), $id, $Info->getData('picture')); endif; ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; } ?>
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning text-center">
                                        <b>Dikkat!</b> Herhangi bir problem oluşturmak için aşağıdaki butona tıklayın.
                                        <hr>
                                        <p>Projenizde bir Problem Sayfası oluşturun!</p>
                                    </div>
                                </div>
                            </div>
                            <form method="post" class="text-center">
                                <input name="prob_header" class="form-control mb-2" required placeholder="Problem Başlığınızı Girin">
                                <textarea required name="prob" id="div_editor2">

                                </textarea>
                                <script>
                                    var editor1 = new RichTextEditor("#div_editor2");
                                </script>
                                <button class="btn mt-2 btn-info text-center" name="problem" type="submit">Problem oluştur</button>
                            </form>
                            <?php
                            if(isset($_POST['problem'])){
                                $getRepo->createSolution($_POST['prob'], $Info->getData('username'), $url, $_POST['prob_header'], $Info->getData('picture'));
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <form method="post" enctype="multipart/form-data">
                        <div class="alert alert-info text-center">
                            <b class="mb-3">Proje dosyalarını seçin ve aktarın.</b>
                            <p class="text-muted">Lütfen projenizi sıkıştırın ve .zip uzantılı bir dosyaya dönüştürün</p>
                            <input class="form-control mb-2" required name="proj" type="file" />
                            <input type="submit" class="btn btn-light mt-2" value="Projeyi içeri aktar" name="upload">
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <?php
                                if ($starred_user->rowCount() > 0)
                                {
                                    echo '<button class="btn btn-outline-warning mb-2 col-md-12" name="unstar">Yıldızı kaldır</button>';
                                }
                                else
                                {
                                    echo '<button class="btn btn-outline-warning mb-2 col-md-12" name="star">Yıldızla</button>';
                                }
                            ?>
                            <button class="btn btn-outline-secondary mb-2 col-md-12" name="fork">Klonla</button>
                            <button class="btn btn-outline-success mb-2 col-md-12" name="eye">Takip Et</button>
                        </div>
                        <?php
                            if (isset($_POST['star'])) {
                                $getRepo->starred($url, $Info->getData('username'));
                            }
                        ?>
                    </form>
                </div>
            </div>
            <div class="alert alert-info text-center">
                <b>Bunlar da ne?</b>
                <hr>
                <p>Eğer bunların ne olduğu hakkında fikriniz yoksa <a href="../../docs/">dökümantasyona</a> göz atın.</p>
            </div>
        </div>
    </div>
</div>
<script src="../js/mdb.min.js"></script>
</body>
</html>