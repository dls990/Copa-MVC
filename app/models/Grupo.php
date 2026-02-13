<?php
class Grupo {
  public static function all(): array {
    return Database::conn()->query("SELECT * FROM grupos ORDER BY nome")->fetchAll();
  }

  public static function create(string $nome): void {
    $st = Database::conn()->prepare("INSERT INTO grupos (nome) VALUES (?)");
    $st->execute([$nome]);
  }

  public static function selecoesDoGrupo(int $grupoId): array {
    $st = Database::conn()->prepare("SELECT * FROM selecoes WHERE grupo_id=? ORDER BY nome");
    $st->execute([$grupoId]);
    return $st->fetchAll();
  }
}
