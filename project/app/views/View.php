<?php
class View {
    private $vars = [];
    private $templateDir;

    public function __construct($templateDir = null) {
        $this->templateDir = $templateDir ?: ROOT_DIR . '/app/views/';
    }

    public function __set($name, $value) {
        $this->vars[$name] = $value;
    }

    public function __get($name) {
        return isset($this->vars[$name]) ? $this->vars[$name] : null;
    }

    public function render($template, $data = []) {
        // Устанавливаем переданные данные как свойства
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }

        // Начинаем буферизацию вывода
        ob_start();

        // Проверяем существование шаблона
        $layoutFile = $this->templateDir . '/templates/layout.php';
        $templateFile = $this->templateDir . '/' . $template . '.php';

        if (!file_exists($layoutFile)) {
            die("Файл шаблона layout.php не найден по пути: {$layoutFile}");
        }

        if (!file_exists($templateFile)) {
            die("Файл шаблона {$template}.php не найден по пути: {$templateFile}");
        }

        // Подключаем шаблон
        include($layoutFile);

        // Выводим буфер
        echo ob_get_clean();
    }
}
?>
