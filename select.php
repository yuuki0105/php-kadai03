<?php
include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
sqlError($stmt);
} else {
//Selectデータの数だけ自動でループしてくれる
//FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
//1行を

$view .= '<p>';
// aタグ＝リンク　…　aタグで囲んだところに飛ばす。
$view .= '<a href="detail.php?id='.$result["id"].'">';
$view .= $result["name"] . "," . $result["url"]. "," .$result["comment"]. "," .$result["datetime"] ;
$view .= '</a>';
$view .= ' ';
//データの削除↓をできるようにする
$view .= '<a href="delete.php?id='.$result["id"].'">';
$view .= '[ 削除 ]';
$view .= '</a>';
$view .= '</p>';
}

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="index.php">LInk:データ登録画面へ</a>

</div>
</div>
</nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
<div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>