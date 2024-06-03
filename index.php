<!DOCTYPE html>
<html lang="ja">
<head>
<meta charaset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- <meta name="description" content="PUPUPAは「こどもが何て言っているのかわからない！」そんな幼児語の“困った”を解決する投稿型の幼児語辞典アプリです。" /> -->
<title>PUPUPA</title>
<script src="js/form.js"></script>
<script src="js/nav.js"></script>
<script src="js/tdClose.js"></script>
<link rel="stylesheet" href="css/union.css" >
<link rel="stylesheet" href="css/formtable.css" >
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
<!------------------------------------------- ↓ 検索form ------------------------------------------->
    <form id="formBox" action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="get">
        <fieldset>
            <legend>検索方法を選んでください</legend>
                <label><input name="YorO" type="radio" value="youjigo" checked="checked">ようじ語</label>
                <label><input name="YorO" type="radio" value="kana">逆引き</label>
        </fieldset>
        <fieldset>
            <legend>どれかひとつ選んでください</legend>
            <div>
                <label><input name="initial" type="radio" value="すべて" checked="checked">すべて</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="あ">あ</label>
                <label><input name="initial" type="radio" value="い">い</label>
                <label><input name="initial" type="radio" value="う">う</label>
                <label><input name="initial" type="radio" value="え">え</label>
                <label><input name="initial" type="radio" value="お">お</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="か">か</label>
                <label><input name="initial" type="radio" value="き">き</label>
                <label><input name="initial" type="radio" value="く">く</label>
                <label><input name="initial" type="radio" value="け">け</label>
                <label><input name="initial" type="radio" value="こ">こ</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="さ">さ</label>
                <label><input name="initial" type="radio" value="し">し</label>
                <label><input name="initial" type="radio" value="す">す</label>
                <label><input name="initial" type="radio" value="せ">せ</label>
                <label><input name="initial" type="radio" value="そ">そ</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="た">た</label>
                <label><input name="initial" type="radio" value="ち">ち</label>
                <label><input name="initial" type="radio" value="つ">つ</label>
                <label><input name="initial" type="radio" value="て">て</label>
                <label><input name="initial" type="radio" value="と">と</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="な">な</label>
                <label><input name="initial" type="radio" value="に">に</label>
                <label><input name="initial" type="radio" value="ぬ">ぬ</label>
                <label><input name="initial" type="radio" value="ね">ね</label>
                <label><input name="initial" type="radio" value="の">の</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="は">は</label>
                <label><input name="initial" type="radio" value="ひ">ひ</label>
                <label><input name="initial" type="radio" value="ふ">ふ</label>
                <label><input name="initial" type="radio" value="へ">へ</label>
                <label><input name="initial" type="radio" value="ほ">ほ</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="ま">ま</label>
                <label><input name="initial" type="radio" value="み">み</label>
                <label><input name="initial" type="radio" value="む">む</label>
                <label><input name="initial" type="radio" value="め">め</label>
                <label><input name="initial" type="radio" value="も">も</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="や">や</label>
                <label><input name="initial" type="radio" value="ゆ">ゆ</label>
                <label><input name="initial" type="radio" value="よ">よ</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="ら">ら</label>
                <label><input name="initial" type="radio" value="り">り</label>
                <label><input name="initial" type="radio" value="る">る</label>
                <label><input name="initial" type="radio" value="れ">れ</label>
                <label><input name="initial" type="radio" value="ろ">ろ</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="わ">わ</label>
                <label><input name="initial" type="radio" value="を">を</label>
                <label><input name="initial" type="radio" value="ん">ん</label>
            </div>
        </fieldset>
        <fieldset>
            <legend>どちらか選んでください</legend>
            <div>
                <label><input name="sort" type="radio" value="asc" checked="checked">あいうえお順</label>
                <label><input name="sort" type="radio" value="posted_at">新着順</label>
            </div>       
        </fieldset>
        <button type="submit" value="検索">検索</button>
    </form>
<!------------------------------------------- ↑ 検索form ------------------------------------------->

