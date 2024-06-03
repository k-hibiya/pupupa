<?php
    session_start();
    if(!isset($_SESSION['admin_name'])){
        header("Location:loginToAdomin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/union.css" >
<link rel="stylesheet" href="css/youjigoDel.css" >
<title>ようじ語削除画面</title>
</head>
<body>
<header>
    <h1><a href="index.php">
        <img id="pu" src="images/pupupa_logo.svg" alt="PUPUPA">
    </a></h1>
    <nav>
        <ul>
            <li id="index"><a href="index.php"><span class="img"><img src="images/home.svg" alt="ホーム"></span><span class="moji">ホーム</span></a></li>
            <li id="management"><a href="pupupa_admin_kanri.php" ><span class="img"><img id="management" src="images/management.svg" alt="管理ページ"></span><span class="moji">管理ページ</span></a></li>
            <li id="logoutAdmin"><a href="logout.php" ><span class="img"><img id="nav" src="images/logout.svg" alt="管理ページログアウト"></span><span class="moji">管理ページ<br>ログアウト</span></a></li>
        </ul>
    </nav>
</header>
<main>
    <?php
        require_once('connect.php');
        $main_id = hsc($_GET['main_id']);
        $YorO=hsc($_GET['YorO']);
        $initial=hsc($_GET['initial']);
        $kodomo_id=hsc($_GET['kodomo_id']);
        $sort=hsc($_GET['sort']);
        $youjigo=hsc($_GET['youjigo']);
    ?>
    <fieldset id="acountDel">
        <p>"<?=$youjigo?>"を削除しました。</p>
        <a class="anchor" href="pupupa_admin_kanri.php?YorO=<?=$YorO?>&initial=<?=$initial?>&kodomo_id=<?=$kodomo_id?>&sort=<?=$sort?>">管理画面へ</a>
    </fieldset>
</main>
</body>
</html>