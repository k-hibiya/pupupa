<?php
    $errorMessage="";
    require_once('connect.php');
    if(isset($_POST['login'])){
        if(empty($_POST['user_name'])){
            $errorMessage="ユーザ名が未入力です。";
        }else if(empty($_POST['password'])){
            $errorMessage="パスワードが未入力です。";
        }else{
            session_start();
            $user_name = hsc($_POST['user_name']);
            try{
                $pdo=connect();
                $sql="select user_name,password,valid_st from user where user_name=?";
                $stmt=$pdo->prepare($sql);
                $stmt->execute(array($user_name));
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                $entered_password = $_POST['password'];
                $stored_hashed_password = $row['password'];
                if ($row && password_verify($entered_password, $stored_hashed_password)){
                    if($row['valid_st'] == 1){
                        $errorMessage="ユーザー名あるいはパスワードが存在しません。";                
                    }else if($row['valid_st'] == 0){
                        session_regenerate_id(true);
                        $_SESSION['user_name'] = $row['user_name'];
                        header("Location: mypage.php");
                        exit();
                    }
                }else{
                    $errorMessage="ユーザー名あるいはパスワードが存在しません。";
                }
            }catch(PDOException $e){
                $errorMessage="データベースエラー";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>ログイン</title>
<link rel="stylesheet" href="css/union.css" >
<link rel="stylesheet" href="css/login.css" >
<!-- <script src="js/goBack.js"></script> -->
<script src="js/nav.js"></script>
</head>
<body>
<header>
    <h1><a href="index.php">
        <img id="pu" src="images/pupupa_logo.svg" alt="PUPUPA">
    </a></h1>
    <nav>
        <ul>
            <li id="index"><a href="index.php"><span class="img"><img src="images/home.svg" alt="ホーム"></span><span class="moji">ホーム</span></a></li>
            <li id="back"><p id="goBack"><span class="img"><img src="images/goback.svg" alt="戻る"></span><span class="moji">戻る</span></li>
            <li id="login"><a href="login.php" ><span class="img"><img id="nav" src="images/login.svg" alt="ログイン"></span><span class="moji">ログイン</span></a></li>
        </ul>
    </nav>
</header>
<main>
    <h2>ログイン画面</h2>
    <form id="login" action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="POST">
        <fieldset>
            <legend>ログインフォーム</legend>
            <div id="error">
                <?=$errorMessage?>
            </div>
            <div>
                <label for="user_name">ユーザー名</label><input type="text" name="user_name" required autofocus>
                <label for="password">パスワード</label><input type="password" name="password" required>
                <div id="login">
                    <button id="loginbtn" type="submit" name="login" value="ログイン">ログイン</button>
                </div>
            </div>
        </fieldset>
    </form>
        <fieldset>
            <legend>新規アカウント登録画面へ</legend>
            <button id="toSignup" type="button" value="新規登録"><a href="signUp.php">新規登録</a></button>
        </fieldset>
</main>
</body>
</html>