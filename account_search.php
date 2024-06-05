<?php
    require_once('toLogin.php'); //←loginしていないユーザーをlogin画面(login.php)にリダイレクトする
        /* ↓ toLogin.phpの中身

            session_start();

            if(!isset($_SESSION['user_name'])){
                header("Location:login.php");
            }

        */
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charaset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- <meta name="description" content="PUPUPAは「こどもが何て言っているのかわからない！」そんな幼児語の“困った”を解決する投稿型の幼児語辞典アプリです。" /> -->
<title>PUPUPAトップページ</title>
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
            <!-- <li id="serch"><p id="serchButton"><span class="img"><img src="images/serch.svg" alt="検索する"></span><span class="moji">検索する</span></li> -->
            <li id="account_search"><a href="account_search.php"><span class="img"><img src="images/account_search.svg" alt="アカウントリスト"></span><span class="moji">アカウント<br>リスト</span></a></li>
            <!-- <li id="youjigoUp"><a href="youjigoUp.php"><span class="img"><img src="images/post.svg" alt="投稿する"></span><span class="moji">投稿する</span></a></li> -->
            <li id="mypage"><a href="mypage.php" ><span class="img"><img id="nav" src="images/mypage.svg" alt="マイページ"></span><span class="moji">マイページ</span></a></li>
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

    if(!isset($_GET['YorO'])) { //formが送られていない初期表示のSQL作成用の変数定義
        $YorO = "";
        $initial = "すべて";
        $sort = "user_id";
    }else if(isset($_GET['YorO'])) { //formが送られてきた場合のSQL作成用の変数定義
        $YorO = "";
        $initial = hsc($_GET['initial']);
        $sort = hsc($_GET['sort']);
    }
/*------- ↓ 検索キーワードをまとめた見出しを作成する -------*/
require_once ('midasi.php'); //←名前以外の検索キーワードを見出しとしてまとめて返す midasi() が入っている
    $midasi = midasi($YorO, $initial, $sort); //例、"ようじ語・すべて・あいうえお順"
    $searchMessage = $midasi;
/*--- ↑ 検索キーワードをまとめた見出しを作成する --*/

?>
    <p id="account_mado"><?=$searchMessage?></p> <!-- ← 検索キーワードをまとめた見出しがここに入る。-->
<!---------------------- ↓ ここからテーブル ---------------------->
    <table>
        <colgroup span="2"></colgroup>
            <tr >
                <th class="fixed" id="account_th" colspan="2"><span id="k">アカウントを選んでください</span></th>
            </tr> 
            <tr >
                <td class="account_td" colspan="2"> <!-- ← ページ内遷移のためのidを付けておく -->
                    <span><a href="index.php">すべてのアカウント</a></span>
                </td>
            </tr> 
