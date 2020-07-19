<?php

$response = array();

if(isset($_POST['kullanici_Adi']) && isset($_POST['kullanici_Sifre'])) {

    $kullanici_Adi = $_POST['kullanici_Adi'];
    $kullanici_Sifre = $_POST['kullanici_Sifre'];

    require_once __DIR__ . '/dc_config.php';

    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

    if(!$baglanti){
        die("Hatalı Bağlantı: " . mysqli_connect_error());
    }

    $sqlsorgu = "INSERT INTO kisiler (kullanici_Adi,kullanici_Sifre) VALUES ('$kullanici_Adi','$kullanici_Sifre')";

    if(mysqli_query($baglanti, $sqlsorgu)){

        $response["success"] = 1;
        $response["message"] = "successfully";
        echo json_encode($response);
    }
    else{
        $response["success"] = 0;
        $response["message"] = "No product found";
        echo json_encode($response);
    }
    mysqli_close($baglanti);
}
else{
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
}

?>