<?php
/*------------------------------------------- ↓ 検索結果表示用スクリプト -------------------------------------------*/
    require_once('connect.php'); //←loginしていないユーザーをlogin画面(login.php)にリダイレクトする
        /* ↓ toLogin.phpの中身

            session_start();

            if(!isset($_SESSION['user_name'])){
                header("Location:login.php");
            }

        */
    if(!isset($_GET['YorO'])) { //formが送られていない初期表示のSQL作成用の変数定義
        $YorO = "youjigo";
        $initial = "すべて";
        $sort = "posted_at";
    }else if(isset($_GET['YorO'])) { //formが送られてきた場合のSQL作成用の変数定義
        $YorO = hsc($_GET['YorO']);
        $initial = hsc($_GET['initial']);
        $sort = hsc($_GET['sort']);
    }
/*------- ↓ 検索キーワードをまとめた見出しを作成する -------*/
require_once ('midasi.php'); //←名前以外の検索キーワードを見出しとしてまとめて返す midasi() が入っている
    $midasi = midasi($YorO, $initial, $sort); //例、"ようじ語・すべて・あいうえお順"
    $searchMessage = $midasi;
/*--- ↑ 検索キーワードをまとめた見出しを作成する --*/

?>
    <p id="mado"><?=$searchMessage?></p> <!-- ← 検索キーワードをまとめた見出しがここに入る。-->
<!---------------------- ↓ ここからテーブル ---------------------->
        <table>
            <colgroup span="2"></colgroup>
<?php
    if($YorO == "youjigo") { //YorOがyoujigoだったら、thの左にようじ語がくる。
?>       
                <tr >
                    <th class="fixed"><span id="y">ようじ語</span></th><th class="fixed"><span id="k">おとな語</span></th>
                </tr> 
<?php
    }else if($YorO == "kana") { //YorOがkanaだったら、thの左におとな語がくる。
?>        
                <tr >
                    <th class="fixed"><span id="k">おとな語</span></th><th class="fixed"><span id="y">ようじ語</span></th>
                </tr> 
<?php
    }

    try {
/*------- ↓ SQL文を作成する -------*/
        require_once('mojiset.php');
        $pdo = connect();
        if(isset($YorO)){
            $sql = "select main_id, user_name, kodomo_name, youjigo, otonago, kana, photo, 
                    caption, age, posted_at, is_public, is_deleted from main 
                    join user on main.user_id = user.user_id 
                    join kodomo on main.kodomo_id = kodomo.kodomo_id 
                    join age on main.age_id = age.age_id ";
            if(isset($initial)){
                $mojiset = mojiset($initial);
            }
            if($initial == "あ" || $initial == "い" || $initial == "う" || $initial == "え" || $initial == "お" || 
                    $initial == "な" || $initial == "に" || $initial == "ぬ" || $initial == "ね" || $initial == "の" || 
                    $initial == "ま" || $initial == "み" || $initial == "む" || $initial == "め" || $initial == "も" || 
                    $initial == "や" || $initial == "ゆ" || $initial == "よ" || 
                    $initial == "ら" || $initial == "り" || $initial == "る" || $initial == "れ" || $initial == "ろ" || 
                    $initial == "わ" || $initial == "を" || $initial == "ん") {
                $sql = $sql."where is_public = 1 and is_deleted = 0 and $YorO like '$mojiset%' ";
            }else if($initial == "か" || $initial == "き" || $initial == "く" || $initial == "け" || $initial == "こ" || 
                    $initial == "さ" || $initial == "し" || $initial == "す" || $initial == "せ" || $initial == "そ" || 
                    $initial == "た" || $initial == "ち" || $initial == "つ" || $initial == "て" || $initial == "と") {
                $sql = $sql."where is_public = 1 and is_deleted = 0 and $YorO like '$mojiset[0]%' 
                        or is_public = 1 and is_deleted = 0 and $YorO like '$mojiset[1]%' ";
            }else if($initial == "は" || $initial == "ひ" || $initial == "ふ" || $initial == "へ" || $initial == "ほ") {
                $sql = $sql."where is_public = 1 and is_deleted = 0 and $YorO like '$mojiset[0]%' 
                        or is_public = 1 and is_deleted = 0 and $YorO like '$mojiset[1]%' 
                        or is_public = 1 and is_deleted = 0 and $YorO like '$mojiset[2]%' ";
            }else if($initial == "すべて"){
                $sql = $sql."where is_public = 1 and is_deleted = 0 ";
            }
            if($sort == "posted_at") {
                $sql = $sql."order by posted_at desc";
            }else if($YorO == "youjigo") {
                $sql = $sql."order by youjigo asc";
            }else if($YorO == "kana") {
                $sql = $sql."order by kana asc";
            }
        }
/*------- ↑ SQL文を作成する -------*/
    
/*------- ↓ ようじ語及びおとな語が未登録時の表示 -------*/
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row) { //SQL文で問い合わせた結果が０だったら、各種”投稿されていません”を表示
            if($YorO == "youjigo" && $initial != "すべて") {
    ?>       
                <tr >
                    <td colspan="2"><p>”<?=$initial?>”のようじ語はまだ投稿されていません</p></td>
                </tr> 
    <?php
            }else if($YorO == "kana" && $initial != "すべて") {
    ?>        
                <tr >
                    <td colspan="2"><p>”<?=$initial?>”のおとな語はまだ投稿されていません</p></td>
                </tr> 
    <?php
            }else if($YorO == "youjigo" && $initial == "すべて") {
    ?>       
                <tr >
                    <td colspan="2"><p>ようじ語はまだ投稿されていません</p></td>
                </tr> 
    <?php
            }else if($YorO == "kana" && $initial == "すべて") {
    ?>        
                <tr >
                    <td colspan="2"><p>おとな語はまだ投稿されていません</p></td>
                </tr> 
    <?php
            }
                    
        }
