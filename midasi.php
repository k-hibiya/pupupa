<?php
function midasi($data1, $data2, $data3) {
    if($data1 == "youjigo") {
        $midasi = "<span>ようじ語</span><span>・";
    }else if($data1 == "kana") {
        $midasi = "<span>おとな語</span><span>・";
    }

    if($data2 == "すべて") {
        $midasi = $midasi."すべて<span>・";
    }else if($data2 == "あ") {
        $midasi = $midasi."<span>あ</span><span>・";
    }else if($data2 == "い") {
        $midasi = $midasi."<span>い</span><span>・";
    }else if($data2 == "う") {
        $midasi = $midasi."<span>う</span><span>・";
    }else if($data2 == "え") {
        $midasi = $midasi."<span>え</span><span>・";
    }else if($data2 == "お") {
        $midasi = $midasi."<span>お</span><span>・";
    }else if($data2 == "か行") {
        $midasi = $midasi."<span>か</span><span>・";
    }else if($data2 == "き") {
        $midasi = $midasi."<span>き</span><span>・";
    }else if($data2 == "く") {
        $midasi = $midasi."<span>く</span><span>・";
    }else if($data2 == "け") {
        $midasi = $midasi."<span>け</span><span>・";
    }else if($data2 == "こ") {
        $midasi = $midasi."<span>こ</span><span>・";
    }else if($data2 == "さ") {
        $midasi = $midasi."<span>さ</span><span>・";
    }else if($data2 == "し") {
        $midasi = $midasi."<span>し</span><span>・";
    }else if($data2 == "す") {
        $midasi = $midasi."<span>す</span><span>・";
    }else if($data2 == "せ") {
        $midasi = $midasi."<span>せ</span><span>・";
    }else if($data2 == "そ") {
        $midasi = $midasi."<span>そ</span><span>・";
    }else if($data2 == "た") {
        $midasi = $midasi."<span>た</span><span>・";
    }else if($data2 == "ち") {
        $midasi = $midasi."<span>ち</span><span>・";
    }else if($data2 == "つ") {
        $midasi = $midasi."<span>つ</span><span>・";
    }else if($data2 == "て") {
        $midasi = $midasi."<span>て</span><span>・";
    }else if($data2 == "と") {
        $midasi = $midasi."<span>と</span><span>・";
    }else if($data2 == "な") {
        $midasi = $midasi."<span>な</span><span>・";
    }else if($data2 == "に") {
        $midasi = $midasi."<span>に</span><span>・";
    }else if($data2 == "ぬ") {
        $midasi = $midasi."<span>ぬ</span><span>・";
    }else if($data2 == "ね") {
        $midasi = $midasi."<span>ね</span><span>・";
    }else if($data2 == "の") {
        $midasi = $midasi."<span>の</span><span>・";
    }else if($data2 == "は") {
        $midasi = $midasi."<span>は</span><span>・";
    }else if($data2 == "ひ") {
        $midasi = $midasi."<span>ひ</span><span>・";
    }else if($data2 == "ふ") {
        $midasi = $midasi."<span>ふ</span><span>・";
    }else if($data2 == "へ") {
        $midasi = $midasi."<span>へ</span><span>・";
    }else if($data2 == "ほ") {
        $midasi = $midasi."<span>ほ</span><span>・";
    }else if($data2 == "ま") {
        $midasi = $midasi."<span>ま</span><span>・";
    }else if($data2 == "み") {
        $midasi = $midasi."<span>み</span><span>・";
    }else if($data2 == "む") {
        $midasi = $midasi."<span>む</span><span>・";
    }else if($data2 == "め") {
        $midasi = $midasi."<span>め</span><span>・";
    }else if($data2 == "も") {
        $midasi = $midasi."<span>も</span><span>・";
    }else if($data2 == "や") {
        $midasi = $midasi."<span>や</span><span>・";
    }else if($data2 == "ゆ") {
        $midasi = $midasi."<span>ゆ</span><span>・";
    }else if($data2 == "よ") {
        $midasi = $midasi."<span>よ</span><span>・";
    }else if($data2 == "ら") {
        $midasi = $midasi."<span>ら</span><span>・";
    }else if($data2 == "り") {
        $midasi = $midasi."<span>り</span><span>・";
    }else if($data2 == "る") {
        $midasi = $midasi."<span>る</span><span>・";
    }else if($data2 == "れ") {
        $midasi = $midasi."<span>れ</span><span>・";
    }else if($data2 == "ろ") {
        $midasi = $midasi."<span>ろ</span><span>・";
    }else if($data2 == "わ") {
        $midasi = $midasi."<span>わ</span><span>・";
    }else if($data2 == "を") {
        $midasi = $midasi."<span>を</span><span>・";
    }else if($data2 == "ん") {
        $midasi = $midasi."<span>ん</span><span>・";
    }

    if($data3 == "post_date") {
        $midasi = $midasi."<span>新着順</span>";
    }else if($data3 == "asc") {
        $midasi = $midasi."<span>あいうえお順</span>";
    }
    return $midasi;

}
    