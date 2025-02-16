// Массив с данными о картинах
var paintings = [
    {
        id: 'painting1',
        title: 'Мона Лиза',
        description: 'Картина Леонардо да Винчи, известная своей загадочной улыбкой.',
        image: 'https://upload.wikimedia.org/wikipedia/commons/6/6a/Mona_Lisa.jpg'
    },
    {
        id: 'painting2',
        title: 'Звёздная ночь',
        description: 'Великая картина Винсента Ван Гога, изображающая ночное небо с яркими звёздами.',
        image: 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg/757px-Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg'
    },
    {
        id: 'painting3',
        title: 'Крик',
        description: 'Известная картина Эдварда Мунка, выражающая экзистенциальное страдание.',
        image: 'https://upload.wikimedia.org/wikipedia/commons/f/f4/The_Scream.jpg'
    }
];
// Функция для загрузки сохранённых заметок из localStorage
function loadNotes(id) {
    return localStorage.getItem('notes_' + id) || '';
}
// Функция для сохранения заметок в localStorage
function saveNotes(id, notes) {
    localStorage.setItem('notes_' + id, notes);
}
// Функция для создания блока с картиной и заметками
function createPaintingBlock(painting) {
    var block = document.createElement('div');
    block.className = 'painting-block';
    var title = document.createElement('h2');
    title.textContent = painting.title;
    block.appendChild(title);
    if (painting.image) {
        var img = document.createElement('img');
        img.src = painting.image;
        img.alt = painting.title;
        block.appendChild(img);
    }
    var description = document.createElement('p');
    description.textContent = painting.description;
    block.appendChild(description);
    var notesLabel = document.createElement('label');
    notesLabel.textContent = 'Ваши заметки:';
    block.appendChild(notesLabel);
    var notesArea = document.createElement('textarea');
    notesArea.className = 'notes-area';
    notesArea.value = loadNotes(painting.id);
    block.appendChild(notesArea);
    var saveButton = document.createElement('button');
    saveButton.textContent = 'Сохранить заметки';
    saveButton.className = 'save-button';
    saveButton.addEventListener('click', function () {
        saveNotes(painting.id, notesArea.value);
        alert('Заметки сохранены!');
    });
    block.appendChild(saveButton);
    return block;
}
// Отрисовка блоков картин на странице
var gallery = document.getElementById('gallery');
if (gallery) {
    paintings.forEach(function (painting) {
        var block = createPaintingBlock(painting);
        gallery.appendChild(block);
    });
}
