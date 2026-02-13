<h2>Seleções</h2>
<a href="index.php?c=selecoes&a=create">+ Nova seleção</a>

<table border="1" cellpadding="6">
  <tr>
    <th>Nome</th><th>Continente</th><th>Grupo</th><th>Ações</th>
  </tr>
  <?php foreach ($selecoes as $s): ?>
    <tr>
      <td><?= htmlspecialchars($s['nome']) ?></td>
      <td><?= htmlspecialchars($s['continente']) ?></td>
      <td><?= htmlspecialchars($s['grupo_nome'] ?? '-') ?></td>
      <td>
        <a href="index.php?c=selecoes&a=edit&id=<?= $s['id'] ?>">Editar</a>
        <a href="index.php?c=selecoes&a=delete&id=<?= $s['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
