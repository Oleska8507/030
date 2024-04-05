<?php
header('Content-Type: text/html; charset=utf-8');

$name = $_POST["name"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$pass = $_POST["pass"];



//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect($host, $user, $password, $db);


if ($mysqli == false) {
  print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
  //print("Соединение установлено успешно");
  $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email' AND `pass`='$pass'");
  //var_dump($result->num_rows);

  if ($result->num_rows != 0) {
        print("exist");
  } else {
        $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
        print("ok");
  }


}



//ВАРИАНТ С ПОДГОТОВЛЕННЫМ ЗАПРОСОМ:
// $sql = "$mysqli->query("INSERT INTO `users`(`id`, `name`, `lastname`, `email`, `pass`) VALUES(?,?,?,?)";
// $stmt = $mysqli->prepare($sql);
// $stmt ->bind_param("ssss", $name, $lastname, $email, $pass);
// $stmt ->execute();
