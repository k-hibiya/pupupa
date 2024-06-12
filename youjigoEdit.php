<?php
    require_once('toLogin.php');
    require_once('connect.php');
    $user_name = $_SESSION['user_name'];
    $main_id = hsc($_GET['main_id']);
    $YorO = hsc($_GET['YorO']);
    $initial = hsc($_GET['initial']);
    $kodomo_id = hsc($_GET['kodomo_id']);
    $sort = hsc($_GET['sort']);

    $pdo=connect();

    $errorMessage="";
    $signUpMessage="";
/**************************　↓ 幼児語編集(youjigoEdit)　*************************/
$uerr=false;
if(isset($_POST['youjigoEdit'])){
        if(empty($_POST['youjigo'])){
            $errorMessage="幼児語が未入力です。";
            $uerr=true;
        }else if(empty($_POST['otonago'])){
            $errorMessage="正規語が未入力です。";
            $uerr=true;
        }else if(empty($_POST['kana'])){
            $errorMessage="正規語のふりがな（ひらがな）が未入力です。";
            $uerr=true;
        }
        if(!$uerr){
            $main_id=hsc($_POST['main_id']);
            $photo=hsc($_POST['photo']);
            $YorO=hsc($_POST['YorO']);
            $initial=hsc($_POST['initial']);
            $sort=hsc($_POST['sort']);
            $kodomo_id=hsc($_POST['kodomo_id']);
            $youjigo=hsc($_POST['youjigo']);
            $otonago=hsc($_POST['otonago']);
            $kana=hsc($_POST['kana']);
            $caption=hsc($_POST['caption']);
            $tango=hsc($_POST['tango']);
            try{
                $sql="update main set youjigo = :youjigo, otonago = :otonago, kana = :kana, caption = :caption where main_id = :main_id";
                $stmt=$pdo->prepare($sql);
                $stmt->bindParam(':youjigo', $youjigo, PDO::PARAM_STR);
                $stmt->bindParam(':otonago', $otonago, PDO::PARAM_STR);
                $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
                $stmt->bindParam(':caption', $caption, PDO::PARAM_STR);
                $stmt->bindParam(':main_id', $main_id, PDO::PARAM_INT);
                $row=$stmt->execute();

                if($YorO == 'youjigo'){
                    $sql="select youjigo as kotoba from main where main_id = :main_id";
                }else if($YorO == 'kana'){
                    $sql="select otonago as kotoba from main where main_id = :main_id";
                }
                $stmt=$pdo->prepare($sql);
                $stmt->bindParam(':main_id', $main_id, PDO::PARAM_INT);
                $row=$stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $kotoba = hsc($row['kotoba']);
                $flag = $kotoba.$main_id;
                header("Location: mypage.php?YorO=$YorO&initial=$initial&kodomo_id=$kodomo_id&sort=$sort#$flag");
            }catch(PDOExeption $e){
                $errorMessage="データベースエラー";
                echo $e->getMessage();
            }
        }
    }else{
        $uerr=true;
    }
/**************************　↑ 幼児語編集(youjigoEdit)　**************************/
/**************************　↓　幼児語削除(youjigoDelete)　**************************/
    $yojigoDeleteMessage = "";
    if(isset($_POST['youjigoDelete'])){
        $main_id=hsc($_POST['main_id']);
        $is_deleted=hsc($_POST['is_deleted']);
        $photo=hsc($_POST['photo']);
        $YorO=hsc($_POST['YorO']);
        $initial=hsc($_POST['initial']);
        $kodomo_id=hsc($_POST['kodomo_id']);
        $sort=hsc($_POST['sort']);

        $sql="select youjigo from main where main_id = :main_id";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(':main_id', $main_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $youjigo = hsc($row['youjigo']);

        try{
            $sql="update main set is_deleted = :is_deleted where main_id = :main_id";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':is_deleted', $is_deleted, PDO::PARAM_INT);
            $stmt->bindParam(':main_id', $main_id, PDO::PARAM_INT);
            $row=$stmt->execute();
            header("Location: youjigoDel.php?YorO=$YorO&initial=$initial&kodomo_id=$kodomo_id&sort=$sort&youjigo=$youjigo");
        }catch(PDOExeption $e){
            $errorMessage="データベースエラー";
            echo $e->getMessage();
        }
    }    
