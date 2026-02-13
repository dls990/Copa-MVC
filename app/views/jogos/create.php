<h2>Novo jogo</h2>

<form method="post">
  <label>Mandante:</label><br>
  <select name="mandante_id" required>
    <?php foreach ($selecoes as $s): ?>
      <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['nome']) ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <label>Visitante:</label><br>
  <select name="visitante_id" required>
    <?php foreach ($selecoes as $s): ?>
      <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['nome']) ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <label>Data e horário:</label><br>
  <input type="datetime-local" name="data_hora" required><br><br>

  <label>Estádio:</label><br>
  <input name="estadio" required><br><br>

  <label>Grupo ou fase:</label><br>
  <input name="fase" placeholder="Ex: Grupo A, Oitavas..." required><br><br>

  <label>Grupo (opcional):</label><br>
  <select name="grupo_id">
    <option value="">(sem grupo)</option>
    <?php foreach ($grupos as $g): ?>
      <option value="<?= $g['id'] ?>"><?= htmlspecialchars($g['nome']) ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <button type="submit">Salvar</button>
</form>
