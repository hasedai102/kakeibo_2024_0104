<?php
include_once('./functions.php');

$d_pay = $_GET['d_pay'];
$r_pay = $_GET['r_pay'];

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

    <form class="m-5" action="./create.php" method="POST">
      <p class="alert alert-primary" role="alert">新規追加フォーム</p>
      <div class="form-group">
        <label for="date">日付</label>
        <input type="date" class="form-control" id="date" name="date" value = <?php echo h(date("Y-m-d")) ?>>
      </div>
      <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="amount">だ支払金額</label>
        <input type="number" class="form-control" id="d_pay" name="d_pay" value=<?php echo h($d_pay) ?>>
      </div>
      <div class="form-group">
        <label for="amount">り支払金額</label>
        <input type="number" class="form-control" id="r_pay" name="r_pay" value=<?php echo h($r_pay) ?>>
      </div>
      <div class="form-group">
        <label for="type">支払者</label></br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="pay_person" id="income" value="0" checked>
          <label class="form-check-label" for="income">だ</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="pay_person" id="spending" value="1">
          <label class="form-check-label" for="spending">り</label>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">追加</button>
      </div>
    </form>

  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="./assets/js/app.js"></script>
</body>
</html>