/**************************　↑ 　幼児語削除(youjigoDelete)　**************************/
/**************************　↓　戻るボタン(editCancel)　**************************/
    if(isset($_POST['editCancel'])){
            $main_id=hsc($_POST['main_id']);
            $YorO=hsc($_POST['YorO']);
            $initial=hsc($_POST['initial']);
            $kodomo_id=hsc($_POST['kodomo_id']);
            $sort=hsc($_POST['sort']);
            $tango=hsc($_POST['tango']);
            $flag = $tango.$main_id;
            header("Location: mypage.php?YorO=$YorO&initial=$initial&kodomo_id=$kodomo_id&sort=$sort#$flag");
    }    
/**************************　↑ 　戻るボタン(editCancel)　**************************/
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>幼児語登録画面</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/union.css">
<link rel="stylesheet" href="css/youjigoEdit.css">
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
        </ul>
    </nav>
</header>
<main>  
 <h2>ようじ語編集画面</h2>
<!----------------------------　↓ ようじ語編集(youjigoEdit) ---------------------------------->
<?php
    $sql = "select youjigo, otonago, kana, photo, 
    caption from main 
    join age on main.age_id = age.age_id 
    where main_id = '$main_id'";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $youjigo = hsc($row['youjigo']);
    $otonago = hsc($row['otonago']);
    $kana = hsc($row['kana']);
    $caption = hsc($row['caption']);
?>
    <form class="youjigoEdit" action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
        <fieldset>
            <div id="err"><?= $errorMessage ?></div>
            <legend>投稿を編集する</legend>
            <div>
                <label for="youjigo">ようじ語（ひらがな）</label>
                <input type="text" name="youjigo" pattern="^[ぁ-ゔー]+$" autofocus value=<?=$youjigo?>>
                <label for="otonago">おとな語</label>
                <input type="text" name="otonago" value=<?=$otonago?>>
                <label for="kana">おとな語のふりがな</label>
                <input type="text" name="kana" pattern="^[ぁ-ゔー]+$" value=<?=$kana?>>
                <label for="caption">紹介文</label>
                <textarea type="text" name="caption" rows="5"><?=$caption?></textarea>
                <input type="hidden" name="main_id" value=<?=$main_id?>>
                <input type="hidden" name="YorO" value=<?=$YorO?>>
                <input type="hidden" name="initial" value=<?=$initial?>>
                <input type="hidden" name="kodomo_id" value=<?=$kodomo_id?>>
                <input type="hidden" name="sort" value=<?=$sort?>>
                <div id="youjigoEdit">
                    <button id="youjigoEdit" type="submit" name="youjigoEdit" >編集実行</button>
                </div>
            </div>
        </fieldset>
    </form>
<!----------------------------　↑ ようじ語編集(youjigoEdit)　---------------------------------->
<!----------------------------　↓ 編集キャンセル(editCancel)---------------------------------->
<form class="youjigoEdit" name="editCancel" action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
    <fieldset>
        <legend>マイページへ戻る</legend>
        <input type="hidden" name="main_id" value=<?=$main_id?>>
        <input type="hidden" name="YorO" value=<?=$YorO?>>
        <input type="hidden" name="initial" value=<?=$initial?>>
        <input type="hidden" name="kodomo_id" value=<?=$kodomo_id?>>
        <input type="hidden" name="sort" value=<?=$sort?>>
    <?php 
        if($YorO == 'youjigo'){
    ?>
        <input type="hidden" name="tango" value=<?=$youjigo?>>
    <?php
        }else if($YorO == 'kana'){
    ?>
        <input type="hidden" name="tango" value=<?=$otonago?>>    
    <?php       
        }
    ?>
        <button type="submit" name="editCancel">マイページへ</button>
    </fieldset>
</form>
<!----------------------------　↑ 編集キャンセル(editCancel)　---------------------------------->
<!----------------------------　↓ ようじ語削除(youjigoEdit)---------------------------------->
<form  name="youjigoDelete" action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
        <fieldset>
            <legend>投稿を削除する</legend>
            <input type="hidden" name="main_id" value=<?=$main_id?>>
            <input type="hidden" name="photo" value=<?=$photo?>>
            <input type="hidden" name="YorO" value=<?=$YorO?>>
            <input type="hidden" name="initial" value=<?=$initial?>>
            <input type="hidden" name="kodomo_id" value=<?=$kodomo_id?>>
            <input type="hidden" name="sort" value=<?=$sort?>>
            <input type="hidden" name="is_deleted" value=1>
            <button type="submit" name="youjigoDelete">投稿削除</button>
            <div id="youjigoDel"><?=$youjigoDeleteMessage?></div>
        </fieldset>
    </form>
<!----------------------------　↑ ようじ語削除(youjigoDelete)　---------------------------------->
<div id="sineUp"><?=$signUpMessage ?></div>
</main>
</body>
</html>
