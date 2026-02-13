<?php
require __DIR__ . '/../models/Usuario.php';
require __DIR__ . '/../models/Selecao.php';

class UsuariosController extends Controller {
  public function index() {
    $usuarios = Usuario::all();
    $this->view('usuarios/index', compact('usuarios'));
  }

  public function create() {
    $selecoes = Selecao::all();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      Usuario::create($_POST);
      $this->redirect('index.php?c=usuarios&a=index');
    }
    $this->view('usuarios/create', compact('selecoes'));
  }

  public function edit() {
    $selecoes = Selecao::all();
    $id = (int)($_GET['id'] ?? 0);
    $u = Usuario::find($id);
    if (!$u) { echo "Usuário não encontrado"; return; }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      Usuario::update($id, $_POST);
      $this->redirect('index.php?c=usuarios&a=index');
    }
    $this->view('usuarios/edit', compact('u','selecoes'));
  }

  public function delete() {
    $id = (int)($_GET['id'] ?? 0);
    Usuario::delete($id);
    $this->redirect('index.php?c=usuarios&a=index');
  }
}
