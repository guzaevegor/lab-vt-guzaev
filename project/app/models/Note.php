<?php
class Note {
    private $id;
    private $paintingId;
    private $text;

    public function __construct($id, $paintingId, $text) {
        $this->id = $id;
        $this->paintingId = $paintingId;
        $this->text = $text;
    }

    // Геттеры и сеттеры
    public function getId() {
        return $this->id;
    }

    public function getPaintingId() {
        return $this->paintingId;
    }

    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
    }

    // Метод для сохранения заметки
    public function save() {
        // В реальном приложении здесь был бы код сохранения в БД
        // В данном примере используем localStorage через JavaScript
    }

    // Метод для получения заметок по ID картины
    public static function getByPaintingId($paintingId) {
        // В реальном приложении здесь был бы запрос к БД
        // Сейчас мы используем localStorage в JavaScript
    }
}
?>
