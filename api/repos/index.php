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

require_once("../../php/components/class/system.php");
$db = new Connection();

$name = @$_GET['name'];
$data = $db->conn->prepare("SELECT * FROM repos WHERE owner = ?");
$data->execute([
    $name
]);
while ($fetch = $data->fetch(PDO::FETCH_ASSOC))
{
    echo "<pre>";
    if($fetch['visibil'] == 'private'){
        break;
    }
    $array = [
        'id' => $fetch['id'],
        'name' => $fetch['n_name'],
        'description' => $fetch['n_desc'],
        'license' => $fetch['license'],
        'stars' => $fetch['stars'],
        'visibility' => $fetch['visibil'],

    ];
    print_r($array);
    echo "</pre>";
}
if ($data->rowCount() == 0)
{
    echo "Kullanıcı bulunamadı veya herhangi bir işlem henüz yok.";
}

