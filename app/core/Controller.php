<?php
class Controller {
  protected function view(string $path, array $data = []) {
    extract($data);
    require __DIR__ . '/../views/layout/header.php';
    require __DIR__ . '/../views/' . $path . '.php';
    require __DIR__ . '/../views/layout/footer.php';
  }

  protected function redirect(string $to) {
    header("Location: {$to}");
    exit;
  }
}
