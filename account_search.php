<?php
    require_once('toLogin.php'); //←loginしていないユーザーをlogin画面(login.php)にリダイレクトする
        /* ↓ toLogin.phpの中身

            session_start();

            if(!isset($_SESSION['user_name'])){
                header("Location:login.php");
            }

        */

    require_once('connect.php'); 
    $user_name = hsc($_SESSION['user_name']);
    $pdo = connect();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charaset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>PUPUPAアカウントリスト</title>
<script src="js/form.js"></script>
<script src="js/nav.js"></script>
<script src="js/tdClose.js"></script>
<script src="js/follow.js"></script>
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
            <li id="serch"><p id="serchButton"><span class="img"><img src="images/a_serch.svg" alt="検索する"></span><span class="moji">検索する</span></li>
            <li id="account_search"><a href="account_search.php"><span class="img"><img src="images/account_search.svg" alt="アカウントリスト"></span><span class="moji">アカウント<br>リスト</span></a></li>
            <li id="mypage"><a href="index.php?mypage=1&selected_name=<?=$user_name?>" ><span class="img"><img id="nav" src="images/mypage.svg" alt="マイページ"></span><span class="moji">マイページ</span></a></li>
        </ul>
    </nav>
</header>
<main>
<!------------------------------------------- ↓ 検索form ------------------------------------------->
    <form id="formBox" action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="get">
        <fieldset id="AorF"> 
            <legend>検索方法を選んでください</legend>
                <label><input name="AorF" type="radio" value="all_accounts" checked="checked">すべてのアカウント</label>
                <label><input name="AorF" type="radio" value="following">フォロー中のアカウント</label>
        </fieldset>
        <fieldset id="initial">
            <legend>どれかひとつ選んでください</legend>
            <div>
                <label><input name="initial" type="radio" value="all_alphabets" checked="checked">すべて</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="A">A</label>
                <label><input name="initial" type="radio" value="B">B</label>
                <label><input name="initial" type="radio" value="C">C</label>
                <label><input name="initial" type="radio" value="D">D</label>
                <label><input name="initial" type="radio" value="E">E</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="F">F</label>
                <label><input name="initial" type="radio" value="G">G</label>
                <label><input name="initial" type="radio" value="H">H</label>
                <label><input name="initial" type="radio" value="I">I</label>
                <label><input name="initial" type="radio" value="J">J</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="K">K</label>
                <label><input name="initial" type="radio" value="L">L</label>
                <label><input name="initial" type="radio" value="M">M</label>
                <label><input name="initial" type="radio" value="N">N</label>
                <label><input name="initial" type="radio" value="O">O</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="P">P</label>
                <label><input name="initial" type="radio" value="Q">Q</label>
                <label><input name="initial" type="radio" value="R">R</label>
                <label><input name="initial" type="radio" value="S">S</label>
                <label><input name="initial" type="radio" value="T">T</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="U">U</label>
                <label><input name="initial" type="radio" value="V">V</label>
                <label><input name="initial" type="radio" value="W">W</label>
                <label><input name="initial" type="radio" value="X">X</label>
                <label><input name="initial" type="radio" value="Y">Y</label>
            </div>
            <div>
                <label><input name="initial" type="radio" value="Z">Z</label>
            </div>
        </fieldset>
        <fieldset id="sort">
            <legend>どちらか選んでください</legend>
            <div>
                <label><input name="sort" type="radio" value="alphabet_asc" checked="checked">ABC順</label>
                <label><input name="sort" type="radio" value="user_id_desc">新しい順</label>
            </div>       
        </fieldset>
        <button type="submit" value="検索">検索</button>
    </form>
<!------------------------------------------- ↑ 検索form ------------------------------------------->

<?php
/*------------------------------------------- ↓ 検索結果表示用スクリプト -------------------------------------------*/

    if(!isset($_GET['AorF'])) { //formが送られていない初期表示のSQL作成用の変数定義
        $AorF = "all_accounts";
        $initial = "all_alphabets";
        $sort = "user_id_desc";
    }else if(isset($_GET['AorF'])) { //formが送られてきた場合のSQL作成用の変数定義
        $AorF = hsc($_GET['AorF']);
        $initial = hsc($_GET['initial']);
        $sort = hsc($_GET['sort']);
    }
/*------- ↓ 検索キーワードをまとめた見出しを作成する -------*/
    require_once ('midasi.php'); //←検索キーワードを見出しとしてまとめて返す midasi() が入っている
    $midasi = midasi($AorF, $initial, $sort); //例、"ようじ語・すべて・あいうえお順"
    $searchMessage = $midasi;
/*--- ↑ 検索キーワードをまとめた見出しを作成する --*/

?>
    <p id="account_mado"><?=$searchMessage?></p> <!-- ← 検索キーワードをまとめた見出しがここに入る。-->
<!---------------------- ↓ ここからテーブル ---------------------->
    <table>
        <colgroup span="2"></colgroup>
            <tr >
                <th class="fixed" id="account_th" colspan="2"><span>アカウントを選んでください</span></th>
            </tr> 
