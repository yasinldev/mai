<?php

/**
 * @author yasiiw <https://github.com/yasiiw/>
 * @for Artado Project <https://github.com/Artado-Project/>
 * @with love <3
 *
 * Database Connection with PDOStatements
 */
class Connection{

    /**
     * @var string
     */
    public $host = "localhost";
    /**
     * @var string
     */
    public $db = "mai";
    /**
     * @var string
     */
    public $hostUN = "root";
    /**
     * @var PDO
     */
    public $conn;


    /**
     * Connection
     */
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host; dbname=$this->db; charset=utf8", $this->hostUN, '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

/**
 * Getting Error Message's
 */
trait errMessage{
    /**
     * @param $errException
     * @return void
     */
    public function errExc($errException){

        switch (
        $errException
        ) {
            case 'not found':
                echo '<div class="alert alert-warning"><b>Böyle bir hesap bulamadık.</b> Eğer hata yaptığımızı düşünüyorsan lütfen bizimle iletişime geç.</div>';
                break;
            case 'pass not match':
                echo '<div class="alert alert-warning"><b>Şifreleriniz eşleşmiyor.</b> Lütfen şifrelerinizi kontrol ederek tekrar deneyiniz.</div>';
                break;
            case 'email founded':
                echo '<div class="alert alert-warning"><b>Böyle bir Email veya Kullanıcı adı zaten kayıtlı.</b> Eğer hesabınıza giriş ile ilgili sorunlar yaşıyorsanız lütfen iletişime geçin.</div>';
                break;
            //critical errors
            case 'critical-1':
                echo '<div class="alert alert-danger"><b>Sistem Hatası!</b> Sistemimiz şuanda isteğinize yanıt veremiyor lütfen daha sonra tekrar deneyiniz.</div>';
                break;
            case 'critical-2':
                echo '<div class="alert alert-danger"><b>Sistem Hatası!</b> Şu anda bu sorunu giderebilmek için çalışıyoruz lütfen daha sonra tekrar deneyin.</div>';
                break;
            //working errors
            case 'working-1':
                echo '<div class="alert alert-info"><b>Geliştiriliyor!</b> Bu özellik henüz geliştirilme aşamasındadır lütfen daha sonra tekrar deneyiniz.</div>';
                break;

            case 'critical - sys':
                echo '<div class="alert alert-danger"><b>Kritik Hata!</b> Lütfen uygulamayı kullanmayı bırakın ve yetkililere bildirin!</div>';
        }

    }

    /**
     * @param $accountException
     * @return void
     */
    public function accountErr($accountException){
        switch (
        $accountException
        ) {
            case 'not isset cookie':
                throw new Exception('<div class="alert alert-danger">Herhangi bir çerez bulunamadı!</div>');
            case 'user not found':
                echo '<div class="alert alert-danger"><b>Dikkat!</b> böyle bir hesap bulunamadı!!!</div>';
                break;
            case 'logined':
                echo '<div class="alert alert-info"><b>Giriş Başarılı!</b> Yönlendiriliyorsunuz...</div>';
                header('refresh:3;url=index.php');
                if (headers_sent()) {
                    echo 'Dikkat yönlendirmede bir hata meydana geldi lütfen manuel olarak yöneliniz. <a>http://localhost/mai/index.php</a>';
                }
                break;
            case 'registered':
                echo '<div class="alert alert-info"><b>Kayıt işlemi başarılı!</b> lütfen giriş yapınız!</div>';
                //header('refresh: 3');
                break;
        }
    }
}

/**
 * Encryption and Decryption
 */
trait encryptDecrypt{
    /**
     * @param $variable
     * @return string
     */
    public function encrypt($variable){
        $cipher = 'AES-128-ECB';
        $key = '9217092794af72e458d783e48eb16a7fa3441534';

        return openssl_encrypt($variable, $cipher, $key);
    }

