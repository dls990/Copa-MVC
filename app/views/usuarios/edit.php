<h2>Editar usuário</h2>

<form method="post">
  <label>Nome:</label><br>
  <input name="nome" value="<?= htmlspecialchars($u['nome']) ?>" required><br><br>

  <label>Idade:</label><br>
  <input type="number" name="idade" min="0" value="<?= (int)$u['idade'] ?>" required><br><br>

  <label>Cargo:</label><br>
  <select name="cargo" required>
    <?php foreach (['jogador','tecnico','arbitro','outro'] as $c): ?>
      <option value="<?= $c ?>" <?= $u['cargo']===$c ? 'selected' : '' ?>><?= $c ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <label>Seleção representante:</label><br>
  <select name="selecao_id">
    <option value="">(sem seleção)</option>
    <?php foreach ($selecoes as $s): ?>
      <option value="<?= $s['id'] ?>" <?= ((string)$u['selecao_id']===(string)$s['id']) ? 'selected' : '' ?>>
        <?= htmlspecialchars($s['nome']) ?>
      </option>
    <?php endforeach; ?>
  </select><br><br>

  <button type="submit">Salvar</button>
</form>
