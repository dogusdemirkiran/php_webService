<?php

$response = array();

require_once __DIR__ . '/db_config.php';

$baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

if(!$baglanti){
    die("Hatalı Bağlantı: " . mysqli_connect_error());
}

$sqlsorgu = "SELECT * FROM users";
$result = mysqli_query($baglanti, $sqlsorgu);

if(mysqli_num_rows($result) > 0){

    $response["users"] = array();
    while($row = mysqli_fetch_assoc($result)){
        $users = array();

        $users["id"] = $row["id"];
        $users["kullanici_Adi"] = $row["kullanici_Adi"];
        $users["kullanici_Sifre"] = $row["kullanici_Sifre"];

        array_push($response["users"], $users);
    }
    $response["success"] = 1;
    echo json_encode($response);
}
else{

    $response["success"] = 0;
    $response["message"] = "No data found";
    echo json_encode($response);
}

mysqli_close($baglanti);

?>