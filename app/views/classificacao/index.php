<h2>Classificação</h2>

<?php foreach ($grupos as $g): ?>
  <h3>Grupo <?= htmlspecialchars($g['nome']) ?></h3>

  <?php $tab = $tabelas[$g['id']] ?? []; ?>
  <?php if (!$tab): ?>
    <p>(Sem seleções no grupo)</p>
  <?php else: ?>
    <table border="1" cellpadding="6">
      <tr>
        <th>Seleção</th><th>P</th><th>SG</th><th>GM</th><th>V</th><th>E</th><th>D</th>
      </tr>
      <?php foreach ($tab as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['nome']) ?></td>
          <td><?= (int)$row['pontos'] ?></td>
          <td><?= (int)$row['saldo_gols'] ?></td>
          <td><?= (int)$row['gols_marcados'] ?></td>
          <td><?= (int)$row['vitorias'] ?></td>
          <td><?= (int)$row['empates'] ?></td>
          <td><?= (int)$row['derrotas'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php endif; ?>

<?php endforeach; ?>
