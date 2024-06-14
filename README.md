# <span style="font-size:0.7em;">投稿型幼児語辞典</span>　PUPUPA

<div style="padding-inline:2em;">
<span style="font-size:0.8em;">下記リンクからPUPUPAをご覧いただけます。</span><br>

https://pupupa-d119a4395321.herokuapp.com/index.php<br>
<span style="font-size:0.8em;">ソースコードは下記リンクからご覧いただけます。</span><br>
https://github.com/k-hibiya/pupupa/tree/master
</div>

## コンセプト
<div style="padding-inline-start:1.5em;">

### PUPUPA（ぷぷぱ）とは？
<div style="padding-inline-start:1em;">
PUPUPAは「こどもが何て言っているのかわからない！」そんな幼児語の“困った”を解決する投稿型の幼児語辞典アプリです。
</div>

### 幼児語とは？
<div style="padding-inline-start:1em;">
“あー”や“うー”のような喃語を話す時期を経て、幼児が発する言葉の総称または俗称。
<br>未完成で、とても自由な言葉です。
</div>

### 背景
<div style="padding-inline-start:1em;">
こどもの発育にはそれぞれ違いがありますが、だいたい1歳を過ぎた頃から意味のある言葉を話すようになります。しかし、それは大人のように正しい発音ではなく、こどもの自由な解釈で、少し変わった言葉を話します。
<br>こどもが言葉を覚えることは、とてもうれしいことです。でも、時にはこどもが何を言っているのかわからず、お互いにモヤモヤしてしまうことも少なくありません。
</div>

### 概要
+ 幼児語を検索・閲覧できる。
- アカウントを作り、幼児語を投稿することで幼児語辞典を作れる。
* 幼児語を軸に、写真や説明文を添えてこどもの成長を記録できる。
- 親アカウントの中に、こどもの人数分”こどもアカウント”を作ることができる。

### 目的
+ こどもとの会話のモヤモヤを解消する。
- 育児の楽しい部分をより楽しくする。

### 効果
+ 同じ幼児語が投稿されていれば、こどもが言っている言葉の意味を知ることができる。
+ よりこどもの言葉に耳を傾けるようになるため、こどもの言語の発達につながる。
+ 保育園や幼稚園の先生が園児の幼児語辞典を共有することができる。
+ 普段一緒に生活していないおばあちゃん・おじいちゃんや親族などが孫の幼児語辞典を共有することができる。

### 名前の由来
<div style="padding-inline-start:1em;">
息子が１歳を過ぎた頃、大好きなトマトのことを「ぷぷぱ」と言いました。元の言葉とは１文字も合っていなくて、けれども本当に自由な言葉で、とても美しいと思いました。幼児語をテーマにする上でこの出来事がとても象徴的に感じたので、この幼児語辞典に「PUPUPA」と名づけました。
</div>
</div>


<br>

## 主な仕様
<div style="padding-inline-start:1.5em;">

### 使用言語
<div style="padding-inline-start:1em;">

|HTML|CSS|PHP|JavaScript (Vanilla JavaScript)|
|---|---|---|---|
</div>

### データベース
<div style="padding-inline-start:1em;">

|MySQL|
|---|
</div>

### 制作環境
<div style="padding-inline-start:1em;">

|VSCode (Visual Studio Code)|MAMP (Macintosh, Apache, MySQL, PHP)|
|---|---|
</div>


### 実行環境
<div style="padding-inline-start:1em;">

|Heroku|
|---|
</div>

### ファイル詳細
<div style="padding-inline-start:1em;">

