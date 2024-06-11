<?php
session_start();
require_once('connect.php'); 
$pdo = connect();

$response = array('success' => false, 'message' => '');

$user_name = $_SESSION['user_name'];

if($_GET['to_follow_name']){
    $to_follow_name = $_GET['to_follow_name'];
    try {
        $sql = "SELECT is_public, user_id as to_follow_id FROM user WHERE user_name = :user_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_name', $to_follow_name, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['is_public'] == 1) {

            $sql = "SELECT user_id FROM user WHERE user_name = :user_name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $stmt->execute();
            $row2 = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql = "INSERT INTO follow (followee_id, follower_id, follow_status) VALUES (:followee_id, :follower_id, 1)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':followee_id', $row['to_follow_id'], PDO::PARAM_INT);
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
}

if($_GET['to_unfollow_name']){
    $to_unfollow_name = $_GET['to_unfollow_name'];
    try {
        $sql = "SELECT  user_id AS to_unfollow_id FROM user WHERE user_name = :user_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_name', $to_unfollow_name, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // if ($row['is_public'] == 1) {

        $sql = "SELECT user_id FROM user WHERE user_name = :user_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $stmt->execute();
        $row2 = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "DELETE FROM follow WHERE followee_id = :followee_id AND follower_id = :follower_id";//DELETEでいいのか？そのほうが楽だが
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':followee_id', $row['to_unfollow_id'], PDO::PARAM_INT);
        $stmt->bindParam(':follower_id', $row2['user_id'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'フォロー解除しました。';
        } else {
            $response['message'] = 'フォロー解除できませんでした。';
        }
        // }
    } catch (PDOException $e) {
        $response['message'] = 'Database error: ' . $e->getMessage();
    }
}

echo json_encode($response);
?>