<h2>Grupos</h2>

<form method="post">
  <label>Novo grupo:</label>
  <input name="nome" placeholder="A, B, C..." required maxlength="5">
  <button type="submit">Cadastrar</button>
</form>

<hr>

<?php foreach ($grupos as $g): ?>
  <h3>Grupo <?= htmlspecialchars($g['nome']) ?></h3>
  <?php $lista = $selecoesPorGrupo[$g['id']] ?? []; ?>
  <?php if (!$lista): ?>
    <p>(Sem seleções)</p>
  <?php else: ?>
    <ul>
      <?php foreach ($lista as $s): ?>
        <li><?= htmlspecialchars($s['nome']) ?> (<?= htmlspecialchars($s['continente']) ?>)</li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
<?php endforeach; ?>
