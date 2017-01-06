<?php
//0.外部ファイル読み込み
//include("functions.php");

//1.  DB接続します
//$pdo = db_con();

//利用するデータベース

//２．データ登録SQL作成
//$stmt = $pdo->prepare("SELECT * FROM stylist");
//$status = $stmt->execute();

//3. My SQLデータベースに接続する
//$prefecture = $_POST["prefecture"];

//4.SQL文を作る
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//5.プリペアードステートメントを作る
//$sql = "SELECT * FROM member WHERE prefecture LIKE (:prefecture)";

//利用するデータベース
//$dbName = 'sotsugyo';

//MySQLサーバ
//$host = 'localhost:'


<?php
//データベースユーザ
$user = 'root';
$password = '';
//利用するデータベース
$dbName = 'sotsugyo';
//MySQLサーバ
$host = '127.0.0.1';
//MySQLのDSN文字列
$dsn="mysql:dbname=dbname;host=localhost;charset=utf8";

?>

<?php
$prefecture = $_POST["prefecture"];
//MySQLデータベースに接続する
try{
  $pdo=new PDO($dsn,$user,$pass);
}catch(Exception $e){
  echo 'error' .$e->getMesseage;
  die();
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

//SQL文を作る
$sql="SELECT * FROM member WHERE prefecture LIKE (:prefecture)";
//プリペアードステートメントを作る
$stmt=$pdo->query($sql);
//プレースホルダに値をバインドする
$stm->bindValue (':name', "%{$name}%",PDO::PARAM_STR);
//SQL文を実行する
$stm->execute();
//結果の取得
$result=$stmt->fetchAll();

//$form=strip_tags($_GET['prefecture']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
 <!-- Navbar goes here -->
    <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"><img src="1_Primary_logo_on_transparent_218x69.png"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

    
<!-- Page Layout here -->
    <div class="wrapper">
        
      <form class="leftnavi">
        <!-- navigation bar -->
          <div class="container">  
  <div class="row">
    <div class="input-field s6">      
      <select class="validate" name="prefecture">
        <option value="" disabled selected>Choose your option</option>
        <option value="1">東京</option>
        <option value="2">神奈川</option>
        <option value="3">埼玉</option>
        <option value="3">関西</option>
        <option value="3">その他の地域</option>
      </select>
      <label >地域で探す</label>
    </div>
    <div class="input-field s7">      
      <select class="validate" name="service">
        <option value="" disabled selected>Choose your option</option>
        <option value="1">コンサルティング</option>
        <option value="2">ショッピング同行</option>
        <option value="3">ショッピングクルーズ</option>
        <option value="3">ワードローブ診断</option>
        <option value="3">その他</option>
      </select>
      <label >サービスで探す</label>
    </div>
  </div>

<input id="submit2_button" type="submit" name="submit" value="さがす">
</div>
</form>
         
   
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('select').material_select();
    });
    </script>      
                   
        
       <!-- スタイリストpickup 一覧  -->
      <div class="kensaku2main">
          
      <div class="col s12 m7">
      <h2 class="header">スタイリスト一覧</h2>
    
     <?php foreach ($search as $post) :?>   
      <div class="card horizontal">
      <div class="card-image">
        <?php echo $_post['picture'] ?>
        <img src="img/sawaki%20yuko%206.jpg">
      </div>
      <div class="card-stacked">
        <div class="card-content">
         <p><?php echo $_post['name'] ?>澤木祐子<br>東京<br>社団法人国際スタイリングカウンセラー協会代表理事。スタイリスト歴36年の経験を生かして心と体をテーマに幸せになるトータルライフコーディネートを提案!</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>  
    </div> 
      </div>
              
    <div class="card horizontal">
      <div class="card-image">
        <img src="sawaki%20yuko3.jpg">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>澤木祐子<br>東京<br>社団法人国際スタイリングカウンセラー協会代表理事。スタイリスト歴36年の経験を生かして心と体をテーマに幸せになるトータルライフコーディネートを提案!</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>  
    </div> 
      </div>
     
          
</div>
  </form>
    </div>
    </div> 
    
  <!-- Footer -->
    <footer class="page-footer teal">a
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Find-Stylist </h5>
          <p class="grey-text text-lighten-4 font-style-italic">Any amount would help support and continue development on this project and is greatly appreciated.</p>
        </footer>  
  

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>