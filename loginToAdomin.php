<?php
    $errorMessage="";
    require_once('connect.php');
    if(isset($_POST['login'])){
        if(empty($_POST['admin_name'])){
            $errorMessage="管理者名が未入力です。";
        }else if(empty($_POST['password'])){
            $errorMessage="パスワードが未入力です。";
        }else{
            session_start();
            $admin_name = hsc($_POST['admin_name']);
            try{
                $pdo=connect();
                $sql="select admin_name,admin_password_hash from admin_kanri where admin_name = :admin_name";
                $stmt=$pdo->prepare($sql);
                $stmt->bindParam(':admin_name', $admin_name, PDO::PARAM_STR);
                $stmt->execute();
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                $entered_password = $_POST['password'];
                $stored_hashed_password = $row['admin_password_hash'];
                if ($row && password_verify($entered_password, $stored_hashed_password)){
                    session_regenerate_id(true);
                    $_SESSION['admin_name'] = $row['admin_name'];
                    header("Location: pupupa_admin_kanri.php");
                    exit();
                }else{
                    $errorMessage="管理者名あるいはパスワードが存在しません。";
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
<title>管理者ページログイン画面</title>
<link rel="stylesheet" href="css/union.css" >
<link rel="stylesheet" href="css/login.css" >
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
            <li id="serch"><p id="serchButton"><span class="img"><img src="images/serch.svg" alt="検索する"></span><span class="moji">検索する</span></li>
            <li id="youjigoUp"><a href="youjigoUp.php"><span class="img"><img src="images/post.svg" alt="投稿する"></span><span class="moji">投稿する</span></a></li>
<?php
    session_start();
    if(!isset($_SESSION['user_name'])) {
?>
            <li id="login"><a href="login.php" ><span class="img"><img id="nav" src="images/login.svg" alt="ログイン"></span><span class="moji">ログイン</span></a></li>
<?php
    }else if(isset($_SESSION['user_name'])) {
?>
            <li id="mypage"><a href="mypage.php" ><span class="img"><img id="nav" src="images/mypage.svg" alt="マイページ"></span><span class="moji">マイページ</span></a></li>
<?php    
    }
?>
        </ul>
    </nav>
</header>
<main>
    <h2>管理者ページログイン画面</h2>
    <form id="login" action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="POST">
        <fieldset>
            <!-- <legend>ログインフォーム</legend> -->
            <div id="error">
                <?=$errorMessage?>
            </div>
            <div>
                <label for="admin_name">管理者名</label><input type="text" name="admin_name" required autofocus>
                <label for="password">パスワード</label><input type="password" name="password" required>
                <div id="login">
                    <button id="loginbtn" type="submit" name="login" value="ログイン">ログイン</button>
                </div>
            </div>
        </fieldset>
    </form>
</main>
</body>
</html>