<?php

    try {
/*------- ↓ SQL文を作成する -------*/
        require_once('mojiset.php');
        require_once('connect.php'); 
        $user_name = $_SESSION['user_name'];
        $pdo = connect();
        $sql = "select user_id from user where user_name = $user_name";
        $stmt=$pdo->prepare($sql);
        $row=$stmt->execute();
        $user_id = $row['user_id'];
        if(isset($YorO)){
            $alphabet = "";
            $alphabet_set = range('A', 'Z');
            $sql = "select user_name, is_public, is_active from user ";
            if($initial != "すべて" && $initial != "フォロー中"){
                for($i=0; $i<26; $i++){
                    if($initial == $alphabet_set[$i]){
                        $alphabet = $alphabet_set[$i];
                    }
                }
                $sql = $sql."where is_active = 1 and user_name like '$alphabet%' ";
            }else if($initial == "すべて"){
                $sql = $sql."where is_active = 1 ";
            }else if($initial == "フォロー中"){
                $sql = $sql."where is_active = 1 and follower_id = $user_id ";
            }
            /* if($initial == "あ" || $initial == "い" || $initial == "う" || $initial == "え" || $initial == "お" || 
                    $initial == "な" || $initial == "に" || $initial == "ぬ" || $initial == "ね" || $initial == "の" || 
                    $initial == "ま" || $initial == "み" || $initial == "む" || $initial == "め" || $initial == "も" || 
                    $initial == "や" || $initial == "ゆ" || $initial == "よ" || 
                    $initial == "ら" || $initial == "り" || $initial == "る" || $initial == "れ" || $initial == "ろ" || 
                    $initial == "わ" || $initial == "を" || $initial == "ん") {
                $sql = $sql."where is_active = 1 and $YorO like '$mojiset%' ";
            }else if($initial == "か" || $initial == "き" || $initial == "く" || $initial == "け" || $initial == "こ" || 
                    $initial == "さ" || $initial == "し" || $initial == "す" || $initial == "せ" || $initial == "そ" || 
                    $initial == "た" || $initial == "ち" || $initial == "つ" || $initial == "て" || $initial == "と") {
                $sql = $sql."where is_active = 1 and $YorO like '$mojiset[0]%' 
                        or is_active = 1 and $YorO like '$mojiset[1]%' ";
            }else if($initial == "は" || $initial == "ひ" || $initial == "ふ" || $initial == "へ" || $initial == "ほ") {
                $sql = $sql."where is_active = 1 and $YorO like '$mojiset[0]%' 
                        or is_active = 1 and $YorO like '$mojiset[1]%' 
                        or is_active = 1 and $YorO like '$mojiset[2]%' ";
            }else if($initial == "すべて"){
            } */
            if($sort == "user_id") {
                $sql = $sql."order by user_id desc";
            }else if($sort == "asc") {
                $sql = $sql."order by asc";
            }
        }
/*------- ↑ SQL文を作成する -------*/
    
/*------- ↓ ようじ語及びおとな語が未登録時の表示 -------*/
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row) { //SQL文で問い合わせた結果が０だったら、各種”投稿されていません”を表示
            if($initial != "すべて" && $initial != "フォロー中") {
    ?>       
                <tr >
                    <td colspan="2"><p>頭文字が”<?=$initial?>”のアカウントはありません。</p></td>
                </tr> 
    <?php
            }else if($initial == "すべて") {
    ?>        
                <tr >
                    <td colspan="2"><p>表示できるアカウントがありません。</p></td>
                </tr> 
    <?php
            }else if($initial == "フォロー中") {
    ?>       
                <tr >
                    <td colspan="2"><p>フォロー中のアカウントはありません。</p></td>
                </tr> 
    <?php
            }
                    
        }
/*------- ↑ ようじ語及びおとな語が未登録時の表示 -------*/

/*------- ↓ DBから取得した結果の表示 -------*/
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // ← DBから取得した分だけ結果を表示する。
                $selected_name = hsc($row['user_name']);
                $is_public = hsc($row['is_public']);
                /* $youjigo = hsc($row['youjigo']);
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
        
                $src = "upImages/".$user_name."/".$photo; */

                /* if($row['photo'] == ""){ //写真をアップロードしないユーザー用の画像。乱数で挿入される
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
                } */
                if($is_public == 1) { //検索キーワードがようじ語・あいうえお順だったら
            ?>       
                    <tr >
                        <td class="account_td" colspan="2"> <!-- ← ページ内遷移のためのidを付けておく -->
                            <span><a href="index.php?selected_name=<?=$selected_name?>"><?=$selected_name?></a></span>
                            <!-- ↓ 編集ボタン(a要素)には、幼児語編集画面へ遷移後のSQL作成用URLパラメータを持たせている -->       
                            <span class="follow"><!--<a href="follow.php?selected_name=<?=$selected_name?>">-->フォロー(準備中)<!--</a>--></span>
                        </td>
                    </tr> 
            <?php
                }else if($is_public == 0) { //検索キーワードがおとな語・あいうえお順だったら
            ?>        
                    <tr >
                        <td class="account_td" colspan="2"> <!-- ← ページ内遷移のためのidを付けておく -->
                            <span><?=$selected_name?>（非公開）</span>
                            <!-- ↓ 編集ボタン(a要素)には、幼児語編集画面へ遷移後のSQL作成用URLパラメータを持たせている -->       
                            <span class="follow"><!--<a href="follow.php?selected_name=<?=$selected_name?>">-->フォロー(準備中)<!--</a>--></span>
                        </td>
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
