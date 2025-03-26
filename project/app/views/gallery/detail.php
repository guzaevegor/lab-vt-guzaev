<div class="painting-detail">
    <h2><?= $this->painting->getTitle() ?></h2>
    <img src="<?= $this->painting->getImage() ?>" alt="<?= $this->painting->getTitle() ?>">
    <p><?= $this->painting->getDescription() ?></p>

    <div class="notes-section">
        <h3>Ваши заметки:</h3>
        <textarea class="notes-area" id="notes_<?= $this->painting->getId() ?>"></textarea>
        <button class="save-button" data-id="<?= $this->painting->getId() ?>">Сохранить заметки</button>
    </div>

    <a href="index.php">Вернуться к галерее</a>
</div>
