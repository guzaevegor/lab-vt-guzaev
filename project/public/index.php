<?php
// Включаем отображение ошибок для отладки
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Определяем корневую директорию проекта
define('ROOT_DIR', dirname(__DIR__));

// Автозагрузка классов
spl_autoload_register(function ($class) {
    $paths = [
        ROOT_DIR . '/app/controllers/',
        ROOT_DIR . '/app/models/',
        ROOT_DIR . '/app/views/'
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    // Отладочная информация
    echo "Не удалось загрузить класс: {$class}<br>";
});

// Простая маршрутизация
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Gallery';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Формируем имя класса контроллера
$controllerClass = $controller . 'Controller';

// Проверяем существование файла контроллера
$controllerFile = ROOT_DIR . '/app/controllers/' . $controllerClass . '.php';
if (!file_exists($controllerFile)) {
    echo "Файл контроллера не найден: {$controllerFile}";
    exit;
}

// Создаем объект контроллера
if (class_exists($controllerClass)) {
    $controllerObject = new $controllerClass();

    // Проверяем существование метода
    if (!method_exists($controllerObject, $action)) {
        echo "Метод {$action} не найден в контроллере {$controllerClass}";
        exit;
    }

    // Вызываем метод контроллера с параметром id, если он есть
    if ($id) {
        $controllerObject->$action($id);
    } else {
        $controllerObject->$action();
    }
} else {
    // Если контроллер не найден, показываем ошибку 404
    header('HTTP/1.0 404 Not Found');
    echo '404 Not Found: Контроллер ' . $controllerClass . ' не найден';
}
?>
