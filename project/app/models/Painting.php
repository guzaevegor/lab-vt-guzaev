<?php
class Painting {
    private $id;
    private $title;
    private $description;
    private $image;

    public function __construct($id, $title, $description, $image) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }

    // Геттеры
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    // Метод для получения всех картин
    public static function getAll() {
        // В реальном приложении здесь был бы запрос к БД
        return [
            new Painting('painting1', 'Мона Лиза', 'Картина Леонардо да Винчи, известная своей загадочной улыбкой.', 'https://upload.wikimedia.org/wikipedia/commons/6/6a/Mona_Lisa.jpg'),
            new Painting('painting2', 'Звёздная ночь', 'Великая картина Винсента Ван Гога, изображающая ночное небо с яркими звёздами.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg/757px-Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg'),
            new Painting('painting3', 'Крик', 'Известная картина Эдварда Мунка, выражающая экзистенциальное страдание.', 'https://upload.wikimedia.org/wikipedia/commons/f/f4/The_Scream.jpg')
        ];
    }

    public static function getById($id) {
        $paintings = self::getAll();
        foreach ($paintings as $painting) {
            if ($painting->getId() === $id) {
                return $painting;
            }
        }
        return null;
    }
}
?>
