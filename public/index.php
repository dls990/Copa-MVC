<?php
require __DIR__ . '/../app/core/Database.php';
require __DIR__ . '/../app/core/Controller.php';

$controller = $_GET['c'] ?? 'home';
$action = $_GET['a'] ?? 'index';

$map = [
  'selecoes' => 'SelecoesController',
  'usuarios' => 'UsuariosController',
  'grupos' => 'GruposController',
  'jogos' => 'JogosController',
  'resultados' => 'ResultadosController',
  'classificacao' => 'ClassificacaoController',
  'home' => 'HomeController',

];

$cls = $map[$controller] ?? 'SelecoesController';
require __DIR__ . "/../app/controllers/{$cls}.php";

$ctrl = new $cls();
if (!method_exists($ctrl, $action)) {
  http_response_code(404);
  echo "Ação não encontrada.";
  exit;
}
$ctrl->$action();
