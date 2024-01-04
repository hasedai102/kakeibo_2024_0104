<?php

include_once('./dbconnect.php');


//1．画面で入力された値の取得
//2．PHPからMySQLへ接続
//3．SQL文を作製して、画面で入力された値をrecordテーブルに追加
//4。index.phpに画面遷移する

//var_dump($_POST);


$id = $_POST['id'];
$date = $_POST['date'];
$title = $_POST['title'];
$d_pay = (int)$_POST['d_pay'];
$r_pay = (int)$_POST['r_pay'];
$pay_person = (int)$_POST['pay_person'];
//var_dump($_POST);

$sql = "UPDATE records_2 SET title = :title, pay_person = :pay_person, d_pay = :d_pay, r_pay = :r_pay, date = :date, updated_at = now() WHERE id =:id";

//先ほど作製したSQLの実行準備
$stmt = $pdo->prepare($sql);

//値の設定
$stmt->bindParam(':id',$id, PDO::PARAM_INT);
$stmt->bindParam(':title',$title, PDO::PARAM_STR);
$stmt->bindParam(':pay_person',$pay_person, PDO::PARAM_INT);
$stmt->bindParam(':d_pay',$d_pay, PDO::PARAM_INT);
$stmt->bindParam(':r_pay',$r_pay, PDO::PARAM_INT);
$stmt->bindParam(':date',$date, PDO::PARAM_STR);

//SQl実行
$stmt->execute();

//画面遷移
header('Location: ./index.php');
exit;