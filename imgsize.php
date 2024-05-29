<?php
function getImagesData($directory) {
    $imagesData = [];
    $images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

    foreach ($images as $image) {
        list($width, $height) = getimagesize($image);
        $imagesData[] = [
            'src' => basename($image), // ファイル名のみ取得
            'width' => $width,
            'height' => $height
        ];
    }

    return $imagesData;
}

require_once('connect.php');
session_start();

// 呼び出し元を判定
$source = $_GET['source'] ?? '';
$allImagesData = [];

if ($source == 'index') {
    $pdo = connect();
    $sql = 'SELECT user_name FROM user';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['user_name'];
        $directory = "upImages/$name/";
        $allImagesData[$name] = getImagesData($directory);    
    }
} elseif ($source == 'mypage') {
    $name = $_SESSION['user_name'];
    $directory = "upImages/$name/";
    $allImagesData[$name] = getImagesData($directory);
}

header('Content-Type: application/json');
echo json_encode($allImagesData);
?>