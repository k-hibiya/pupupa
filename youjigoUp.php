<?php
    require_once('toLogin.php');
    require_once('connect.php');
    $user_name=$_SESSION['user_name'];
    $pdo=connect();
    $sql="select user_id from user where user_name = :user_name";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = hsc($row['user_id']);
    $sql = "select kodomo_name, kodomo_id from kodomo where user_id = :user_id";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $row=$stmt->execute();

    $errorMessage="";
    $signUpMessage="";
    $uerr=false;
    if(isset($_POST['youjigoUp'])){
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
            if (!empty($_FILES['image'])) {
                $photo = $_FILES['image']['name'];
                $src = 'upImages/' . $user_name . '/' . $photo;
                $result = move_uploaded_file($_FILES['image']['tmp_name'], $src);
            } 
            $kodomo_id=hsc($_POST['kodomo_id']);
            $youjigo=hsc($_POST['youjigo']);
            $otonago=hsc($_POST['otonago']);
            $kana=hsc($_POST['kana']);
            $caption=hsc($_POST['caption']);
            $age_id=hsc($_POST['age_id']);
            try{
                $sql="insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id) values(:user_id, :kodomo_id, :youjigo, :otonago, :kana, :photo, :caption, :age_id)";
                $stmt=$pdo->prepare($sql);
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':kodomo_id', $kodomo_id, PDO::PARAM_INT);
                $stmt->bindParam(':youjigo', $youjigo, PDO::PARAM_STR);
                $stmt->bindParam(':otonago', $otonago, PDO::PARAM_STR);
                $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
                $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
                $stmt->bindParam(':caption', $caption, PDO::PARAM_STR);
                $stmt->bindParam(':age_id', $age_id, PDO::PARAM_INT);
                $row=$stmt->execute();
                $youjigoUpMessage='<p>”'.$youjigo.'”が登録されました。</p>
                    <a class="anchor" href="index.php">トップページへ</a>
                    <a class="anchor" href="index.php?mypage=1&selected_name='.$user_name.'">マイページへ</a>';
            }catch(PDOExeption $e){
                $errorMessage="データベースエラー";
                echo $e->getMessage();
                $uerr=true;
            }
        }
    }else{
        $uerr=true;
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>幼児語登録画面</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/union.css">
<link rel="stylesheet" href="css/youjigoUp.css">
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
            <li id="maypage"><a href="index.php?mypage=1&selected_name=<?=$user_name?>" ><span class="img"><img id="nav" src="images/mypage.svg" alt="マイページ"></span><span class="moji">マイページ</span></a></li>
        </ul>
    </nav>
</header>
<main>  
    <h2 id="noLegend">ようじ語登録画面</h2>
    <form name="youjigoUp" action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST" enctype="multipart/form-data">
        <fieldset id="noLegend">
            <div id="message"><?=$youjigoUpMessage?></div>
    <?php 
        if($uerr){ 
    ?>
            <div id="message"><?= $errorMessage ?></div>
            <div>
                <p><span class="required">＊</span>マークは入力必須項目です。</p>
                <label>こどもの名前<span class="required">＊</span></label>
                <select name="kodomo_id" autofocus>
                <?php
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $kodomo_id = hsc($row['kodomo_id']);
                        $kodomo_name = hsc($row['kodomo_name']);
                ?>
                        <option value="<?=$kodomo_id?>"><?=$kodomo_name?></option>
                <?php
                    }
                ?>
                </select>
                <label for="youjigo">ようじ語（ひらがな）<span class="required">＊</span></label>
                <input type="text" name="youjigo" pattern="^[ぁ-ゔー]+$" placeholder="ぷぷぱ" required>
                <label for="otonago">おとな語<span class="required">＊</span></label>
                <input type="text" name="otonago" placeholder="トマト" required>
                <label for="kana">おとな語のふりがな<span class="required">＊</span></label>
                <input type="text" name="kana" pattern="^[ぁ-ゔー]+$" placeholder="とまと" required>
                <div id="imageBox">
                    <label id="label" for="image">画像を選んでください</label>
                    <input id="image" type="file" name="image" accept=".jpeg, .jpg, .png, .gif, image/jpeg, image/png, image/gif">
                </div>
                <label for="caption">ようじ語や写真の紹介文</label>
                <textarea type="text" name="caption" rows="5" placeholder="任意で入力してください。"></textarea>
                <label for="age_id">月齢<span class="required">＊</span></label>
                <select name="age_id">
                    <option value="1">0才6ヶ月</option>
                    <option value="2">0才7ヶ月</option>
                    <option value="3">0才8ヶ月</option>
                    <option value="4">0才9ヶ月</option>
                    <option value="5">0才10ヶ月</option>
                    <option value="6">0才11ヶ月</option>
                    <option value="7" selected>1才0ヶ月</option>
                    <option value="8">1才1ヶ月</option>
                    <option value="9">1才2ヶ月</option>
                    <option value="10">1才3ヶ月</option>
                    <option value="11">1才4ヶ月</option>
                    <option value="12">1才5ヶ月</option>
                    <option value="13">1才6ヶ月</option>
                    <option value="14">1才7ヶ月</option>
                    <option value="15">1才8ヶ月</option>
                    <option value="16">1才9ヶ月</option>
                    <option value="17">1才10ヶ月</option>
                    <option value="18">1才11ヶ月</option>
                    <option value="19">2才0ヶ月</option>
                    <option value="20">2才1ヶ月</option>
                    <option value="21">2才2ヶ月</option>
                    <option value="22">2才3ヶ月</option>
                    <option value="23">2才4ヶ月</option>
                    <option value="24">2才5ヶ月</option>
                    <option value="25">2才6ヶ月</option>
                    <option value="26">2才7ヶ月</option>
                    <option value="27">2才8ヶ月</option>
                    <option value="28">2才9ヶ月</option>
                    <option value="29">2才10ヶ月</option>
                    <option value="30">2才11ヶ月</option>
                    <option value="31">3才0ヶ月</option>
                    <option value="32">3才1ヶ月</option>
                    <option value="33">3才2ヶ月</option>
                    <option value="34">3才3ヶ月</option>
                    <option value="35">3才4ヶ月</option>
                    <option value="36">3才5ヶ月</option>
                    <option value="37">3才6ヶ月</option>
                    <option value="38">3才7ヶ月</option>
                    <option value="39">3才8ヶ月</option>
                    <option value="40">3才9ヶ月</option>
                    <option value="41">3才10ヶ月</option>
                    <option value="42">3才11ヶ月</option>
                </select>
        <?php
            }
        ?>
            </div>
        </fieldset>
    <?php 
        if($uerr){ 
    ?>
        <button type="submit" name="youjigoUp" value="登録">登録</button>
    <?php
        }
    ?>
    </form>
</main>
</body>
</html>
