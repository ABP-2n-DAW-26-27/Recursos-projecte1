<?php

$images = [];
$db = file_get_contents("db.json");
if($db != ""){
    $images = json_decode($db, true);
}

$allowedTypes = [
    'image/png' => 'png',
    'image/jpg' => 'jpg',
];

$mimeType = mime_content_type($_FILES["image"]['tmp_name']);

if(!isset($allowedTypes[$mimeType])){
    header("Location: index.php?error=2");
    die();
}

$alternatiu = htmlspecialchars($_POST["text_alternatiu"]);
$descripcio = htmlspecialchars($_POST["descripcio"]);


if(isset($_FILES["image"])){
    move_uploaded_file($_FILES["image"]["tmp_name"], "./uploads/" . $_FILES["image"]["name"]);
    $images[$_FILES["image"]["name"]] = [
        "alternatiu" => $alternatiu,
        "descripcio" => $descripcio
    ];
    $jsonImages = json_encode($images);
    file_put_contents('db.json', $jsonImages, LOCK_EX);
    header("Location: index.php?ok=1");
} else {
    header("Location: index.php?error=1");
}


