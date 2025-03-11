<?php

class Template {
    /**
     * Рендерит шаблон с переданными переменными
     *
     * @param string $template Путь к файлу шаблона
     * @param array $vars Массив переменных для передачи в шаблон
     * @return string Отрендеренный HTML
     */
    public static function render(string $template, array $vars = []): string {
        // Извлекаем переменные из массива в текущую область видимости
        extract($vars);

        // Начинаем буферизацию вывода
        ob_start();

        // Включаем файл шаблона
        include $template;

        // Получаем содержимое буфера и очищаем его
        return ob_get_clean();
    }
}
