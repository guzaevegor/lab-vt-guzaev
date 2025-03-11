<?php
// controllers/ArrayController.php
require_once __DIR__ . '/../services/ArrayService.php';
require_once __DIR__ . '/../helpers/Template.php';

class ArrayController {
    private $arrayService;

    public function __construct() {
        $this->arrayService = new ArrayService();
    }

    /**
     * Отображает форму для ввода массивов
     */
    public function showForm() {
        echo Template::render(__DIR__ . '\..\views\form.php');
    }

    /**
     * Обрабатывает данные формы и отображает результат
     */
    public function processForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $array1 = $_POST['array1'] ?? '';
            $array2 = $_POST['array2'] ?? '';

            $result = $this->arrayService->processArrays($array1, $array2);

            // Рендерим шаблон с данными
            echo Template::render(__DIR__ . '\..\views\result.php', [
                'evenNumbers' => $result['even']
            ]);
        } else {
            // Если метод запроса не POST, показываем форму
            $this->showForm();
        }
    }
}
