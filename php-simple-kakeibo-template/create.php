<?php

//dbconnect.phpを読み込む　→　DBに接続
include_once('./dbconnect.php');

//新しいレコートを追加するための処理
//[処理の流れ]
//最終のゴール：新しい家計簿が追加されて、TOPに戻る

//1．画面で入力された値の取得
//2．PHPからMySQLへ接続
//3．SQL文を作製して、画面で入力された値をrecordテーブルに追加
//4。index.phpに画面遷移する

//var_dump($_POST);
$date = $_POST['date'];
$title = $_POST['title'];
$d_pay = (int)$_POST['d_pay'];
$r_pay = (int)$_POST['r_pay'];
$pay_person = (int)$_POST['pay_person'];
//var_dump($r_pay);

//INSERT文の作製
$sql = "INSERT INTO records_2(title, pay_person, d_pay, r_pay, date, created_at, updated_at) 
VALUES (:title, :pay_person, :d_pay, :r_pay, :date, now(), now())";

//先ほど作製したSQLの実行準備
$stmt = $pdo->prepare($sql);

//値の設定
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

//画面遷移
//header('Location: ./index.php');
//exit;
