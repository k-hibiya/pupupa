<?php
    require_once('toLogin.php'); //←loginしていないユーザーをlogin画面(login.php)にリダイレクトする
    $_SESSION=array();
    @session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/union.css" >
<link rel="stylesheet" href="css/acountDel.css" >
<title>アカウント管理ページ</title>
</head>
<body>
<header>
    <h1><a href="index.php">
        <img id="pu" src="images/pupupa_logo.svg" alt="PUPUPA">
    </a></h1>
    <nav>
        <ul>
            <li id="index"><a href="index.php"><span class="img"><img src="images/home.svg" alt="ホーム"></span><span class="moji">ホーム</span></a></li>
            <li id="login"><a href="login.php" ><span class="img"><img id="nav" src="images/login.svg" alt="ログイン"></span><span class="moji">ログイン</span></a></li>
        </ul>
    </nav>
</header>
<main>
    <fieldset id="acountDel">
        <p>アカウントを削除しました。</p>
        <a class="anchor" href="index.php">ホームへ</a>
        <a class="anchor" href="login.php">ログイン</a>
    </fieldset>
</main>
</body>
</html>