drop database pupupa;

create database pupupa;

use pupupa;

create table user(
    user_id int primary key auto_increment,
    user_name varchar(60) not null,
    password_hash varchar(255) not null,
    is_public boolean default true not null,
    is_active boolean default true not null
);

desc user;

create table kodomo(
    kodomo_id int primary key auto_increment,
    user_id int not null,
    kodomo_name varchar(60) not null,
    birthday date not null,
    foreign key(user_id) references user(user_id)
);

desc kodomo;

create table age(
    age_id int primary key auto_increment,
    age varchar(60) not null
);

desc age;

create table main(
    main_id int primary key auto_increment,
    user_id int not null,
    kodomo_id int not null,
    youjigo varchar(60) not null,
    otonago varchar(60) not null,
    kana varchar(60) not null,
    photo text default null,
    caption varchar(300) default null,
    age_id int not null,
    posted_at datetime not null default current_timestamp,
    updated_at datetime not null default current_timestamp on update current_timestamp,
    is_deleted boolean not null default false,
    foreign key(user_id) references user(user_id),
    foreign key(kodomo_id) references kodomo(kodomo_id),
    foreign key(age_id) references age(age_id)
    );

desc main;

create table follow(
    follow_id int primary key auto_increment,
    followee_id int not null,
    follower_id int not null,
    follow_status boolean not null default false,
    is_requested boolean not null default false,
    foreign key(followee_id) references user(user_id),
    foreign key(follower_id) references user(user_id)
);

desc follow;

create table admin_kanri(
    admin_id int primary key auto_increment,
    admin_name varchar(60) not null,
    admin_password_hash varchar(255) not null,
    is_superadmin boolean not null default false
);

desc admin_kanri;


insert into user (user_name, password_hash) values('hibiya','パスワード' );
insert into user (user_name, password_hash) values('isono','$2y$10$ToFVT7d5QwPg69pTzRgA9.YoFUCrvBLNdPpvjlRmETEz5CUt/kwfe' );
insert into user (user_name, password_hash) values('huguta','$2y$10$cCNM.qo/MxzYMUDREjNCY.c89u3IEH8H7HlW1yDIYSasbiBme2I0.' );

select * from user;


insert into kodomo (user_id, kodomo_name, birthday) values(1,'あんじ','2021/08/18');
insert into kodomo (user_id, kodomo_name, birthday) values(2,'サザエ','1971/04/01');
insert into kodomo (user_id, kodomo_name, birthday) values(2,'カツオ','1981/04/01');
insert into kodomo (user_id, kodomo_name, birthday) values(2,'ワカメ','1984/04/01');
insert into kodomo (user_id, kodomo_name, birthday) values(3,'タラオ','1993/04/01');

select * from kodomo;


insert into age (age) values('0才6ヶ月');
insert into age (age) values('0才7ヶ月');
insert into age (age) values('0才8ヶ月');
insert into age (age) values('0才9ヶ月');
insert into age (age) values('0才10ヶ月');
insert into age (age) values('0才11ヶ月');
insert into age (age) values('1才0ヶ月');
insert into age (age) values('1才1ヶ月');
insert into age (age) values('1才2ヶ月');
insert into age (age) values('1才3ヶ月');
insert into age (age) values('1才4ヶ月');
insert into age (age) values('1才5ヶ月');
insert into age (age) values('1才6ヶ月');
insert into age (age) values('1才7ヶ月');
insert into age (age) values('1才8ヶ月');
insert into age (age) values('1才9ヶ月');
insert into age (age) values('1才10ヶ月');
insert into age (age) values('1才11ヶ月');
insert into age (age) values('2才0ヶ月');
insert into age (age) values('2才1ヶ月');
insert into age (age) values('2才2ヶ月');
insert into age (age) values('2才3ヶ月');
insert into age (age) values('2才4ヶ月');
insert into age (age) values('2才5ヶ月');
insert into age (age) values('2才6ヶ月');
insert into age (age) values('2才7ヶ月');
insert into age (age) values('2才8ヶ月');
insert into age (age) values('2才9ヶ月');
insert into age (age) values('2才10ヶ月');
insert into age (age) values('2才11ヶ月');
insert into age (age) values('3才0ヶ月');
insert into age (age) values('3才1ヶ月');
insert into age (age) values('3才2ヶ月');
insert into age (age) values('3才3ヶ月');
insert into age (age) values('3才4ヶ月');
insert into age (age) values('3才5ヶ月');
insert into age (age) values('3才6ヶ月');
insert into age (age) values('3才7ヶ月');
insert into age (age) values('3才8ヶ月');
insert into age (age) values('3才9ヶ月');
insert into age (age) values('3才10ヶ月');
insert into age (age) values('3才11ヶ月');

