<?php
    $errorMessage="";
    $signUpMessage="";
    $uerr=false;
    if(isset($_POST['signUp'])){
        if(empty($_POST['user_name'])){
            $errorMessage="アカウント名が未入力です。";
            $uerr=true;
        }else if(empty($_POST['password'])){
            $errorMessage="パスワードが未入力です。";
            $uerr=true;
        }else if(empty($_POST['password2'])){
            $errorMessage="パスワード(確認用)が未入力です。";
            $uerr=true;
        }else if($_POST['password'] != $_POST['password2']){
            $errorMessage="パスワードに誤りがあります。";
            $uerr=true;
        }else{
            for($i=0; $i < count($_POST['kodomo_name']); $i++){
                if(empty($_POST['kodomo_name'][$i])){
                    $errorMessage="こどもアカウント名が未入力です。";
                    $uerr=true;
                }else if(empty($_POST['birthday'][$i])){
                    $errorMessage="こどもの誕生日が未入力です。";
                    $uerr=true;
                }
            }    
        }
        if(!$uerr){
            session_start();
            require_once('connect.php');
            $user_name=hsc($_POST['user_name']);
            $password = $_POST['password'];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            try{
                $pdo=connect();
                $sql="select count(*) as ninzu from user where user_name = (?)";
                $isUnique=$pdo->prepare($sql);
                $isUnique->execute(array($user_name));
                $result=$isUnique->fetch(PDO::FETCH_ASSOC);
                if($result['ninzu'] !=0){
                    $errorMessage="すでにアカウント名が利用されています。<br>他のアカウント名で登録してください。";
                    $uerr=true;
                }else{
                    $sql="insert into user (user_name,password_hash) values(?,?)";
                    $stmt=$pdo->prepare($sql);
                    $isTouroku=$stmt->execute(array($user_name,$password_hash));

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
                    $signUpMessage='<p>正しく登録されました。</p>
                                        <a class="anchor" href="index.php">ホームへ</a>
                                        <a class="anchor" href="mypage.php">マイページへ</a>';
                    session_regenerate_id(true);
                    $_SESSION['user_name']=$user_name;
                    mkdir("./upImages/{$user_name}",0755);
                }
            }catch(PDOExeption $e){
                $errorMessage="データベースエラー";
                echo $e->getMessage();
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
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>アカウント登録画面</title>
<script src="js/inputPlus.js"></script>
<script src="js/nav.js"></script>
<link rel="stylesheet" href="css/union.css" >
<link rel="stylesheet" href="css/signUp.css" >
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
        <?php
            if(isset($_SESSION['user_name'])) {
        ?>
            <li id="mypage"><a href="mypage.php" ><span class="img"><img id="nav" src="images/mypage.svg" alt="マイページ"></span><span class="moji">マイページ</span></a></li>
        <?php    
            }
        ?>
        </ul>
    </nav>
</header>
<main>
    <h2 id="noLegend">新規アカウント登録画面</h2>
        <form name="loginForm" action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
            <fieldset id="noLegend">
            <div id="message"><?=$signUpMessage?></div>
        <?php
            if ($uerr){
        ?>
                <div>
                    <p><span class="required">＊</span>マークは入力必須項目です。</p>
                    <label for="user_name">アカウント名<span class="required">＊</span></label><input type="text" name="user_name" pattern="^(?![_\.])(?!.*[_\.]$)[A-Za-z0-9._]+$" minlength="5" maxlength="20" placeholder="英数字と記号( . _ )を含む5文字以上20文字以内" title="英数字と記号( . _ )を含む6文字以上20文字以内で入力してください。記号は最初と最後の文字には使えません。" required autofocus ></br>
                    <label for="password">パスワード<span class="required">＊</span></label><input type="password" name="password" pattern="^[A-Za-z\d!$%@]+$" minlength="8" placeholder="英数字と記号( ! $ @ % )を含む8文字以上" title="英数字と記号( ! $ @ % )を含む8文字以上で入力してください。" required><br>
                    <label for="password2">パスワード(確認用)<span class="required">＊</span></label><input type="password" name="password2" pattern="^[A-Za-z\d!$%@]+$" minlength="8" title="英数字と記号( ! $ @ % )を含む8文字以上で入力してください。" required><br>
                    <div id="error">
                        <?=$errorMessage?>
                    </div>
                </div>
                <div id="inputBox">
                    <label id="kodomo_name" for="kodomo_name">こどもの名前<span class="required">＊</span></label><input id="kName" type="text" name="kodomo_name[]" required><br>
                    <label for="birthday">こどもの誕生日<span class="required">＊</span></label><input id="bDay" type="date" name="birthday[]" required><br>
                </div>
                <div id="buttonBox">
                    <button id="create" type="button" id="create">＋</button>
                    <button id="del" type="button" id="del">ー</button><br>
                </div>
                <button type="submit" name="signUp" value="新規登録">新規登録</button>
        <?php
            }
        ?>
            </fieldset>
        </form>
</main>
</body>
</html>
