<?php
class View {
    private $vars = [];
    private $templateDir = 'app/views/';

    public function __construct($templateDir = null) {
        if ($templateDir) {
            $this->templateDir = $templateDir;
        }
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

        // Подключаем шаблон
        include($this->templateDir . 'templates/layout.php');

        // Выводим буфер
        echo ob_get_clean();
    }
}
?>
