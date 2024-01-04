<?php

include_once('./dbconnect.php');
include_once('./functions.php');

//選択されたIDの取得
$id = $_GET['id'];

//1．DBへの接続
//2．編集するデータを取得
//3．取得したデータの表示

//SQl作製
$sql = "SELECT * FROM records_2 WHERE id = :id";

//SQL準備
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

//SQL実行
$stmt->execute();

//実行結果の取得
$record = $stmt->fetch();

//VAR_dump($record);


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>かけいぼ</title>
</head>
<body>

  <div class="container">
    <header class="mb-5">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">かけいぼ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
    </header>

    <form class="m-5" action="./update.php" method="POST">
      <input type=hidden name='id' value="<?= $id; ?>"/>
      <p class="alert alert-success" role="alert">編集フォーム</p>
      <div class="form-group">
        <label for="date">日付</label>
        <input type="date" class="form-control" id="date" name="date" value=<?php echo h($record['date']) ?>>
      </div>
      <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" name="title" value=<?php echo h($record['title']) ?>>
      </div>
      <div class="form-group">
        <label for="amount">だ支払い金額</label>
        <input type="number" class="form-control" id="amount" name="d_pay" value=<?php echo h($record['d_pay']) ?>>
      </div>
      <div class="form-group">
        <label for="amount">り支払い金額</label>
        <input type="number" class="form-control" id="amount" name="r_pay" value=<?php echo h($record['r_pay']) ?>>
      </div>
      <div class="form-group">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="pay_person" id="income" value='0'
           <?php echo h($record['pay_person']) == 0 ? 'checked' : ''; ?>>
          <label class="form-check-label" for="income">だ</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="pay_person" id="spending" value='1'
           <?php echo h($record['pay_person']) == 1 ? 'checked' : ''; ?>>
          <label class="form-check-label" for="spending">り</label>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">編集</button>
      </div>
    </form>

  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="./assets/js/app.js"></script>
</body>
</html>