#### PHP
|ファイル名|CSS|詳細|
|-----|-----|-----|
|toLogin.php|←PHPのみ|ログインしていないユーザーをログイン画面(login.php)に誘導する。|
|login.php|union.css<br>login.css|ログイン画面。ログインするか、サインアップページへ誘導。|
|signUp.php|union.css<br>signUp.css|サインアップ画面。二人以上こどもがいる場合には、こどもの名前を一度に複数登録することができる。|
|connect.php|←PHPのみ|①引数としてDB接続情報を持ったPDOインスタンスを返すconnect()関数。<br>②htmlspecialchars($data, ENT_QUOTES)をhsc($data)に簡略化するためのhsc($data)関数。|
|index.php|union.css<br>formtable.css|①トップページ。公開設定が”公開”になっている全てのアカウントの投稿を閲覧・検索できる。<br>マイページ機能。公開・非公開に関わらずログイン中のユーザーの全ての投稿を検索・閲覧でき、編集もできる。|
|youjigoUp.php|union.css<br>youjigoUp.css|幼児語投稿画面。二人以上こどもがいる場合には、こどもの名前を選んで投稿する。|
|youjigoEdit.php|union.css<br>youigoEdit.css|投稿編集画面。投稿の編集と削除ができる。|
|youjigoDel.php|union.css<br>youjigoDel.css|投稿削除画面。投稿を削除した後の画面。|
|logout.php|union.css<br>logout.css|ログアウト画面。ログアウト処理をして、ログアウトした後の画面を表示。|
|acountEdit.php|union.css<br>acountEdit.css|アカウント管理画面。<br>こどもアカウントの追加・公開設定・ログアウト・アカウントの削除(退会)ができる。|
|acountDel.php|union.css<br>acountDel.css|アカウントを削除した後の確認画面。|
|midasi.php|←PHPのみ|検索方法を表示するための見出しを作成する。|
|mojiset.php|←PHPのみ|頭文字検索で、濁点や半濁点があるかを判定し、それに応じた頭文字のセットを返す。|
|imgsize.php|←PHPのみ|tableのセルの表示/非表示切り替え動作時、画像ファイルを遅延読み込み設定(loading="lazy")によるCLS発生を防止するため、ユーザーの画像保存用ディレクトリから各画像の高さを事前に取得してtdClose.jsに渡す。|
|loginToAdomin.php|←PHPのみ|管理ページへのログイン機能。|
|pupupa_admin_kanri.php|union.css<br>formtable.css|簡易的な管理機能。全ての投稿を検索・閲覧・削除できる機能。|
|youjigoEditAdmin.php|union.css<br>youigoEdit.css|全ての投稿をデータベースから削除できる機能。|
|youjigoDelAdmin.php|union.css<br>youjigoDel.css|投稿をデータベースから削除した後の確認画面。|


#### JavaScript (Vanilla JavaScript)
|ファイル名|詳細|
|-----|-----|
|nav.js|①画面遷移先のアイコンの下に下線が表示される。<br>②前の画面に戻るボタン。|
|form.js|検索フォームの表示・非表示と、検索アイコンの表示切り替え。|
|inputPlus.js|こどもの情報を入力する欄を追加する。|
|tdClose.js|①ようじ語及びおとな語をクリックした際のセルの表示/非表示を切り替え。（アカウント情報・写真・キャプションセルの開閉）<br>②tableのセルの開閉動作時、画像ファイル遅延読み込み設定(loading="lazy")によるCLS発生を防止するため、画像ファイルを表示する前に予めimgsize.phpから受け取った各画像ファイルのheightを各img要素に設定する。<br>③headerや検索方法を表示するための窓やth要素をfixedにしたため、指定したtd要素がそれらの裏に隠れてしまわないようにそれらのheight分スクロール位置をずらす。|
</div>

### データベース詳細
<div style="padding-inline-start:1em;">

#### テーブル概要
<div style="padding-inline-start:1em;">

#### <span style="font-size:1em;">userテーブル</span>
| フィールド | Field | Type  | Null | Key | Default | Extla |
|-----|-----------|--------------|------|-----|---------|-------|
| ユーザーID | user_id | int | NO | PRI | NOT NULL |  auto_increment |
| ユーザー名 | user_name | varchar(60)  | NO   |  | NOT NULL |       |
| ハッシュ化パスワード   | password_hash  | varchar(255) | YES  |  | NOT NULL |   |
| 公開設定 | is_public | boolean | no|   | DEFAULT TRUE |  |
| アカウント有効無効 | is_active | boolean | no|   | DEFAULT TRUE |  |