select * from age;


insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'くんくんちゃっ','くんくんちゃっ','くんくんちゃっ','114.jpeg','一人で遊んでいてゴキゲンな時、「くんくんちゃっ」と繰り返し言っていた。',8,'2023/09/28','2023/09/28' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'じゃず','ジャズ','じゃず','113.jpeg','よくカセットテープでジャズをかけていたので、カセットのことをジャズだと思っていたみたい。しばらくカセットのことを「じゃず」と言っていた。',8,'2023/09/29','2023/09/29' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'ばぶん','バク','ばく','112.jpeg','多摩動物公園のマレーバクのことを「ばぶん」と言っていた。',9,'2023/09/30','2023/09/30' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'ぷぷぱ','トマト','とまと','32.jpeg','大好きなトマトのことを「ぷぷぱ」と言っていた。一文字も合ってなくてとてもいい。',9,'2023/10/1','2023/10/1' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'みーま','みかん','みかん','152.jpeg','最初は「みーま」だったが、そのうち「みかか」に変わった。',10,'2023/10/2','2023/10/2' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ぶーばー','ブルドーザー','ぶるどーざー','131.jpeg','',10,'2023/10/3','2023/10/3' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'まうま','シマウマ','しまうま','124.jpeg','馬のことも「まうま」と言っていた。',11,'2023/10/4','2023/10/4' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'ぱっかぱっか','馬','うま','75.jpeg','',11,'2023/10/5','2023/10/5' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'はーぽ','ハート','はーと','104.jpeg','鳩のことは「はぽ」と言っていた。',12,'2023/10/6','2023/10/6' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'ばぶ','バス','ばす','109.jpeg','写真は多摩動物公園のライオンバスを見ている二人。',12,'2023/10/7','2023/10/7' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'はかか','魚','さかな','58.jpeg','水槽の魚を見て「はかかっ！」と言って興奮していた。',13,'2023/10/8','2023/10/8' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'ちーち','ちーず','ちーず','176.jpeg','',13,'2023/10/9','2023/10/9' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'じーてんしゃ','自転車','じてんしゃ','179.jpeg','',14,'2023/10/10','2023/10/10' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'はぽ','ハト','はと','18.jpeg','ハートのことは「はーぽ」と言っていた。',14,'2023/10/11','2023/10/11' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'ぱ','パンダ','ぱんだ','149.jpeg','パンダもパンも「ぱ」だった。',15,'2023/10/12','2023/10/12' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ぱ','パン','ぱんだ','81.jpeg','パンもパンダも「ぱ」だった。',15,'2023/10/13','2023/10/13' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'ば','バナナ','ばなな','1.jpeg','',16,'2023/10/14','2023/10/14' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'ちゃーちゃ','お茶','おちゃ','3.jpeg','',16,'2023/10/15','2023/10/15' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'ぱーぱー','パトカー','ぱとかー','45.jpeg','',17,'2023/10/16','2023/10/16' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'へぱ','ヘリコプター','へりこぷたー','191.jpeg','',17,'2023/10/17','2023/10/17' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'えべたー','エレベーター','えれべーたー','7.jpeg','',18,'2023/10/18','2023/10/18' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'がおー','ライオン','らいおん','6.jpeg','',18,'2023/10/19','2023/10/19' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'ぱおー','ゾウ','ぞう','34.jpeg','',19,'2023/10/20','2023/10/20' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'あい','アリ','あり','42.jpeg','',19,'2023/10/21','2023/10/21' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'たぽぽ','タンポポ','たんぽぽ','12.jpeg','',20,'2023/10/22','2023/10/22' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'はち','橋','はし','13.jpeg','',20,'2023/10/23','2023/10/23' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'かあか','お母さん','おかあさん','157.jpeg','',21,'2023/10/24','2023/10/24' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'とぅーとぅ','お父さん','おとうさん','16.jpeg','',21,'2023/10/25','2023/10/25' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'もーもー','牛','うし','97.jpeg','ヒノトントンZOOの羊です。',22,'2023/10/26','2023/10/26' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'あめ','雨','あめ','43.jpeg','',22,'2023/10/27','2023/10/27' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ぴーぴ','テレビ','てれび','103.jpeg','この頃は立って柵越しに「ぴーぴ」を見ていた。柵を噛んだり舐めたりしながら。',23,'2023/10/28','2023/10/28' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'あにゃにゃ','携帯電話','けいたいでんわ','4.jpeg','まったく言えてなかったけど気持ちだけで言葉にしていた。',23,'2023/10/29','2023/10/29' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'うーうー','消防車','しょうぼうしゃ','56.jpeg','',24,'2023/10/30','2023/10/30' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'がーがー','ゴミ収集車','ごみしゅうしゅうしゃ','40.jpeg','',24,'2023/10/31','2023/10/31' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'うー','クマ','くま','21.jpeg','',25,'2023/11/1','2023/11/1' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'くぱ','クマ','くま','48.jpeg','',25,'2023/11/2','2023/11/2' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'ちょちょ','チョウチョ','ちょうちょ','154.jpeg','多摩動物公園昆虫館にて',26,'2023/11/3','2023/11/3' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'だっく','抱っこ','だっこ','120.jpeg','',26,'2023/11/4','2023/11/4' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'おんまい','おっぱい','おっぱい','5.jpeg','',27,'2023/11/5','2023/11/5' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'めーめー','ヒツジ','ひつじ','158.jpeg','東武動物公園の羊と。',27,'2023/11/6','2023/11/6' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'ぶーぶ','車','くるま','156.jpeg','東武動物公園にて。動物を見るよりもモルカーに乗った時が一番楽しそうだった。',8,'2023/11/9','2023/11/9' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'かーだん','階段','かいだん','141.jpeg','階段を降りたり登ったりするのが大好き。',8,'2023/11/10','2023/11/10' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'はかく','三角','さんかく','105.jpeg','外を歩いていて、三角の止まれの標識を見ると「はかくっ」と言っていた。',8,'2023/11/11','2023/11/11' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ぐーにゅう','牛乳','ぎゅうにゅう','47.jpeg','',9,'2023/11/12','2023/11/12' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'んーご','リンゴ','りんご','69.jpeg','',9,'2023/11/13','2023/11/13' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'たーちゃん','トラ','とら','151.jpeg','虎の写真はありませんでした。',9,'2023/11/14','2023/11/14' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'はぱ','葉っぱ','はっぱ','155.jpeg','葉っぱを持って帰りたがる。',10,'2023/11/15','2023/11/15' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'なっとぅ','納豆','なっとう','8.jpeg','',10,'2023/11/16','2023/11/16' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'にんにん','ニンジン','にんじん','83.jpeg','',10,'2023/11/17','2023/11/17' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'ほーく','フォーク','ふぉーく','46.jpeg','',11,'2023/11/18','2023/11/18' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'かえ','カエル','かえる','57.jpeg','',11,'2023/11/19','2023/11/19' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'ぱぱぱ','ウサギ','うさぎ','50.jpeg','まったく言えてなかったけど気持ちだけで言葉にしていた。',11,'2023/11/20','2023/11/20' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'ば','お化け','おばけ','73.jpeg','',12,'2023/11/21','2023/11/21' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'あかちゃん','赤ちゃん','あかちゃん','49.jpeg','これは幼児語じゃないけど、「あかちゃん」は初めから普通に言えていて驚いたので記録として。',12,'2023/11/22','2023/11/22' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'たくくー','タクシー','たくしー','14.jpeg','',13,'2023/11/23','2023/11/23' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'くっく','フクロウ','ふくろう','106.jpeg','',13,'2023/11/24','2023/11/24' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'ぺんぺん','ペンギン','ぺんぎん','70.jpeg','',14,'2023/11/25','2023/11/25' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'はく','箱','はこ','102.jpeg','',14,'2023/11/26','2023/11/26' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'じゃーいー','じゃーねー','じゃーねー','52.jpeg','',14,'2023/11/27','2023/11/27' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'みん','ミント','みんと','41.jpeg','マンションの花壇に植えてあるミントの葉っぱを指で擦って、その指の匂いを嗅ぐのが好き。いつも嬉しそうに「いい匂い」と言う。',15,'2023/11/28','2023/11/28' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'きいろ','きいろ','きいろ','49.jpeg','これは幼児語じゃないけど、「きいろ」は初めから言えていたので記念に。',15,'2023/11/29','2023/11/29' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'てぃっちょ','ティッシュ','てぃっしゅ','39.jpeg','',15,'2023/11/30','2023/11/30' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'もっん','もっと','もっと','15.jpeg','',16,'2023/12/1','2023/12/1' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'いやいい','いやだ','いやだ','9.jpeg','多分、否定の肯定。',16,'2023/12/2','2023/12/2' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'くぽ','蜘蛛','くも','44.jpeg','',17,'2023/12/3','2023/12/3' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'べび','ベビーダノン','べびーだのん','86.jpeg','カップのこども用ヨーグルトのこと。',17,'2023/12/4','2023/12/4' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'みかか','みかん','みかん','35.jpeg','「みかか」の前は「みーま」だった。',18,'2023/12/5','2023/12/5' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'だじょぶ','大丈夫','だいじょうぶ','54.jpeg','',18,'2023/12/6','2023/12/6' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'あち','足','あし','51.jpeg','',19,'2023/12/7','2023/12/7' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'み','ゴミ','ごみ','27.jpeg','',19,'2023/12/8','2023/12/8' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'どおちだ','どっちだ','どっちだ','74.jpeg','',19,'2023/12/9','2023/12/9' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'いっかっせ','新幹線','しんかんせん','65.jpeg','',20,'2023/12/10','2023/12/10' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'おんごこ','音楽','おんがく','17.jpeg','',20,'2023/12/11','2023/12/11' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'じー','おいしい','おいしい','59.jpeg','',21,'2023/12/12','2023/12/12' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'かいう','借りる','かりる','20.jpeg','',21,'2023/12/13','2023/12/13' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'おーぐう','ヨーグルト','よーぐると','140.jpeg','２歳の誕生日にお母さんがパンケーキとヨーグルトで作ってくれたケーキ。初めてのケーキでとても喜んでいた。',22,'2023/12/14','2023/12/14' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'あんに','あんじ','あんじ','123.jpeg','自分の名前を「あんに」と言っていた。',22,'2023/12/15','2023/12/15' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'ばーちゃっ','ごちそうさまでした','ごちそうさまでした','84.jpeg','',23,'2023/12/16','2023/12/16' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ぱーちー','パーシー','ぱーしー','98.jpeg','機関車トーマスのキャラクター名。',23,'2023/12/17','2023/12/17' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'んーばつ','トーマス','とーます','148.jpeg','機関車トーマスのキャラクター名。',24,'2023/12/18','2023/12/18' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'んーばぶ','トーマス','とーます','160.jpeg','機関車トーマスのキャラクター名。',24,'2023/12/19','2023/12/19' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'んまぷ','トーマス','とーます','121.jpeg','機関車トーマスのキャラクター名。',25,'2023/12/20','2023/12/20' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'んまむ','トーマス','とーます','118.jpeg','機関車トーマスのキャラクター名。',25,'2023/12/21','2023/12/21' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'きっ','好き','すき','150.jpeg','',26,'2023/12/22','2023/12/22' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'まっ','車','くるま','162.jpeg','',26,'2023/12/23','2023/12/23' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'みろり','緑','みどり','87.jpeg','',27,'2023/12/24','2023/12/24' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'じぇーぶぷ','ジェームス','じぇーむす','79.jpeg','機関車トーマスのキャラクター名。',8,'2023/12/25','2023/12/25' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'あんじーも','あんじも','あんじも','135.jpeg','あんじは自分の名前。「自分も」と言う意味。',8,'2023/12/26','2023/12/26' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'はちる','走る','はしる','92.jpeg','',9,'2023/12/27','2023/12/27' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'みゆ','見る','みる','164.jpeg','おみくじを見るどんぐり。',9,'2023/12/28','2023/12/28' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'えみいー','エミリー','えみりー','99.jpeg','機関車トーマスのキャラクター名',9,'2023/12/29','2023/12/29' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'くお','黒','くろ','95.jpeg','',10,'2023/12/30','2023/12/30' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'おわい','終わり','おわり','93.jpeg','',10,'2023/12/31','2023/12/31' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'はあくうー、まあー','働くくるーまー','はたらくくるーまー','88.jpeg','はたらくくるまという歌のサビの部分。',11,'2024/01/1','2024/01/1' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'ぴーたー','スペンサー','すぺんさー','110.jpeg','機関車トーマスのキャラクター名',11,'2024/01/2','2024/01/2' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'へんいー','ヘンリー','へんりー','117.jpeg','機関車トーマスのキャラクター名',11,'2024/01/3','2024/01/3' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'よーと','ヨーグルト','よーぐると','111.jpeg','',12,'2024/01/4','2024/01/4' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'あいとう','ありがとう','ありがとう','89.jpeg','',12,'2024/01/5','2024/01/5' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ぶーぶーたん','ブタさん','ぶたさん','96.jpeg','ヒノトントンZOOの羊です。',13,'2024/01/6','2024/01/6' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'とぅき','好き','すき','77.jpeg','',13,'2024/01/7','2024/01/7' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'だいとぅき','大好き','だいすき','33.jpeg','',14,'2024/01/8','2024/01/8' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'おちゃまん','SLマン','えすえるまん','125.jpeg','アンパンマンのキャラクター',14,'2024/01/9','2024/01/9' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'はいどう','はいどうぞ','はいどうぞ','55.jpeg','',15,'2024/01/10','2024/01/10' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ぷあえーゆ','プラレール','ぷられーる','67.jpeg','電車のおもちゃ。プラレールは実家にしかない。プラレールで遊びたいがために、やたら実家に行きたがる。',15,'2024/01/11','2024/01/11' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'とにか','トミカ','とみか','116.jpeg','車のおもちゃ。たまにお母さんとお父さんがクレーンゲームでとってくる。',15,'2024/01/12','2024/01/12' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'おかんたん','お母さん','おかあさん','11.jpeg','',16,'2024/01/13','2024/01/13' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'おとんたん','お父さん','おとうさん','172.jpeg','',16,'2024/01/14','2024/01/14' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'まっくな','真っ暗','まっくら','90.jpeg','',16,'2024/01/15','2024/01/15' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'はいっちう','入っている','はいっている','165.jpeg','',17,'2024/01/16','2024/01/16' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'はいちゅう','入っている','はいっている','100.jpeg','',17,'2024/01/17','2024/01/17' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'ぼーの','ボーロ','ぼーろ','122.jpeg','',18,'2024/01/18','2024/01/18' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'ぬわない','言わない','いわない','132.jpeg','',18,'2024/01/19','2024/01/19' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'どんぐいこのこの','どんぐりころころ','どんぐりころころ','91.jpeg','この頃からどんぐりブームが始まった。どんぐりの中にゾウムシの幼虫がいないか、毎日どんぐりチェックをしていた。',19,'2024/01/20','2024/01/20' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ほいたー','ショベルカー','しょべるかー','138.jpeg','',19,'2024/01/21','2024/01/21' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'とぅてる','捨てる','すてる','153.jpeg','',20,'2024/01/22','2024/01/22' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'ぐんとーたま','ごちそうさま','ごちそうさまでした','80.jpeg','',20,'2024/01/23','2024/01/23' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'あないもの','あらいもの','あらいもの','85.jpeg','',21,'2024/01/24','2024/01/24' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'あそぶーの','遊ぶの','あそぶの','169.jpeg','よくこのバケツの中に入って「落ち着くの」と言っていた。',22,'2024/01/25','2024/01/25' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'くぱ','フタ','ふた','134.jpeg','',23,'2024/01/26','2024/01/26' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'とっとったっとっとー','トップハムハット卿','とっぷはむはっときょう','121.jpeg','機関車トーマスのキャラクター名。鉄道会社の社長。',23,'2024/01/27','2024/01/27' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'きみどぅおり','黄緑','きみどり','107.jpeg','たまに文字数が増える時がある。',24,'2024/01/28','2024/01/28' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'どいやーっ','どいやーっ','どいやーっ','128.jpeg','機嫌がいい時の雄叫び。元ネタはわからない。',24,'2024/01/29','2024/01/29' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'むち','虫','むし','171.jpeg','',25,'2024/01/30','2024/01/30' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'まつどんぐり','松ぼっくり','まつぼっくり','126.jpeg','いい',26,'2024/01/31','2024/01/31' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'えぬえーしっくす','NSX','えぬえすえっくす','145.jpeg','ホンダの車の名前',27,'2024/02/1','2024/02/1' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'もういっかいがいい','もう一回','もういっかい','129.jpeg','',8,'2024/02/2','2024/02/2' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'ぎんっ','ぎんっ','ぎんっ','94.jpeg','一人で遊んで興奮しているときによく言っていた。多分はじまりバーンと言う歌の「がんごんぎんがんごん」という歌詞の短縮バージョン。',8,'2024/02/3','2024/02/3' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'がんごんぎんがんごん','がんごんぎんがんごん','がんごんぎんがんごん','89.jpeg','はじまりバーンという歌の歌詞。興奮しているときによく言っていた。',9,'2024/02/4','2024/02/4' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'さんちゅー','サンキュー','さんきゅー','38.jpeg','',10,'2024/02/5','2024/02/5' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'とれたい','とりたい','とりたい','53.jpeg','',11,'2024/02/6','2024/02/6' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'おりて','椅子から立って','いすからたって','161.jpeg','お母さんとお父さんがご飯を食べている時でも「おりてっ！」と言って無理やり椅子を奪っていく。家なのに立ち食いさせられることがよくあった。',12,'2024/02/7','2024/02/7' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'ちゅき','好き','すき','133.jpeg','',12,'2024/02/8','2024/02/8' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'ばんがって','がんばって','がんばって','144.jpeg','',13,'2024/02/9','2024/02/9' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'はなつ','離す','はなす','139.jpeg','',13,'2024/02/10','2024/02/10' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'えべーとと','エベレスト','えべれすと','136.jpeg','パウパトロールのキャラクター名',14,'2024/02/11','2024/02/11' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'ばくしい','爆睡','ばくすい','76.jpeg','',14,'2024/02/12','2024/02/12' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'じっちゃん','りっちゃん','りっちゃん','137.jpeg','友達のりっちゃんのこと',15,'2024/02/13','2024/02/13' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'じょぶえーばー','ジョブレイバー','じょぶれいばー','146.jpeg','ロボットのおもちゃ',15,'2024/02/14','2024/02/14' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'おみじゅ','お水','おみず','127.jpeg','',16,'2024/02/15','2024/02/15' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'はんかちばさみ','洗濯バサミ','せんたくばさみ','170.jpeg','松ぼっくりを「まつどんぐり」と言っていたパターンと似ている。',16,'2024/02/16','2024/02/16' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'はぐ','早く','はやく','119.jpeg','興奮して急かす時に言っていた',17,'2024/02/17','2024/02/17' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'おちゃま','お日様','おひさま','108.jpeg','',18,'2024/02/18','2024/02/18' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'えーぶいしー','ABC','えーびーしー','78.jpeg','英語を見ると嬉しそうに指差して「えーぶいしーが書いてあるよ」と言っていた。',19,'2024/02/19','2024/02/19' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'やだの','やなの','やなの','166.jpeg','',20,'2024/02/20','2024/02/20' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'どいえるごみ','燃えるゴミ','もえるごみ','101.jpeg','文字数が増えるパターン。いい。',21,'2024/02/21','2024/02/21' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'ないすりーむ','アイスクリーム','あいすくりーむ','36.jpeg','',22,'2024/02/22','2024/02/22' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'ないすくりーむ','アイスクリーム','あいすくりーむ','141.jpeg','',22,'2024/02/23','2024/02/23' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'しゅいぞう','修理場','しゅうりじょう','167.jpeg','写真はクリスマスにもらったガソリンスタンドのおもちゃ。とても気に入っていて、飽きずに遊んでいる。',23,'2024/02/24','2024/02/24' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'いすぼっこ','イスごっこ','いすごっこ','163.jpeg','二つのイスを並べて二人で座るだけの遊びだった。',24,'2024/02/25','2024/02/25' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,2,'ちゅうい','キウイ','きうい','22.jpeg','',25,'2024/02/26','2024/02/26' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,3,'こちょう','故障','こしょう','130.jpeg','いつからか、あんじくんロボットというロボットに変身する様になり、「あんじくんロボットは、こちょうちまちたっ」とよく言っていた。その度に直してあげていた。',25,'2024/02/27','2024/02/27' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(2,4,'おにんじょう','お人形','おにんぎょう','147.jpeg','',26,'2024/02/28','2024/02/28' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(3,5,'こうちょくどうろ','高速道路','こうそくどうろ','143.jpeg','',27,'2024/02/29','2024/02/29' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ちょーてて','気をつけて','きをつけて','174.jpeg','',27,'2024/03/1','2024/03/1' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'べんちょー','勉強','べんきょう','180.JPEG','お父さんがよくパソコンで勉強していたので、パソコンのことを「べんちょー」だと思っていた。よく「あんじもべんちょーしたい」と言って邪魔してきた。仕方ないから、写真を矢印キーで見させていた。嬉しそうに矢印キーを押すのがかわいかったが、邪魔だった。',28,'2024/03/2','2024/03/2' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'もんたーとらっく','モンスタートラック','もんすたーとらっく','211.JPEG','このタイプの乗り物に乗りたがるが、乗ったらすごい怖がる。',28,'2024/03/3','2024/03/3' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'さぼさん','サボテン','さぼてん','115.JPEG','サボさんは”みいつけた！”のキャラクター。お父さんが大事にしているサボテンのこともサボさんと言う。',28,'2024/03/4','2024/03/4' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'でしゃ','電車','でんしゃ','210.JPEG','',28,'2024/03/5','2024/03/5' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'べびか','ベビーカー','べびーかー','224.JPEG','',28,'2024/03/6','2024/03/6' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'こえ','これ','これ','218.JPEG','',28,'2024/03/7','2024/03/7' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'はおうど','ハロルド','はろるど','222.JPEG','機関車トーマスのキャラクター。ヘリコプター。',28,'2024/03/8','2024/03/8' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'くいふましゅ','クリスマス','くりすます','229.JPEG','',28,'2024/03/9','2024/03/9' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'かくえんぼ','隠れんぼ','かくれんぼ','173.jpeg','',28,'2024/03/10','2024/03/10' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ふあみんご','フラミンゴ','ふらみんご','214.JPEG','',28,'2024/03/11','2024/03/11' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'もういいかい','隠れんぼ','かくれんぼ','198.JPEG','よく「もういいかいちたい」と言って隠れんぼに付き合わされる。',28,'2024/03/12','2024/03/12' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'とぅわる','座る','すわる','215.JPEG','',28,'2024/03/13','2024/03/13' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ちゅーちゅーしゃ','救急車','きゅうきゅうしゃ','217.JPEG','',28,'2024/03/14','2024/03/14' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'れんけちゅ','連結','れんけつ','209.JPEG','',28,'2024/03/15','2024/03/15' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'むちぱん','蒸しパン','むしぱん','206.JPEG','自然食品屋で買う割高の蒸しパンが大好き。',29,'2024/03/16','2024/03/16' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'くっちょん','クッション','くっしょん','201.JPEG','',29,'2024/03/17','2024/03/17' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'あちゃ','朝','あさ','199.jpeg','',29,'2024/03/18','2024/03/18' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'まくどなりて','マクドナルド','まくどなるど','178.JPEG','パウパトロールの合間のCMでマクドナルドを覚えた。',29,'2024/03/19','2024/03/19' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'にんじゃ','神社','じんじゃ','187.JPEG','',29,'2024/03/20','2024/03/20' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'まつたーにょーだ','マスターヨーダ','ますたーよーだ','183.JPEG','ヨーダもかわいいけど、「まつたーにょーだ」が一番かわいい。',29,'2024/03/21','2024/03/21' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'べらんど','リビング','りびんぐ','186.JPEG','ベランダとリビングがごっちゃになっていた。',29,'2024/03/22','2024/03/22' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'りびんぶ','リビング','りびんぐ','220.JPEG','',29,'2024/03/23','2024/03/23' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'まっきくんてーぷ','マスキングテープ','ますきんぐてーぷ','193.JPEG','',29,'2024/03/24','2024/03/24' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'はで','口で','くちで','188.JPEG','',29,'2024/03/25','2024/03/25' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'はからおんがくだちて','口で歌って','くちでうたって','200.JPEG','',29,'2024/03/26','2024/03/26' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ぶいかん','分解','ぶんかい','142.jpeg','',29,'2024/03/27','2024/03/27' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'デラックス','リラックス','りらっくす','182.JPEG','',29,'2024/03/28','2024/03/28' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'てまえまえ','手前','てまえ','177.JPEG','',29,'2024/03/29','2024/03/29' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ざんばい','バンザイ','ばんざい','191.JPEG','',29,'2024/03/30','2024/03/30' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'せんたっく','洗濯機','せんたくき','72.jpeg','',29,'2024/03/31','2024/03/31' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'しゃちん','写真','しゃしん','202.JPEG','',29,'2024/04/1','2024/04/1' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'はっぴーせっとやさん','マクドナルド','まくどなるど','192.JPEG','',29,'2024/04/2','2024/04/2' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'あかちゃんちゃららん','あかちゃんちゃららん','あかちゃんちゃららん','196.JPEG','テンションが高い時によく「あかちゃんちゃららんっあかちゃんちゃららんっ」と繰り返しながら歩き回っていた。楽しそうだった。',29,'2024/04/3','2024/04/3' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'かんがえしてる','考えている','かんがえている','223.JPEG','',29,'2024/04/4','2024/04/4' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'おちゃやい','お野菜','おやさい','189.JPEG','',29,'2024/04/5','2024/04/5' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'まっくろくろちぇ','まっくろくろすけ','まっくろくろすけ','184.JPEG','トトロが大好き。',29,'2024/04/6','2024/04/6' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ちーとーまきまき','いーとーまきまき','いーとーまきまき','225.JPEG','',30,'2024/04/7','2024/04/7' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'あしぎみ','足踏み','あしぶみ','190.JPEG','',30,'2024/04/8','2024/04/8' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'といれっぱー','トイレットペーパー','といれっとぺーぱー','194.JPEG','トイレトレーニングを始めた頃から、テンションが高い時に「といれっぱーっといれっぱーっ！」っと叫びながら歩き回るようになった。',30,'2024/04/9','2024/04/9' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'らいぼつー','ルイボスティー','るいぼすてぃー','197.JPEG','お父さんがよく飲んでいるので覚えたらしい。',30,'2024/04/10','2024/04/10' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'かってくれたい','買ってほしい','かってほしい','181.JPEG','',30,'2024/04/11','2024/04/11' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'おんだんほどう','横断歩道','おうだんほどう','204.JPEG','',30,'2024/04/12','2024/04/12' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'めりーくりつらちゅ','メリークリスマス','めりーくりすます','168.jpeg','',30,'2024/04/13','2024/04/13' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ひなかぼっと','日向ぼっこ','ひなたぼっこ','195.JPEG','',30,'2024/04/14','2024/04/14' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'ゆうびんぽすて','郵便ポスト','ゆうびんぽすと','149.jpeg','',30,'2024/04/15','2024/04/15' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'しまつや','西松屋としまむら','にしまつやとしまむら','185.JPEG','西松屋としまむらがごっちゃになって裏稼業っぽくなってしまった。',30,'2024/04/16','2024/04/16' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'あじまじろ','アルマジロ','あるまじろ','216.JPEG','',30,'2024/04/17','2024/04/17' );
insert into main (user_id, kodomo_id, youjigo, otonago, kana, photo, caption, age_id, posted_at, updated_at) values(1,1,'かんがえをみつけた','思いついた','おもいついた','227.JPEG','自分で工夫して知ってる言葉を組み合わせて、それでなんとなく伝わるからすごいと思った。',30,'2024/04/18','2024/04/18' );

select * from main;

insert into admin_kanri (admin_name, admin_password_hash, is_superadmin) values('hibiya', 'パスワード', 1);

select * from admin_kanri;