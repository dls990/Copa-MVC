<h2>Editar seleção</h2>

<form method="post">
  <label>Nome:</label><br>
  <input name="nome" value="<?= htmlspecialchars($sel['nome']) ?>" required><br><br>

  <label>Continente:</label><br>
  <input name="continente" value="<?= htmlspecialchars($sel['continente']) ?>" required><br><br>

  <label>Grupo:</label><br>
  <select name="grupo_id">
    <option value="">(sem grupo)</option>
    <?php foreach ($grupos as $g): ?>
      <option value="<?= $g['id'] ?>" <?= ((string)$sel['grupo_id'] === (string)$g['id']) ? 'selected' : '' ?>>
        <?= htmlspecialchars($g['nome']) ?>
      </option>
    <?php endforeach; ?>
  </select><br><br>

  <button type="submit">Salvar</button>
</form>
