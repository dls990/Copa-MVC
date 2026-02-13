<h2>Novo usuário</h2>

<form method="post">
  <label>Nome:</label><br>
  <input name="nome" required><br><br>

  <label>Idade:</label><br>
  <input type="number" name="idade" min="0" required><br><br>

  <label>Cargo:</label><br>
  <select name="cargo" required>
    <option value="jogador">jogador</option>
    <option value="tecnico">tecnico</option>
    <option value="arbitro">arbitro</option>
    <option value="outro">outro</option>
  </select><br><br>

  <label>Seleção representante:</label><br>
  <select name="selecao_id">
    <option value="">(sem seleção)</option>
    <?php foreach ($selecoes as $s): ?>
      <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['nome']) ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <button type="submit">Salvar</button>
</form>
