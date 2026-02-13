<?php
require __DIR__ . '/../models/Grupo.php';

class GruposController extends Controller {
  public function index() {
    $grupos = Grupo::all();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      Grupo::create($_POST['nome']);
      $this->redirect('index.php?c=grupos&a=index');
    }


    $selecoesPorGrupo = [];
    foreach ($grupos as $g) {
      $selecoesPorGrupo[$g['id']] = Grupo::selecoesDoGrupo($g['id']);
    }

    $this->view('grupos/index', compact('grupos','selecoesPorGrupo'));
  }
}
