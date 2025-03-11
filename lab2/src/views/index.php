<?php
// index.php
require_once('../controllers/ArrayController.php');


// Создаем экземпляр контроллера
$controller = new ArrayController();

// Определяем действие на основе GET-параметра
$action = $_GET['action'] ?? 'showForm';

// Вызываем соответствующий метод контроллера
switch ($action) {
    case 'process':
        $controller->processForm();
        break;
    default:
        $controller->showForm();
        break;
}
