<?php
// Автозагрузка классов
spl_autoload_register(function ($class) {
    $paths = [
        'app/controllers/',
        'app/models/',
        'app/views/'
    ];

    foreach ($paths as $path) {
        if (file_exists($path . $class . '.php')) {
            require_once $path . $class . '.php';
            return;
        }
    }
});

// Простая маршрутизация
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Gallery';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Формируем имя класса контроллера
$controllerClass = $controller . 'Controller';

// Создаем объект контроллера
if (class_exists($controllerClass)) {
    $controllerObject = new $controllerClass();

    // Вызываем метод контроллера с параметром id, если он есть
    if ($id) {
        $controllerObject->$action($id);
    } else {
        $controllerObject->$action();
    }
} else {
    // Если контроллер не найден, показываем ошибку 404
    header('HTTP/1.0 404 Not Found');
    echo '404 Not Found';
}
?>
