<?php
    function connect(){
        $dsn = 'ホスト名';
        $user = 'ユーザー名';
        $password = 'パスワード';
        return new PDO($dsn, $user, $password);
    } 
    function hsc($data){
        return htmlspecialchars($data, ENT_QUOTES);
    }