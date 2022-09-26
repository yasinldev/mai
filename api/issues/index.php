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
$data = $db->conn->prepare("SELECT * FROM problems WHERE prob_writer = ?");
$data->execute([
    $name
]);
while ($fetch = $data->fetch(PDO::FETCH_ASSOC))
{
    echo "<pre>";
    $array = [
        'id' => $fetch['id'],
        'name' => $fetch['prob_writer'],
        'problem_text' => '<small>'.$fetch['prob_text'].'</small>',
        'problem_header' => $fetch['prob_header'],
        'status' => $fetch['prob_sol'],
        'project' => $fetch['prob_for'],
        'date' => $fetch['prob_date'],
    ];
    print_r($array);
    echo "</pre>";
}
if ($data->rowCount() == 0)
{
    echo "Kullanıcı bulunamadı veya herhangi bir işlem henüz yok.";
}

