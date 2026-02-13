<h2>Jogos</h2>
<a href="index.php?c=jogos&a=create">+ Novo jogo</a>

<table border="1" cellpadding="6">
  <tr>
    <th>Data/Hora</th><th>Mandante</th><th>Visitante</th><th>Estádio</th><th>Fase</th><th>Grupo</th>
  </tr>
  <?php foreach ($jogos as $j): ?>
    <tr>
      <td><?= htmlspecialchars($j['data_hora']) ?></td>
      <td><?= htmlspecialchars($j['mandante_nome']) ?></td>
      <td><?= htmlspecialchars($j['visitante_nome']) ?></td>
      <td><?= htmlspecialchars($j['estadio']) ?></td>
      <td><?= htmlspecialchars($j['fase']) ?></td>
      <td><?= htmlspecialchars($j['grupo_nome'] ?? '-') ?></td>
    </tr>
  <?php endforeach; ?>
</table>