    /**
     * @param $variable
     * @return string
     */
    public function decrypt($variable){
        $cipher = 'AES-128-ECB';
        $key = '9217092794af72e458d783e48eb16a7fa3441534';

        return openssl_decrypt($variable, $cipher, $key);
    }
}

/**
 * User Register and Login system never used btw
 */

//class registerSystem extends Connection
//{
//    use encryptDecrypt, errMessage;
//
//    /**
//     * @param $name
//     * @param $username
//     * @param $pass
//     * @param $passConfirm
//     * @param $email
//     * @param $ip
//     * @param $agent
//     * @param $date
//     * @return void
//     */
//    public function register($name, $username, $pass, $passConfirm, $email, $ip, $agent, $date){
//
//        $dataCheck = $this->conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
//        $dataCheck->execute([
//            $username, $email
//        ]);
//        if($pass != $passConfirm){
//            $this->errExc('pass not match');
//        }
//        else {
//            if ($dataCheck->rowCount() > 0) {
//                $this->errExc('email founded');
//            }
//            else {
//
//                $password = $this->encrypt($pass);
//                $sIp = $this->encrypt($ip);
//                $sAgent = $this->encrypt($agent);
//
//                $include = $this->conn->prepare("INSERT INTO users (uname, username, email, password, agent, ip, registerDate) VALUES (?,?,?,?,?,?,?)");
//                $include->execute([
//                    $name, $username, $email, $password, $sAgent, $sIp, $date
//                ]);
//
//                if (!$include){
//                    $this->errExc('critical-1');
//                }
//                else{
//                    $getID = $this->conn->prepare("SELECT * FROM users WHERE password = ?");
//                    $getID->execute([$password]);
//
//                    $getData = $getID->fetch(PDO::FETCH_OBJ);
//                    $encryptedID = $this->encrypt($getData->id);
//                    setcookie('user', $encryptedID, time() + 2592000);
//
//                    $this->accountErr('registered');
//
//                }
//            }
//        }
//
//    }
//
//    /**
//     * @param $loginUser
//     * @param $password
//     * @return void
//     */
//    public function login($loginUser, $password){
//        $passKey = $this->encrypt($password);
//
//        $dataCheckLogin = $this->conn->prepare("SELECT * FROM users WHERE username = ? AND password  = ?");
//        $dataCheckLogin->execute([
//            $loginUser, $passKey
//        ]);
//        if ($dataCheckLogin->rowCount() > 0){
//
//            $getID = $this->conn->prepare("SELECT * FROM users WHERE password = ?");
//            $getID->execute([$passKey]);
//
//            $getData = $getID->fetch(PDO::FETCH_OBJ);
//            $encryptedID = $this->encrypt($getData->id);
//            setcookie('user', $encryptedID, time() + 2592000);
//            $this->accountErr('logined');
//
//        }else {
//            $this->errExc('not found');
//        }
//
//    }
//
//}

/**
 * User Account System
 */
class accountSystem extends Connection
{
    use encryptDecrypt, errMessage;

    /**
     * @return int|void
     */
    public function cookieSecure(){
        if (!$_COOKIE['github-OAuth'] || !isset($_COOKIE['github-OAuth'])){
            exit('<h1 style="text-align:center">Cookie not Found! 403</h1>');
        }
    }

    /**
     * @var *6
     */

    public $name, $username, $picture, $followers, $following, $bio, $post;

    /**
     * @return void
     */
    public function getData($variable){

        //Getting data with user ID
        $getSql = $this->conn->prepare("SELECT * FROM users WHERE oauthID = ?");
        $getSql->execute([$_COOKIE['github-OAuth']]);

        $getData = $getSql->fetch(PDO::FETCH_OBJ);
        switch ($variable)  {
            case 'name':
                return $this->name = $getData->uname;

            case 'username':
                return $this->username = $getData->username;

            case 'picture':
                return $this->picture = $getData->picture;

            case 'followers':
                return $this->followers = $getData->followers;

            case 'following':
                return $this->following = $getData->following;

            case 'bio':
                return $this->bio = $getData->bio;

            case 'post':
                return $this->post = $getData->postcount;

            case 'repoUrl':
                return $this->repo = $getData->repo;

            default:
                $this->errExc('critical - sys');
        }

    }

}
class OAuthGitHub extends Connection
{
    use encryptDecrypt;

