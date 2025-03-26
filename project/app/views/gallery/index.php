<div id="gallery">
    <?php foreach ($this->paintings as $painting): ?>
        <div class="painting-block">
            <h2><?= $painting->getTitle() ?></h2>
            <img src="<?= $painting->getImage() ?>" alt="<?= $painting->getTitle() ?>">
            <p><?= $painting->getDescription() ?></p>

            <label>Ваши заметки:</label>
            <textarea class="notes-area" id="notes_<?= $painting->getId() ?>"></textarea>
            <button class="save-button" data-id="<?= $painting->getId() ?>">Сохранить заметки</button>
        </div>
    <?php endforeach; ?>
</div>
