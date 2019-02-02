<?php
$id = $_GET["id"];

//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt -> bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
sqlError($stmt);
} else {
//Selectデータの数だけ自動でループしてくれる
//FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php

$row = $stmt->fetch();

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>書籍に関するアンケート</legend>
     <label>書籍名：<input type="text" name="name" value="<?php echo $row["name"]; ?>"></label><br>
     <label>URL：<input type="text" name="url" value="<?php echo $row["url"]; ?>"></label><br>
     <label>書籍に関するコメント：<textArea name="comment" rows="4" cols="40"><?php echo $row["comment"]; ?></textArea></label><br>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <!-- //hiddenは隠すという意味の英語 -->

     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
