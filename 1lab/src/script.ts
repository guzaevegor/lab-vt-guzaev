// Интерфейс для описания объекта картины
interface Painting {
    id: string;
    title: string;
    description: string;
    image: string;
}

// Массив с данными о картинах
const paintings: Painting[] = [
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
        image: 'https://upload.wikimedia.org/wikipedia/commons/e/ea/The_Starry_Night.jpg'
    },
    {
        id: 'painting3',
        title: 'Крик',
        description: 'Известная картина Эдварда Мунка, выражающая экзистенциальное страдание.',
        image: 'https://upload.wikimedia.org/wikipedia/commons/f/f4/The_Scream.jpg'
    }
];

// Функция для загрузки сохранённых заметок из localStorage
function loadNotes(id: string): string {
    return localStorage.getItem('notes_' + id) || '';
}

// Функция для сохранения заметок в localStorage
function saveNotes(id: string, notes: string): void {
    localStorage.setItem('notes_' + id, notes);
}

// Функция для создания блока с картиной и заметками
function createPaintingBlock(painting: Painting): HTMLElement {
    const block: HTMLDivElement = document.createElement('div');
    block.className = 'painting-block';

    const title: HTMLHeadingElement = document.createElement('h2');
    title.textContent = painting.title;
    block.appendChild(title);

    if (painting.image) {
        const img: HTMLImageElement = document.createElement('img');
        img.src = painting.image;
        img.alt = painting.title;
        block.appendChild(img);
    }

    const description: HTMLParagraphElement = document.createElement('p');
    description.textContent = painting.description;
    block.appendChild(description);

    const notesLabel: HTMLLabelElement = document.createElement('label');
    notesLabel.textContent = 'Ваши заметки:';
    block.appendChild(notesLabel);

    const notesArea: HTMLTextAreaElement = document.createElement('textarea');
    notesArea.className = 'notes-area';
    notesArea.value = loadNotes(painting.id);
    block.appendChild(notesArea);

    const saveButton: HTMLButtonElement = document.createElement('button');
    saveButton.textContent = 'Сохранить заметки';
    saveButton.className = 'save-button';
    saveButton.addEventListener('click', () => {
        saveNotes(painting.id, notesArea.value);
        alert('Заметки сохранены!');
    });
    block.appendChild(saveButton);

    return block;
}

// Отрисовка блоков картин на странице
const gallery: HTMLElement | null = document.getElementById('gallery');
if (gallery) {
    paintings.forEach((painting: Painting) => {
        const block = createPaintingBlock(painting);
        gallery.appendChild(block);
    });
}
