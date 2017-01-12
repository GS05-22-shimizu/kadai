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



//データベースユーザ
$user = 'root';
$password = '';
//利用するデータベース
$dbName = 'sotsugyo';
//MySQLサーバ
$host = 'localhost';
//MySQLのDSN文字列
$dsn="mysql:dbname=sotsugyo;host=localhost;charset=utf8";

?>

<?php
$prefecture = $_GET["prefecture"];

//MySQLデータベースに接続する
try{
  $pdo=new PDO($dsn,$user,$password);
}catch(Exception $e){
  echo 'error' .$e->getMessage;
  die();
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

//SQL文を作る
$sql="SELECT * FROM stylist WHERE prefecture LIKE (:prefecture) and service LIKE (:service)";
//プリペアードステートメントを作る
$stmt = $pdo->prepare("SELECT * FROM stylist");
//$stmt=$pdo->query($sql);
//プレースホルダに値をバインドする
$stmt->bindValue (':prefecture', $prefecture,PDO::PARAM_STR);
//SQL文を実行する
$stmt->execute();
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
    
       <!-- スタイリスト紹介  -->
      <div class="wrapperprofile">
        <div class="wrapperprofileheader">Profile</div>
        
          <?php foreach ($result as $data) :?>   
      <div class="card horizontal">
				<div class="card-image">
					<img src="<?php echo $data['picture'];?>">
				</div>
				<div class="card-stacked">
					<div class="card-content">
					 <p><?php echo $data['name'];?><br><?php echo $data['prefecture'];?><br><?php echo $data['comment'];?></p>
					</div>
					<div class="card-action">
						<a href="<?php echo $data['SNS'];?>"><?php echo $data['SNS'];?></a>
					</div>  
				</div> 
      </div>
    
    <div class="coordinate">
    <p class="profile">Coordinate</p>
    <ul class="gazo-box">
    <li><img src="<?php echo $data['coordinate1'];?>" width="215" height="215"></li>
    <li><img src="<?php echo $data['coordinate2'];?>" width="215" height="215"></li>
    <li><img src="<?php echo $data['coordinate3'];?>" width="215" height="215"></li>
    
    </div>
    
    </div>      
    </div>
    </div>
    <?php endforeach ;?>
     <!--  footer-->
     <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>