<?php
require __DIR__ . '/../models/Resultado.php';
require __DIR__ . '/../models/Jogo.php';

class ResultadosController extends Controller {
  public function index() {
    $jogos = Jogo::allComResultado();
    $this->view('resultados/index', compact('jogos'));
  }

  public function registrar() {
    $jogoId = (int)($_GET['jogo_id'] ?? 0);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      Resultado::registrar($jogoId, (int)$_POST['gm'], (int)$_POST['gv']);
      $this->redirect('index.php?c=resultados&a=index');
    }
    $this->view('resultados/registrar', compact('jogoId'));
  }
}
