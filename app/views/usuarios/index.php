<h2>Usuários</h2>
<a href="index.php?c=usuarios&a=create">+ Novo usuário</a>

<table border="1" cellpadding="6">
  <tr>
    <th>Nome</th><th>Idade</th><th>Cargo</th><th>Seleção</th><th>Ações</th>
  </tr>
  <?php foreach ($usuarios as $u): ?>
    <tr>
      <td><?= htmlspecialchars($u['nome']) ?></td>
      <td><?= (int)$u['idade'] ?></td>
      <td><?= htmlspecialchars($u['cargo']) ?></td>
      <td><?= htmlspecialchars($u['selecao_nome'] ?? '-') ?></td>
      <td>
        <a href="index.php?c=usuarios&a=edit&id=<?= $u['id'] ?>">Editar</a>
        <a href="index.php?c=usuarios&a=delete&id=<?= $u['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
