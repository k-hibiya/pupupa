<?php
session_start();
require_once('connect.php'); 
$pdo = connect();


$selected_name = $_GET['selected_name'];
$response = array('success' => false, 'message' => '');

try {
    $sql = "SELECT is_public, user_id as selected_id FROM user WHERE user_name = :user_name";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_name', $selected_name, PDO::PARAM_STR);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['is_public'] == 1) {
        $user_name = $_SESSION['user_name'];

        $sql = "SELECT user_id FROM user WHERE user_name = :user_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $stmt->execute();
        $row2 = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "INSERT INTO follow (followee_id, follower_id, follow_status) VALUES (:followee_id, :follower_id, 1)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':followee_id', $row['selected_id'], PDO::PARAM_INT);
        $stmt->bindParam(':follower_id', $row2['user_id'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'フォローしました。';
        } else {
            $response['message'] = 'フォローできませんでした。';
        }
    }
} catch (PDOException $e) {
    $response['message'] = 'Database error: ' . $e->getMessage();
}

echo json_encode($response);
?>