<?php

    try {
/*------- ↓ SQL文を作成する -------*/
        require_once('mojiset.php');
        $mojiset = mojiset($initial);
        $sql = "SELECT user_id FROM user WHERE user_name = :user_name";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $row=$stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $row['user_id'];
        if(isset($AorF)){
            $sql = "SELECT user_name, is_public, is_active, follow_status FROM user ";
            if($AorF == "all_accounts" && $initial == "all_alphabets"){
                $sql = $sql."LEFT JOIN follow on user.user_id = follow.followee_id AND follower_id = :user_id 
                        WHERE is_active = 1 ";
            }else if($AorF == "all_accounts" && $initial != "all_alphabets"){
                $sql = $sql."LEFT JOIN follow on user.user_id = follow.followee_id AND follower_id = :user_id 
                        WHERE is_active = 1 AND user_name LIKE '$mojiset[0]%' 
                        or is_active = 1 AND user_name LIKE '$mojiset[1]%' ";
            }else if($AorF == "following" && $initial == "all_alphabets"){
                $sql = $sql."JOIN follow on user.user_id = follow.followee_id 
                        WHERE is_active = 1 AND follower_id = :user_id ";
            }else if($AorF == "following" && $initial != "all_alphabets"){
                $sql = $sql."JOIN follow on user.user_id = follow.followee_id 
                        WHERE is_active = 1 AND user_name LIKE '$mojiset[0]%' AND follower_id = :user_id 
                        or is_active = 1 AND user_name LIKE '$mojiset[1]%' AND follower_id = :user_id ";
            }
            if($sort == "user_id_desc") {
                $sql = $sql."order by user_id desc";
            }else if($sort == "alphabet_asc") {
                $sql = $sql."order by user_name asc";
            }
        }
        
        $stmt = $pdo->prepare($sql);
        if(isset($AorF)){
            if($AorF == "all_accounts" && $initial == "all_alphabets"){
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            }else if($AorF == "all_accounts" && $initial != "all_alphabets"){
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            }else if($AorF == "following" && $initial == "all_alphabets"){
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            }else if($AorF == "following" && $initial != "all_alphabets"){
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            }
        }

/*------- ↑ SQL文を作成する -------*/
    
/*------- ↓ 各アカウントが未登録時の表示 -------*/
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row) { //SQL文で問い合わせた結果が０だったら、各種”投稿されていません”を表示
            if(($AorF == "all_accounts" && $initial != "all_alphabets") || ($AorF == "following" && $initial != "all_alphabets")) {
    ?>       
                <tr >
                    <td colspan="2">”<?=$initial?>”のアカウントはありません。</td>
                </tr> 
    <?php
            }else if($AorF == "all_accounts" && $initial == "all_alphabets") {
    ?>        
                <tr >
                    <td colspan="2">表示できるアカウントがありません。</td>
                </tr> 
    <?php
            }else if($AorF == "following" && $initial == "all_alphabets") {
    ?>       
                <tr >
                    <td colspan="2">フォロー中のアカウントはありません。</td>
                </tr> 
    <?php
            }
                    
        }else if($row) {
            $count_row = 0; 
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // ← アカウントの数によってボタンの表示を切り替えるためにアカウントの数を数える。
                $count_row++;
            }
            if($AorF == "all_accounts" && $initial == "all_alphabets"){
    ?>
                <tr >
                    <td class="account_td" id="all_AorF" colspan="2"> 
                        <div>
                            <span><a href="index.php">すべてのアカウント</a></span>
                        </div>
                    </td>
                </tr> 
    <?php
            }else if($AorF == "following" && $initial == "all_alphabets" && $count_row >= 2){
            ?>
                <tr >
                    <td class="account_td" id="all_AorF" colspan="2"> 
                        <div>
                            <span><a href="index.php?selected_followee=all">すべてのフォロー中のアカウント</a></span>
                        </div>
                    </td>
                </tr> 
            <?php
            }
        }
/*------- ↑ 各アカウントが未登録時の表示 -------*/

/*------- ↓ DBから取得した結果の表示 -------*/
        // $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // ← DBから取得した分だけ結果を表示する。
                $selected_name = $row['user_name'];
                $is_public = hsc($row['is_public']);
                $follow_status = hsc($row['follow_status']);
                if($user_name != $selected_name){
                    if($is_public == 1) { 
                        if($follow_status == 0){
            ?>       
                    <tr >
                        <td class="account_td" colspan="2"> 
                            <div>
                                <span><a href="index.php?selected_name=<?=$selected_name?>"><?=$selected_name?></a></span>
                                <span class="follow_button"><p class="follow" data-selected-name="<?=$selected_name?>">フォロー</p></span>
                            </div>
                        </td>
                    </tr> 
            <?php
                        }else if($follow_status == 1){
            ?>       
                    <tr >
                        <td class="account_td" colspan="2">
                            <div>
                                <span><a href="index.php?selected_followee=specific&selected_name=<?=$selected_name?>"><?=$selected_name?></a></span>
                                <span class="follow_button"><p class="unfollow" data-selected-name="<?=$selected_name?>">フォロー中</p></span>
                            </div>
                        </td>
                    </tr> 
            <?php
                        }
                    }else if($is_public == 0) {
                        if($follow_status == 0){
            ?>        
                    <tr >
                        <td class="account_td" colspan="2">
                            <div>
                                <span><p><?=$selected_name?>（非公開）</p></span>
                                <span class="follow_button"><p class="follow_request" data-selected-name="<?=$selected_name?>">フォロー</p></span>
                            </div>
                        </td>
                    </tr> 
            <?php
                        }if($follow_status == 1){
            ?>        
                    <tr >
                        <td class="account_td" colspan="2">
                            <div>
                                <span><a href="index.php?selected_followee=specific&selected_name=<?=$selected_name?>"><?=$selected_name?></a></span>
                                <span class="follow_button"><p class="unfollow" data-selected-name="<?=$selected_name?>">フォロー中</p></span>
                            </div>
                        </td>
                    </tr> 
<!---------------------- ↑ ここまでテーブル ---------------------->
<?php
                        }
                    }
                }
    

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
