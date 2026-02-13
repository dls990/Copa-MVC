<?php
class Classificacao {
  public static function porGrupo(int $grupoId): array {
    $sql = "SELECT nome, pontos, saldo_gols, gols_marcados, vitorias, empates, derrotas
            FROM selecoes
            WHERE grupo_id=?
            ORDER BY pontos DESC, saldo_gols DESC, gols_marcados DESC, nome ASC";
    $st = Database::conn()->prepare($sql);
    $st->execute([$grupoId]);
    return $st->fetchAll();
  }
}
