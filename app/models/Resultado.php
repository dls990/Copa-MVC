<?php
class Resultado {
  public static function registrar(int $jogoId, int $gm, int $gv): void {
    $pdo = Database::conn();
    $pdo->beginTransaction();

  
    $st = $pdo->prepare("SELECT * FROM jogos WHERE id=?");
    $st->execute([$jogoId]);
    $jogo = $st->fetch();
    if (!$jogo) { $pdo->rollBack(); throw new Exception("Jogo não encontrado."); }

    
    $st = $pdo->prepare("SELECT * FROM resultados WHERE jogo_id=?");
    $st->execute([$jogoId]);
    $old = $st->fetch();
    if ($old) {
      self::desfazerEfeito($jogo, (int)$old['gols_mandante'], (int)$old['gols_visitante']);
      $up = $pdo->prepare("UPDATE resultados SET gols_mandante=?, gols_visitante=? WHERE jogo_id=?");
      $up->execute([$gm, $gv, $jogoId]);
    } else {
      $ins = $pdo->prepare("INSERT INTO resultados (jogo_id, gols_mandante, gols_visitante) VALUES (?,?,?)");
      $ins->execute([$jogoId, $gm, $gv]);
    }

   
    self::aplicarEfeito($jogo, $gm, $gv);

    $pdo->commit();
  }

  private static function aplicarEfeito(array $jogo, int $gm, int $gv): void {
    self::atualizaTimes($jogo, $gm, $gv, +1);
  }

  private static function desfazerEfeito(array $jogo, int $gm, int $gv): void {
    self::atualizaTimes($jogo, $gm, $gv, -1);
  }

 
  private static function atualizaTimes(array $jogo, int $gm, int $gv, int $fator): void {
    $pdo = Database::conn();
    $mandante = (int)$jogo['mandante_id'];
    $visitante = (int)$jogo['visitante_id'];

    
    self::addStats($mandante, $fator*0, $fator*0, $fator*0, $fator*$gm, $fator*$gv);
    self::addStats($visitante, $fator*0, $fator*0, $fator*0, $fator*$gv, $fator*$gm);

   
    if ($gm > $gv) {
      self::addStats($mandante, $fator*3, $fator*1, 0, 0, 0);
      self::addStats($visitante, 0, 0, $fator*1, 0, 0);
    } elseif ($gm < $gv) {
      self::addStats($visitante, $fator*3, $fator*1, 0, 0, 0);
      self::addStats($mandante, 0, 0, $fator*1, 0, 0);
    } else {
      self::addStats($mandante, $fator*1, 0, 0, 0, 0, $fator*1);
      self::addStats($visitante, $fator*1, 0, 0, 0, 0, $fator*1);
    }

   
    $pdo->exec("UPDATE selecoes SET saldo_gols = (gols_marcados - gols_sofridos)");
  }

  
  private static function addStats(int $selecaoId, int $pontos, int $vitorias, int $derrotas, int $gm, int $gs, int $empates = 0): void {
    $sql = "UPDATE selecoes
            SET pontos = pontos + ?,
                vitorias = vitorias + ?,
                empates = empates + ?,
                derrotas = derrotas + ?,
                gols_marcados = gols_marcados + ?,
                gols_sofridos = gols_sofridos + ?
            WHERE id=?";
    $st = Database::conn()->prepare($sql);
    $st->execute([$pontos, $vitorias, $empates, $derrotas, $gm, $gs, $selecaoId]);
  }
}
