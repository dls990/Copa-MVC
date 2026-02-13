<?php
require __DIR__ . '/../models/Jogo.php';
require __DIR__ . '/../models/Selecao.php';
require __DIR__ . '/../models/Grupo.php';

class JogosController extends Controller {
  public function index() {
    $jogos = Jogo::all();
    $this->view('jogos/index', compact('jogos'));
  }

  public function create() {
    $selecoes = Selecao::all();
    $grupos = Grupo::all();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if ((int)$_POST['mandante_id'] === (int)$_POST['visitante_id']) {
        echo "Mandante e visitante não podem ser iguais.";
        return;
      }
      Jogo::create($_POST);
      $this->redirect('index.php?c=jogos&a=index');
    }

    $this->view('jogos/create', compact('selecoes','grupos'));
  }
}
