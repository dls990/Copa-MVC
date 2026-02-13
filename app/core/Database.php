<?php
class Database {
  private static ?PDO $conn = null;

  public static function conn(): PDO {
    if (self::$conn === null) {
      $cfg = require __DIR__ . '/../config/database.php';
      $dsn = "mysql:host={$cfg['host']};dbname={$cfg['dbname']};charset={$cfg['charset']}";
      self::$conn = new PDO($dsn, $cfg['user'], $cfg['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]);
    }
    return self::$conn;
  }
}
