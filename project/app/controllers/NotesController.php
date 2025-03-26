<?php
class NotesController {
    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['paintingId']) && isset($_POST['text'])) {
            $paintingId = $_POST['paintingId'];
            $text = $_POST['text'];

            // В реальном приложении здесь был бы код сохранения заметки
            // В данном примере можно использовать AJAX и localStorage

            // Отправляем JSON-ответ
            header('Content-Type: application/json');
            echo json_encode(['success' => true]);
            exit;
        }

        // Если запрос не POST или не содержит нужных данных
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'Invalid request']);
        exit;
    }
}
?>
