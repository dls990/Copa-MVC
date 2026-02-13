<?php
require __DIR__ . '/../models/Grupo.php';
require __DIR__ . '/../models/Classificacao.php';

class ClassificacaoController extends Controller {
  public function index() {
    $grupos = Grupo::all();
    $tabelas = [];

    foreach ($grupos as $g) {
      $tabelas[$g['id']] = Classificacao::porGrupo($g['id']);
    }

    $this->view('classificacao/index', compact('grupos','tabelas'));
  }
}
