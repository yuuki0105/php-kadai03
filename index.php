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
    <div class="navbar-header"><a class="navbar-brand" href="select.php">Link:登録データ一覧へ</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- 入力したものをinsert.phpにかくして(post)送りますよ。 -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>書籍に関するアンケート</legend>
     <label>書籍名：<input type="text" name="name"></label><br>
     <label>URL：<input type="text" name="url"></label><br>
     <label>書籍に関するコメント：<input type="text" name="comment"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