    /**
     * @param $id
     * @param $name
     * @param $email
     * @param $bio
     * @param $avatar
     * @param $username
     * @param $repo
     * @return void
     */
    public function Log_Reg($id, $name, $email, $bio, $avatar, $username, $repo){

        $checkData = $this->conn->prepare("SELECT * FROM users WHERE oauthID = ?");
        $checkData->execute([$this->encrypt($id)]);
        $getData = $checkData->fetch(PDO::FETCH_OBJ);

        if($checkData->rowCount() > 0){
            $encryptedID = $this->encrypt($id);
            setcookie('github-OAuth', $encryptedID, time() + 2592000);

            if($getData->perm == 'dev' || $getData->perm == 'admin'){
                setcookie('admin', $encryptedID, time() + 2592000);
            }

            header('Location: user/index.php');
        }
        else {
            $insertData = $this->conn->prepare("INSERT INTO users (oauthID, uname, email, username, picture, bio, ip, agent, registerDate, repo) VALUES (?,?,?,?,?,?,?,?,?,?)");
            if($email == null): $email = "null"; endif;
            $insertData->execute([
                $this->encrypt($id), $name, $email, $username, $avatar, $bio, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], date('m/d/Y h:i:s a', time(), $repo)
            ]);

            if($insertData){
                //if register success
                $encryptedID = $this->encrypt($id);
                setcookie('github-OAuth', $encryptedID, time() + 2592000);
                header('Location: user/index.php');
            }
        }
    }

    /**
     * @param $repoInfo
     * @param $username
     * @return void
     */
    public function getRepo($repoInfo, $username){

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $repoInfo,
            CURLOPT_USERAGENT => $username // username
        ]);


        $response = curl_exec($curl);
        $getData = json_decode($response);
        $count = 0;
        //A little html css :)
        foreach($getData as $teams) { $count++;
            ?>
            <div class="<?php if($count % 3 == 0){ echo 'col-md-12'; }else{ echo 'col-md-6'; }?> mb-2">
                <div class="card rounded-widget" style="border: 1px solid cornflowerblue">
                    <div class="card-body" style="max-height: 200px; min-height: 200px;">
                        <div class="badge badge-warning float-end">
                            <?php
                                if ($teams->fork == true){
                                    echo 'Fork';
                                }
                                else {
                                    echo '<i class="bi bi-code-slash"></i>';
                                }
                            ?>
                        </div>
                        <div class="badge badge-info float-start">
                            <i class="bi bi-book"></i>
                        </div>
                        <div class="fs-6 text-center">
                           <a target="_blank" href="<?= $teams->html_url; ?>"> <?= $teams->name ?></a>
                        </div>
                        <hr>
                        <p class="card-text text-center">
                            <?php if($count % 3 == 0){ echo substr($teams->description, 0, 200).'...'; }else {echo substr($teams->description, 0, 60).'...';} ?>
                            <div class="float-start">
                                <i class="bi bi-star"></i> <?= $teams->watchers ?>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        <?php
        }
    }
}

class mysql_query_for_settings extends Connection
{
    public function insert($data, $table)
    {
        $user = $_COOKIE['github-OAuth'];

        try
        {
            $insert = $this->conn->prepare("UPDATE users SET '$table' = ':name' WHERE oauthID = '$user'");
            $insert->bindParam(':name',$data,PDO::PARAM_STR);

        }catch (Exception $e)
        {
            echo $e->getMessage();
        }

    }
}


