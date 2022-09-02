<div class="row">
    <div class="col-md-6">
        <div id="sonuc"></div>
        <div class="card mb-2 rounded-widget">
            <div class="card-header text-center">
                <b>Kullanıcı Ayarları</b>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="input-group mb-3">
                        <input
                                type="text"
                                required
                                name="usernameU"
                                class="form-control"
                                placeholder="Kullanıcı Adı"
                                aria-describedby="username"
                        />
                        <button class="btn btn-outline-primary" type="submit" name="saveU" id="username" data-mdb-ripple-color="dark">
                            Kaydet
                        </button>
                    </div>
                </form>
                <form method="post">
                    <div class="input-group mb-3">
                        <input
                                type="text"
                                required
                                name="bioU"
                                class="form-control"
                                placeholder="Biografi"
                                aria-describedby="bio"
                        />
                        <button class="btn btn-outline-secondary" type="submit" name="saveB" id="bio" data-mdb-ripple-color="dark">
                            Kaydet
                        </button>
                    </div>
                </form>
                <form method="post">
                    <div class="input-group mb-3">
                        <input
                                type="url"
                                required
                                name="ppU"
                                class="form-control"
                                placeholder="Profil Fotoğrafı (url)"
                                aria-describedby="pp"
                        />
                        <button class="btn btn-outline-info" type="submit" name="saveP" id="pp" data-mdb-ripple-color="dark">
                            Kaydet
                        </button>
                    </div>
                </form>
                <form method="post">
                    <div class="input-group mb-3">
                        <input
                                type="url"
                                required
                                name="bannnerU"
                                class="form-control"
                                placeholder="Banner Fotoğrafı (url)"
                                aria-describedby="banner"
                        />
                        <button class="btn btn-outline-warning" type="submit" name="saveBa" id="banner" data-mdb-ripple-color="dark">
                            Kaydet
                        </button>
                    </div>
                </form>
                <form method="post" class="text-center">
                    <button type="submit" name="private" class="btn btn-danger">
                        Hesabınızı Özel Yapın
                    </button>
                </form>
                <?php
                    $save = new mysql_query_for_settings();
                    if(isset($_POST['saveU'])){
                        $save->insert($_POST['usernameU'], 'username');
                    }
                    if(isset($_POST['saveB'])){
                        $save->insert($_POST['bioU'], 'bio');
                    }
                    if(isset($_POST['saveP'])){
                        $save->insert($_POST['ppU'], 'picture');
                    }
                    if(isset($_POST['saveBa'])){
                        $save->insert($_POST['bannerU'], 'banner');
                    }
                    /*
                     * if(isset($_POST['private'])){
                        $save->setUsername($_POST['true']);
                        }
                     */
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-2 rounded-widget">
            <div class="card-header header-img" style="background-image: url('https://i.pinimg.com/originals/6f/2d/34/6f2d34fe6c8746c56c14fbc55308ef99.jpg');"></div>
            <div class="text-center position-absolute" style="margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                <img src="<?=$Info->getData('picture')?>" class="rounded" style="margin-top: 10px; width: 100px; height: 100px;">
            </div>
            <div class="card-body position-relative">
                <?php if (@$_COOKIE['admin'] || @isset($_COOKIE['admin'])){ ?>
                    <div data-mdb-toggle="tooltip" title="Mai Staff" class="float-end badge badge-danger">
                        <i class="bi bi-code-slash"></i>
                    </div>
                <?php } ?>
                <div class="fontlu text-center fs-4 mt-5">
                    <strong><?=$Info->getData('username')?></strong>
                </div>
                <div class="small text-muted mt-1 text-center">
                    <?=$Info->getData('bio')?>
                </div>
                <div class="row mt-3 justify-content-center">
                    <div class="col-auto mx-1 text-center">
                        <div class="fs-4">
                            21
                        </div>
                        <div class="badge badge-info">
                            Posts
                        </div>
                    </div>
                    <div class="col-auto mx-1 text-center">
                        <div class="fs-4">
                            322
                        </div>
                        <div class="badge badge-primary">
                            Following
                        </div>
                    </div>
                    <div class="col-auto mx-1 text-center">
                        <div class="fs-4">
                            279
                        </div>
                        <div class="badge badge-secondary">
                            Followers
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert text-center alert-warning">
            <b>Dikkat!</b> Burada yapmış olduğunuz değişiklikler Github içinde <b>değiştirilmez!</b>
        </div>
    </div>
</div>
