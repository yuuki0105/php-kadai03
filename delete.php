<?php
$id = $_GET["id"];
echo $id;

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
//デリートします。
$sql = "DELETE FROM gs_bm_table WHERE id=:id";
//prepareに文章を入れてる。
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: select.php");
    exit;
}

?>