/*------- ↑ ようじ語及びおとな語が未登録時の表示 -------*/

/*------- ↓ DBから取得した結果の表示 -------*/
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // ← DBから取得した分だけ結果を表示する。
                $user_name = hsc($row['user_name']);
                $youjigo = hsc($row['youjigo']);
                $otonago = hsc($row['otonago']);
                $main_id = hsc($row['main_id']);
                $kodomo_name = hsc($row['kodomo_name']);
                $age = hsc($row['age']);
                $posted_at = hsc($row['posted_at']);
                $caption = hsc($row['caption']);
                $photo = hsc($row['photo']);
                $date = hsc($row['posted_at']);
                $date_create = date_create($date);
                $date2 = date_format($date_create,'Y年m月d日');
        
                $src = "upImages/".$user_name."/".$photo;

                if($row['photo'] == ""){ //写真をアップロードしないユーザー用の画像。乱数で挿入される
                    $num = mt_rand(1,6);
                    switch($num){
                        case 1:
                            $src = "images/banner1.svg";
                            break;
                        case 2:
                            $src = "images/banner2.svg";
                            break;
                        case 3:
                            $src = "images/banner3.svg";
                            break;
                        case 4:
                            $src = "images/banner4.svg";
                            break;
                        case 5:
                            $src = "images/banner5.svg";
                            break;
                        case 6:
                            $src = "images/banner6.svg";
                            break;
                    }
                }
                if($YorO == "youjigo" && $sort == "asc") { //検索キーワードがようじ語・あいうえお順だったら
                    ?>       
                    <tr >
                        <td class="info" id="<?=$youjigo?><?=$main_id?>" colspan="2"> <!-- ← ページ内遷移のためのidを付けておく -->
                            <img id="yajirusi" src="images/yajirusi.svg"><span><?=$user_name?></span>・<span><?=$kodomo_name?></span>・<span><?=$age?></span>
                        </td>
                    </tr> 
                    <tr >
                        <td class="img" colspan="2">
                            <div>
                                <img src=<?=$src?> alt=<?=$youjigo?> loading="lazy" oncontextmenu="return false;" onselectstart="return false;" onmousedown="return false;">
                            </div>
                        </td>
                    </tr> 
                    <tr >
                            <td class="YandO"><?=$youjigo?></td>
                        <td class="YandO"><?=$otonago?></td>
                    </tr> 
                    <tr >
                        <td class="caption" colspan="2"><span><?=$user_name?></span><?=$caption?><span id="date"><?=$date2?></span></td>
                    </tr> 
    <?php
                }else if($YorO == "kana" && $sort == "asc") { //検索キーワードがおとな語・あいうえお順だったら
        ?>        
                    <tr >
                        <td class="info" id="<?=$otonago?><?=$main_id?>" colspan="2"> <!-- ← ページ内遷移のためのidを付けておく -->
                            <img id="yajirusi" src="images/yajirusi.svg"><span><?=user_name?></span>・<span><?=$kodomo_name?></span>・<span><?=$age?></span>
                    </tr> 
                    <tr >
                        <td class="img" colspan="2">
                            <div>
                                <img src=<?=$src?> alt=<?=$otonago?> loading="lazy" oncontextmenu="return false;" onselectstart="return false;" onmousedown="return false;">
                            </div>
                        </td>
                    </tr> 
                    <tr >
                            <td class="YandO"><?=$otonago?></td>
                        <td class="YandO"><?=$youjigo?></td>
                    </tr> 
                    <tr >
                        <td class="caption" colspan="2"><span><?=$user_name?></span><?=$caption?><span id="date"><?=$date2?></span></td>
                    </tr> 
        <?php
                }else if($YorO == "youjigo" && $sort == "posted_at"){ //検索キーワードがようじ語・新着順だったら
                    ?>
                    <tr >
                        <td class="info" id="<?=$youjigo?><?=$main_id?>" colspan="2"> <!-- ← ページ内遷移のためのidを付けておく -->
                            <img id="yajirusi" src="images/yajirusi.svg"><span><?=$user_name?></span>・<span><?=$kodomo_name?></span>・<span><?=$age?></span>
                        </td>
                    </tr> 
                    <tr >
                        <td class="img" colspan="2">
                            <div>
                                <img src=<?=$src?> alt=<?=$youjigo?> loading="lazy" oncontextmenu="return false;" onselectstart="return false;" onmousedown="return false;">
                            </div>
                        </td>
                    </tr> 
                    <tr >
                            <td class="YandO"><?=$youjigo?></td>
                        <td class="YandO"><?=$otonago?></td>
                    </tr> 
                    <tr >
                        <td class="caption" colspan="2"><span><?=$user_name?></span><?=$caption?><span id="date"><?=$date2?></span></td>
                    </tr> 
        <?php  
                }else if($YorO == "kana" && $sort == "posted_at") { //検索キーワードがおとな語・新着順だったら
        ?>        
                    <tr >
                        <td class="info" id="<?=$otonago?><?=$main_id?>" colspan="2"> <!-- ← ページ内遷移のためのidを付けておく -->
                            <img id="yajirusi" src="images/yajirusi.svg"><span><?=$user_name?></span>・<span><?=$kodomo_name?></span>・<span><?=$age?></span>
                        </td>
                    </tr> 
                    <tr >
                        <td class="img" colspan="2">
                            <div>
                                <img src=<?=$src?> alt=<?=$otonago?> loading="lazy"  oncontextmenu="return false;" onselectstart="return false;" onmousedown="return false;">
                            </div>
                        </td>
                    </tr> 
                    <tr >
                            <td class="YandO"><?=$otonago?></td>
                        <td class="YandO"><?=$youjigo?></td>
                    </tr> 
                    <tr >
                        <td class="caption" colspan="2"><span><?=$user_name?></span><?=$caption?><span id="date"><?=$date2?></span></td>
                    </tr> 
<!---------------------- ↑ ここまでテーブル ---------------------->
<?php
                }
    
            // }

        }
}catch(PDOException $e){
        $errorMessage = 'データベースエラー';
        echo $errorMessage;
    }finally{
        $pdo = null;
    }
/*------- ↑ DBから取得した結果の表示 -------*/
/*------------------------------------------- ↑ 検索結果表示用スクリプト -------------------------------------------*/
?>
        </table>
</main>
</body>
