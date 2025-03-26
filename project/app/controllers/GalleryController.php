<?php
class GalleryController {
    public function index() {
        // Получаем все картины
        $paintings = Painting::getAll();

        // Отображаем представление с картинами
        $view = new View();
        $view->render('gallery/index', [
            'paintings' => $paintings,
            'title' => 'Галерея картин'
        ]);
    }

    public function detail($id) {
        // Получаем картину по ID
        $painting = Painting::getById($id);

        if (!$painting) {
            // Если картина не найдена, перенаправляем на главную
            header('Location: index.php');
            exit;
        }

        // Отображаем представление с деталями картины
        $view = new View();
        $view->render('gallery/detail', [
            'painting' => $painting,
            'title' => $painting->getTitle()
        ]);
    }
}
?>
