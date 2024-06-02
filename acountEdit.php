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
            $sql="select user_id from user where user_name = '$user_name'";
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_id = hsc($row['user_id']);
            for($i = 0; $i < count($_POST['kodomo_name']); $i++){
                $kodomo_name = hsc($_POST['kodomo_name'][$i]);
                $birthday = hsc($_POST['birthday'][$i]);
                $sql="insert into kodomo (user_id,kodomo_name,birthday) values(?,?,?)";
                $stmt=$pdo->prepare($sql);
                $isTouroku=$stmt->execute(array($user_id,$kodomo_name,$birthday));  
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
/**************************　こどもアカウント編集用(kodomoEdit)　**************************/
/*$errorMessage2="";
$uerr2=false;
$value=$_POST['i'];
if(isset($_POST['kodomoEdit'][$value])){
    if(empty($_POST['kodomo_name'])){
        $errorMessage2="こどもアカウント名が未入力です。";
        $uerr2=true;
    }else if(empty($_POST['birthday'])){
        $errorMessage2="こどもの誕生日が未入力です。";
        $uerr2=true;
    }
    if(!$uerr2){
        try{
                $sql="update kodomo set kodomo_name = ?, birthday = ? where user_name = ?";
                $stmt=$pdo->prepare($sql);
                $isTouroku2=$stmt->execute(array(hsc($_POST['kodomo_name']),hsc($_POST['birthday']),$user_name));  
            $kodomoEditMessage='<p>正しく登録されました</p>';
        }catch(PDOExeption $e){
            $errorMessage2="データベースエラー";
            echo $e->getMessage();
        }
        $uerr2=true;
    }
        
}else{
    $uerr2=true;
}
/************************** ↑　こどもアカウント編集用(kodomoEdit)　**************************/
/************************** ↓　公開設定用(display)　**************************/
    $sql = "select is_public from user where user_name = '$user_name'";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $is_public = $row['is_public'];

    $dispStMessage="";

    if(isset($_POST['display'])){
        $is_public=hsc($_POST['is_public']);
        try{
            $sql="update user set is_public = ? where user_name = ?";
            $stmt=$pdo->prepare($sql);
            $row=$stmt->execute(array($is_public,$user_name));

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
            $sql="update main set del_st = 1 where user_name = ?";
            $stmt=$pdo->prepare($sql);
            $row=$stmt->execute(array($user_name));
            $sql="update user set is_active = ? where user_name = ?";
            $stmt=$pdo->prepare($sql);
            $row=$stmt->execute(array($is_active,$user_name));
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
<!-- <script src="js/goBack.js"></script> -->
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
            <li id="mypage"><a href="mypage.php" ><span class="img"><img id="nav" src="images/mypage.svg" alt="マイページ"></span><span class="moji">マイページ</span></a></li>
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
<!----------------------------こどもアカウント編集(kodomoEdit)---------------------------------->
<!--<?php
    /*if ($uerr2){
?>
    <fieldset>
        <div id="err"><?= $errorMessage2 ?></div>
        <legend>こどもアカウント編集</legend>
    <?php
        $i=0;
        $sql = "select kodomo_name, birthday from kodomo where user_name = '{$user_name}'";
        $stmt=$pdo->prepare($sql);
        $row=$stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
        <form name="kodomoEdit" action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
                <label for="youjigo">名前</label><br>
                <input type="text" name="kodomo_name" value=<?=$row['kodomo_name']?>><br>
                <label for="otonago">誕生日</label><br>
                <input type="date" name="birthday" value=<?=$row['birthday']?>><br>
                <input type="hidden" name="i" value=<?=$i?>>
                <input type="submit" name="kodomoEdit" value="実行">
        </form>
    <?php
        $i++;
        }
    ?>
            <div id="kodomoEdit"><?=$kodomoPlusMessage?></div>
    </fieldset>
    <?php
    }
*/?>-->
<!---------------------------- ↑ こどもアカウント編集(kodomoEdit) ---------------------------------->
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
