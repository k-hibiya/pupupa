<?php
    require_once('toLogin.php');
    require_once('connect.php');
    $user_name = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/union.css" >
<link rel="stylesheet" href="css/youjigoDel.css" >
<title>アカウント管理</title>
</head>
<body>
<header>
    <h1><a href="index.php">
        <img id="pu" src="images/pupupa_logo.svg" alt="PUPUPA">
    </a></h1>
    <nav>
        <ul>
            <li id="index"><a href="index.php"><span class="img"><img src="images/home.svg" alt="ホーム"></span><span class="moji">ホーム</span></a></li>
            <li id="mypage"><a href="index.php?mypage=1&selected_name=<?=$user_name?>" ><span class="img"><img id="nav" src="images/mypage.svg" alt="マイページ"></span><span class="moji">マイページ</span></a></li>
        </ul>
    </nav>
</header>
<main>
    <?php
        $main_id = hsc($_GET['main_id']);
        $YorO=hsc($_GET['YorO']);
        $initial=hsc($_GET['initial']);
        $kodomo_id=hsc($_GET['kodomo_id']);
        $sort=hsc($_GET['sort']);
        $youjigo=hsc($_GET['youjigo']);
    ?>
    <fieldset id="acountDel">
        <p>"<?=$youjigo?>"を削除しました。</p>
        <a class="anchor" href="index.php?mypage=1&selected_name=<?=$user_name?>&YorO=<?=$YorO?>&initial=<?=$initial?>&kodomo_id=<?=$kodomo_id?>&sort=<?=$sort?>">マイページ</a>
    </fieldset>
</main>
</body>
</html>