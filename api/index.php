<style>
    body{
        background-color: black;
        color: white;
        font-family: "Helvetica", sans-serif;
        font-size: x-large;
    }
</style>
<title>Mai Api</title>
<?php

    require_once("../php/components/class/system.php");
    $db = new Connection();

    $name = @$_GET['name'];
    $data = $db->conn->prepare("SELECT * FROM users WHERE username = ?");
    $data->execute([
            $name
    ]);
    while ($fetch = $data->fetch(PDO::FETCH_ASSOC))
    {
        echo "<pre>";
        $array = [
          'id' => $fetch['id'],
            'name' => $fetch['uname'],
            'username' => $fetch['username'],
            'email' => $fetch['email'],
            'picture' => $fetch['picture'],
            'banner' => $fetch['banner'],
            'bio' => $fetch['bio'],
            'posts' => $fetch['postcount'],
            'followers' => $fetch['followers'],
            'following' => $fetch['following'],
            'repos' => 'mai/api/repos/?name='.$fetch['username'],
            'issues' => 'mai/api/issues/?name='.$fetch['username'],
            'stars' => 'mai/api/stars/?name='.$fetch['username'],
        ];
        print_r($array);
        echo "</pre>";
    }
    if ($data->rowCount() == 0)
    {
        echo "Kullanıcı bulunamadı.";
    }

