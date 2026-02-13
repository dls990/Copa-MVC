<?php
class Selecao {
  public static function all(): array {
    return Database::conn()->query(
      "SELECT s.*, g.nome AS grupo_nome
       FROM selecoes s
       LEFT JOIN grupos g ON g.id = s.grupo_id
       ORDER BY s.nome"
    )->fetchAll();
  }

  public static function create(array $d): void {
    $sql = "INSERT INTO selecoes (nome, continente, grupo_id) VALUES (?,?,?)";
    $st = Database::conn()->prepare($sql);
    $st->execute([$d['nome'], $d['continente'], $d['grupo_id'] ?: null]);
  }

  public static function find(int $id): ?array {
    $st = Database::conn()->prepare("SELECT * FROM selecoes WHERE id=?");
    $st->execute([$id]);
    $r = $st->fetch();
    return $r ?: null;
  }

  public static function update(int $id, array $d): void {
    $sql = "UPDATE selecoes SET nome=?, continente=?, grupo_id=? WHERE id=?";
    $st = Database::conn()->prepare($sql);
    $st->execute([$d['nome'], $d['continente'], $d['grupo_id'] ?: null, $id]);
  }

  public static function delete(int $id): void {
    $st = Database::conn()->prepare("DELETE FROM selecoes WHERE id=?");
    $st->execute([$id]);
  }
}
