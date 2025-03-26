document.addEventListener('DOMContentLoaded', function() {
    // Загрузка заметок из localStorage
    const notesAreas = document.querySelectorAll('.notes-area');
    notesAreas.forEach(function(textarea) {
        const id = textarea.id.replace('notes_', '');
        textarea.value = localStorage.getItem('notes_' + id) || '';
    });

    // Обработка кнопок сохранения
    const saveButtons = document.querySelectorAll('.save-button');
    saveButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const id = this.dataset.id;
            const notes = document.getElementById('notes_' + id).value;

            // Сохраняем в localStorage
            localStorage.setItem('notes_' + id, notes);

            // Отправляем на сервер (AJAX)
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'index.php?controller=Notes&action=save', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert('Заметки сохранены!');
                }
            };
            xhr.send('paintingId=' + encodeURIComponent(id) + '&text=' + encodeURIComponent(notes));
        });
    });
});
