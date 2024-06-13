<?php
    require_once('toLogin.php');
    require_once('connect.php');
    $user_name = $_SESSION['user_name'];
    $pdo=connect();

/************************** ↓ こどもアカウント追加用(kodomoPlus)　**************************/
$errorMessage1="";
$errorMessage2="";
$uerr=false;
if(isset($_POST['kodomoPlus'])){
    for($i=0; $i < count($_POST['kodomo_name']); $i++){
        if(empty($_POST['kodomo_name'][$i])){
            $errorMessage1="こどもアカウント名が未入力です。";
            $uerr=true;
        }else if(empty($_POST['birthday'][$i])){
            $errorMessage2="こどもの誕生日が未入力です。";
            $uerr=true;
        }
    }
    if(!$uerr){
        try{
            $sql="SELECT user_id FROM user WHERE user_name = :user_name";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_id = hsc($row['user_id']);

            for($i = 0; $i < count($_POST['kodomo_name']); $i++){
                $kodomo_name = hsc($_POST['kodomo_name'][$i]);
                $birthday = hsc($_POST['birthday'][$i]);
                $sql="INSERT INTO kodomo (user_id,kodomo_name,birthday) VALUES(:user_id,:kodomo_name,:birthday)";
                $stmt=$pdo->prepare($sql);
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':kodomo_name', $kodomo_name, PDO::PARAM_STR);
                $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
                $isTouroku=$stmt->execute();  
            }
            $kodomoPlusMessage='<p>正しく登録されました。</p>';
        }catch(PDOExeption $e){
            $errorMessage="データベースエラー";
            echo $e->getMessage();
        }
        $uerr=true;
    }
        
}else{
    $uerr=true;
}
/************************** ↑　こどもアカウント追加用(kodomoPlus)　**************************/
/************************** ↓　公開設定用(display)　**************************/
    $sql = "SELECT is_public FROM user WHERE user_name = :user_name";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $is_public = $row['is_public'];

    $dispStMessage="";

    if(isset($_POST['display'])){
        $is_public=hsc($_POST['is_public']);
        try{
            $sql="UPDATE user SET is_public = :is_public WHERE user_name = :user_name";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':is_public', $is_public, PDO::PARAM_INT);
            $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $row=$stmt->execute();

            if($is_public == 1){
                $dispStMessage='<p style="margin-block-end:1em;">公開に設定されました。</p>';
            }else if($is_public == 0){
                $dispStMessage='<p style="margin-block-end:1em;">非公開に設定されました。</p>';
            }
        }catch(PDOExeption $e){
            $errorMessage="データベースエラー";
            echo $e->getMessage();
        }
    }    
/************************** ↑　公開設定用(display)　**************************/
/************************** ↓　アカウント削除用(acount_del)　**************************/
if(isset($_POST['acount_del'])){
        $is_active=hsc($_POST['is_active']);
        try{
            $sql="UPDATE main SET is_deleted = 1 WHERE user_name = :user_name";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam('user_name', $user_name, PDO::PARAM_STR);
            $row=$stmt->execute();
            $sql="UPDATE user SET is_active = :is_active WHERE user_name = :user_name";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':is_active', $is_active, PDO::PARAM_INT);
            $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $row=$stmt->execute();
            header("Location: acountDel.php");
        }catch(PDOExeption $e){
            $errorMessage="データベースエラー";
            echo $e->getMessage();
        }
    }    
/************************** ↑　アカウント削除用(acount_del)　**************************/
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>アカウント管理画面</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/union.css">
<link rel="stylesheet" href="css/acountEdit.css">
<script src="js/inputPlus.js"></script>
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
            <li id="youjigoUp"><a href="youjigoUp.php"><span class="img"><img src="images/post.svg" alt="投稿する"></span><span class="moji">投稿する</span></a></li>
            <li id="mypage"><a href="index.php?mypage=1&selected_name=<?=$user_name?>" ><span class="img"><img id="nav" src="images/mypage.svg" alt="マイページ"></span><span class="moji">マイページ</span></a></li>
            <li id="acountEdit"><a href="acountEdit.php" ><span class="img"><img id="nav" src="images/acount.svg" alt="アカウント"></span><span class="moji">アカウント管理</span></a></li>
        </ul>
    </nav>
</header>
<main>  
    <h2><?=$user_name?>さんの<br>アカウント管理画面</h2>

<!---------------------------- ↓ こどもアカウント追加用(kodomoPlus) ---------------------------------->
<?php
    if ($uerr){
?>
    <form class="acountEdit" name="kodomoPlus" action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
        <fieldset>
            <legend>こどもアカウントを追加登録する</legend>
            <div id="message"><?=$errorMessage?></div>
            <div id="inputBox">
                <label id="kName" for="kodomo_name">こどもの名前<span class="required">＊</span></label><input type="text" name="kodomo_name[]" required autofocus>
                <div id="error"><?=$errorMessage1?></div>
                <label id="bDay" for="birthday">こどもの誕生日<span class="required">＊</span></label><input type="date" name="birthday[]" id="bDay" required>
                <div id="error"><?=$errorMessage2?></div>
            </div>
            <div id="buttonBox">
                <button id="create" type="button" id="create">＋</button>
                <button id="del" type="button" id="del">ー</button>
            </div>
            <div id="message"><?=$kodomoPlusMessage?></div>
            <button id="kodomoPlus" type="submit" name="kodomoPlus" value="新規登録">新規登録</button>
        </fieldset>
    </form>
<?php
    }
?>
<!---------------------------- ↑ こどもアカウント追加用(kodomoPlus) ---------------------------------->
<!---------------------------- ↓ 公開設定用(display) ---------------------------------->

    <form class="acountEdit" name="display" action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
        <fieldset>
            <legend>公開状況を設定する</legend>
            <div>
                <select id="is_public" name="is_public">
                <?php
                    if($is_public == 1){
                ?>
                    <option value="1" selected>公開</option>
                    <option value="0">非公開</option>
                <?php
                    }else if($is_public == 0){
                ?>
                    <option value="1">公開</option>
                    <option value="0" selected>非公開</option>
                <?php
                    }
                ?>
                </select>
            </div>
            <div id="message"><?=$dispStMessage?></div>
            <button type="submit" name="display" value="設定">設定</button>
        </fieldset>
    </form>
<!---------------------------- ↑ 公開設定用(display) ---------------------------------->
<!---------------------------- ↓ ログアウトボタン ---------------------------------->
    <fieldset>
    <legend>ログアウトする</legend>
        <a id="acountEdit" href="logout.php">ログアウト</a>
    </fieldset>
<!---------------------------- ↑ ログアウトボタン ---------------------------------->
<!---------------------------- ↓ アカウント削除用(acount_del) ---------------------------------->

    <form name="acount_del" action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
        <fieldset>
        <legend>アカウントを削除する</legend>
            <input type="hidden" name="is_active" value="0">
            <button type="submit" name="acount_del" onclick="return confirm('アカウントを削除してもよろしいですか?')">アカウント削除</button>
        </fieldset>
    </form>
<!---------------------------- ↑ アカウント削除用(acount_del) ---------------------------------->

</main>
</body>
</html>
