<h2>Resultados</h2>

<table border="1" cellpadding="6">
  <tr>
    <th>Data/Hora</th><th>Jogo</th><th>Fase</th><th>Grupo</th><th>Placar</th><th>Ação</th>
  </tr>
  <?php foreach ($jogos as $j): ?>
    <tr>
      <td><?= htmlspecialchars($j['data_hora']) ?></td>
      <td><?= htmlspecialchars($j['mandante_nome']) ?> x <?= htmlspecialchars($j['visitante_nome']) ?></td>
      <td><?= htmlspecialchars($j['fase']) ?></td>
      <td><?= htmlspecialchars($j['grupo_nome'] ?? '-') ?></td>
      <td>
        <?php if ($j['gols_mandante'] !== null): ?>
          <?= (int)$j['gols_mandante'] ?> - <?= (int)$j['gols_visitante'] ?>
        <?php else: ?>
          (sem resultado)
        <?php endif; ?>
      </td>
      <td>
        <a href="index.php?c=resultados&a=registrar&jogo_id=<?= $j['id'] ?>">
          Registrar/Editar
        </a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