#### <span style="font-size:1em;">kodomoテーブル</span>
| フィールド | Field | Type | Null | Key | Default | Extla |
|--------|-------------|-------------|------|-----|---------|----------------|
| こどもID  | kodomo_id   | int         | NO   | PRI | NOT NULL    | auto_increment |
| ユーザーID  | user_id   | int | NO  | MUL | NOT NULL    |                |
| こどもの名前 | kodomo_name | varchar(60) | NO  |     | NOT NULL    |                |
| 誕生日    | birthday    | date        | NO  |     | NOT NULL    |  |

#### <span style="font-size:1em;">ageテーブル</span>
| フィールド | Field | Type | Null | Key | Default | Extla |
|-------|--------|-------------|------|-----|---------|-------|
| 月齢ID | age_id | int | NO | PRI | NOT NULL | auto_increment |
| 月齢 | age | varchar(60) | NO |  | NOT NULL |  |

#### <span style="font-size:1em;">mainテーブル</span>
| フィールド  | Field | Type | Null | Key | Default | Extla |
|--------|-----------|--------------|------|-----|---------|----------------|
| メインID | main_id | int | NO | PRI | NOT NULL | auto_increment |
| ユーザーID | user_id | int | NO | MUL | NOT NULL |   |
| こどもID | kodomo_id | int | NO  | MUL | NOT NULL |   |
| ようじ語 | youjigo | varchar(60) | NO  |     | NOT NULL |   |
| おとな語 | otonago | varchar(60) | NO  |     | NOT NULL |   |
| かな | kana | varchar(60) | NO |   | NOT NULL |   |
| 写真 | photo | text | YES |   | NULL |   |
| キャプション | caption   | varchar(300) | YES  |   | NULL |   |
| 月齢ID | age_id | int | NO  | MUL | NOT NULL |   |
| 投稿日 | posted_at | datetime | NO |   | CURRENT_TIMESTAMP |   |
| 最終編集日 | updated_at | datetime | NO |   | CURRENT_TIMESTAMP | ON UPDATE CURRENT_TIMESTAMP |
| 投稿削除 | is_deleted | boolean | NO |  | DEFAULT FALSE |  |

#### <span style="font-size:1em;">followテーブル</span>
| フィールド | Field | Type | Null | Key | Default | Extla |
|--------|-----------|--------------|------|-----|---------|----------------|
| フォローID | follow_id | int | NO | PRI | NOT NULL | auto_increment |
| フォロイー | followee_id | int | NO | MUL | NOT NULL |   |
| フォロワー | follower_id | int | NO  | MUL | NOT NULL |   |
| フォロー状態 | follow_status | boolean | NO  |     | DEFAULT FALSE |   |
| リクエスト | is_requested | boolean | NO  |     | DEFAULT FALSE |   |
| メッセージ | follow_message | varchar(300) | YES  |     |  NULL |   |

#### <span style="font-size:1em;">admin_kanriテーブル</span>
| フィールド | Field | Type | Null | Key | Default | Extla |
|--------|-----------|--------------|------|-----|---------|----------------|
| 管理者ID | admin_id | int | NO | PRI | NOT NULL | auto_increment |
| 管理者名 | admin_name | varchar(60) | NO |  | NOT NULL |   |
| ハッシュ化パスワード | admin_password_hash | varchar(255) | NO  |  | NOT NULL |   |
| 最高権限 | is_superadmin | boolean | NO  |     | DEFAULT FALSE |   |
</div>

<!-- #### ER図
<div style="padding-inline-start:1em;">

![ER図](pupupa/images/pupupa_db_er.png)
</div>
</div>
</div>

## 使い方
<div style="padding-inline-start:1.5em;">

* <span style="color:red;">①</span>検索したキーワードを表示します。
* <span style="color:red;">②</span>アカウント名・こどもの名前・月齢を表示します。
* <span style="color:red;">③</span>ようじ語とおとな語が並んだ行の左側は、マウスオーバーすると緑色になります。これを押すと、アカウント情報・写真・キャプションの表示/非表示を切り替えられます。
* <span style="color:red;">④</span>アカウント名と投稿日と任意で説明文が表示されます。


![使用方法](pupupa/images/sample_photo.png)
</div>
 -->
