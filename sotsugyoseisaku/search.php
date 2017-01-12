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
<html lang="ja">
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
<div class="wrapper cover">
<div class="wrapper">
    
 	<!-- navigation bar -->    
	<form class="leftnavi" method="get" action="search.php">
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
		<input id="submit2_button" type="submit" value="さがす">
		</div>
	</form>    
     
                   
        
	 <!-- スタイリストpickup 一覧  -->
	<div class="kensaku2main">    
		<div class="col s12 m7">
      <h2 class="header">スタイリスト一覧</h2>
    
      
          
    
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
						<form class="leftnavi" method="get" action="profile.php">
                        <input id="submit2_button" type="submit" value="コーディネート">
					</div>  
				</div> 
      </div>
    <?php endforeach ;?>

		</div>
        </div>
        </div>
        </div>
    
  <!-- Footer -->
   <!-- Footer -->
    <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="footer-logo">©Find-Stylist </h5>
          <p class="footer-comment">Simplicity is the keynote of all true elegance.</p>
        </footer>

  
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
     <!--  Scripts-->
    <script type="text/javascript">
    $(document).ready(function() {
      $('select').material_select();
    });
    </script> 
  </body>
</html>