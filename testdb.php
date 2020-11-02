<?php
  $hostname = 'localhost';
  $user = 'credmilla';
  $password = '8m5@sM';
  $dbname = 'credmillacom';

  $dsn = 'mysql:dbname=' . $dbname . ';host=' . $hostname;
  try {

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $th) {
    throw new Exception( $th->getMessage());
}