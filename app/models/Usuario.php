<?php
class Usuario {
  public static function all(): array {
    $sql = "SELECT u.*, s.nome AS selecao_nome
            FROM usuarios u
            LEFT JOIN selecoes s ON s.id = u.selecao_id
            ORDER BY u.nome";
    return Database::conn()->query($sql)->fetchAll();
  }

  public static function create(array $d): void {
    $sql = "INSERT INTO usuarios (nome, idade, cargo, selecao_id) VALUES (?,?,?,?)";
    $st = Database::conn()->prepare($sql);
    $st->execute([
      $d['nome'],
      (int)$d['idade'],
      $d['cargo'],
      $d['selecao_id'] ?: null
    ]);
  }

  public static function find(int $id): ?array {
    $st = Database::conn()->prepare("SELECT * FROM usuarios WHERE id=?");
    $st->execute([$id]);
    $r = $st->fetch();
    return $r ?: null;
  }

  public static function update(int $id, array $d): void {
    $sql = "UPDATE usuarios SET nome=?, idade=?, cargo=?, selecao_id=? WHERE id=?";
    $st = Database::conn()->prepare($sql);
    $st->execute([
      $d['nome'],
      (int)$d['idade'],
      $d['cargo'],
      $d['selecao_id'] ?: null,
      $id
    ]);
  }

  public static function delete(int $id): void {
    $st = Database::conn()->prepare("DELETE FROM usuarios WHERE id=?");
    $st->execute([$id]);
  }
}
