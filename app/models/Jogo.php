<?php
class Jogo {
  public static function all(): array {
    $sql = "SELECT j.*, 
                   sm.nome AS mandante_nome,
                   sv.nome AS visitante_nome,
                   g.nome AS grupo_nome
            FROM jogos j
            JOIN selecoes sm ON sm.id = j.mandante_id
            JOIN selecoes sv ON sv.id = j.visitante_id
            LEFT JOIN grupos g ON g.id = j.grupo_id
            ORDER BY j.data_hora DESC";
    return Database::conn()->query($sql)->fetchAll();
  }

  public static function allComResultado(): array {
    $sql = "SELECT j.*,
                   sm.nome AS mandante_nome,
                   sv.nome AS visitante_nome,
                   g.nome AS grupo_nome,
                   r.gols_mandante, r.gols_visitante
            FROM jogos j
            JOIN selecoes sm ON sm.id = j.mandante_id
            JOIN selecoes sv ON sv.id = j.visitante_id
            LEFT JOIN grupos g ON g.id = j.grupo_id
            LEFT JOIN resultados r ON r.jogo_id = j.id
            ORDER BY j.data_hora DESC";
    return Database::conn()->query($sql)->fetchAll();
  }

  public static function create(array $d): void {
    $sql = "INSERT INTO jogos (mandante_id, visitante_id, data_hora, estadio, fase, grupo_id)
            VALUES (?,?,?,?,?,?)";
    $st = Database::conn()->prepare($sql);
    $st->execute([
      (int)$d['mandante_id'],
      (int)$d['visitante_id'],
      $d['data_hora'],
      $d['estadio'],
      $d['fase'],
      $d['grupo_id'] ?: null
    ]);
  }
}
