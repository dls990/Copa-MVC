<?php
require __DIR__ . '/../models/Selecao.php';
require __DIR__ . '/../models/Grupo.php';

class SelecoesController extends Controller {
  public function index() {
    $selecoes = Selecao::all();
    $this->view('selecoes/index', compact('selecoes'));
  }

  public function create() {
    $grupos = Grupo::all();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      Selecao::create($_POST);
      $this->redirect('index.php?c=selecoes&a=index');
    }
    $this->view('selecoes/create', compact('grupos'));
  }

  public function edit() {
    $grupos = Grupo::all();
    $id = (int)($_GET['id'] ?? 0);
    $sel = Selecao::find($id);
    if (!$sel) { echo "Seleção não encontrada"; return; }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      Selecao::update($id, $_POST);
      $this->redirect('index.php?c=selecoes&a=index');
    }
    $this->view('selecoes/edit', compact('sel','grupos'));
  }

  public function delete() {
    $id = (int)($_GET['id'] ?? 0);
    Selecao::delete($id);
    $this->redirect('index.php?c=selecoes&a=index');
  }
}
