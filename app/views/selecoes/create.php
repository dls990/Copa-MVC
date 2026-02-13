<h2>Nova seleção</h2>

<form method="post">
  <label>Nome:</label><br>
  <input name="nome" required><br><br>

  <label>Continente:</label><br>
  <input name="continente" placeholder="Ex: América do Sul" required><br><br>

  <label>Grupo:</label><br>
  <select name="grupo_id">
    <option value="">(sem grupo)</option>
    <?php foreach ($grupos as $g): ?>
      <option value="<?= $g['id'] ?>"><?= htmlspecialchars($g['nome']) ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <button type="submit">Salvar</button>
</form>
