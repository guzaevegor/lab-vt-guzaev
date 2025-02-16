var _a;
// Данные изображений
var images = [
    {
        id: 1,
        title: "Рассвет в горах",
        url: "https://picsum.photos/seed/mountain/600/400",
        description: "Живописный рассвет в горной местности",
        comments: []
    },
    {
        id: 2,
        title: "Лесная тишина",
        url: "https://picsum.photos/seed/forest/600/400",
        description: "Тихий уголок векового леса",
        comments: []
    }
];
// Инициализация галереи
function initializeGallery() {
    var galleryContainer = document.getElementById('galleryContainer');
    images.forEach(function (image) {
        var card = document.createElement('div');
        card.className = 'image-card';
        card.innerHTML = "\n            <img src=\"".concat(image.url, "\" class=\"image-thumbnail\" alt=\"").concat(image.title, "\">\n            <div class=\"image-info\">\n                <h3>").concat(image.title, "</h3>\n                <p>").concat(image.description, "</p>\n            </div>\n        ");
        card.addEventListener('click', function () { return openModal(image); });
        galleryContainer.appendChild(card);
    });
}
// Открытие модального окна для просмотра изображения и комментариев
function openModal(image) {
    var modal = document.getElementById('imageModal');
    var modalImage = document.getElementById('modalImage');
    var titleElement = document.getElementById('imageTitle');
    var descElement = document.getElementById('imageDescription');
    var commentsList = document.getElementById('commentsList');
    modal.style.display = 'block';
    modalImage.src = image.url;
    titleElement.textContent = image.title;
    descElement.textContent = image.description;
    // Очистка предыдущих комментариев
    commentsList.innerHTML = '';
    // Добавление комментариев
    image.comments.forEach(function (comment) {
        var li = document.createElement('li');
        li.innerHTML = "\n            <strong>".concat(comment.author, "</strong>\n            <span>").concat(comment.date.toLocaleDateString(), "</span>\n            <p>").concat(comment.text, "</p>\n        ");
        commentsList.appendChild(li);
    });
    // Обработчик закрытия модального окна
    var closeBtn = document.querySelector('.close');
    closeBtn.addEventListener('click', function () {
        modal.style.display = 'none';
    });
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
}
// Обработчик формы комментариев
(_a = document.getElementById('commentForm')) === null || _a === void 0 ? void 0 : _a.addEventListener('submit', function (e) {
    e.preventDefault();
    var authorInput = document.getElementById('authorName');
    var commentInput = document.getElementById('commentText');
    if (!authorInput.value.trim() || !commentInput.value.trim()) {
        alert('Пожалуйста, заполните все поля');
        return;
    }
    var newComment = {
        author: authorInput.value,
        text: commentInput.value,
        date: new Date()
    };
    // Добавление комментария к текущему изображению
    var modalImageElement = document.getElementById('modalImage');
    var currentImage = images.find(function (img) { return img.url === modalImageElement.src; });
    if (currentImage) {
        currentImage.comments.push(newComment);
        var commentsList = document.getElementById('commentsList');
        var li = document.createElement('li');
        li.innerHTML = "\n            <strong>".concat(newComment.author, "</strong>\n            <span>").concat(newComment.date.toLocaleDateString(), "</span>\n            <p>").concat(newComment.text, "</p>\n        ");
        commentsList.appendChild(li);
    }
    // Очистка формы
    authorInput.value = '';
    commentInput.value = '';
});
// Инициализация галереи при загрузке страницы
document.addEventListener('DOMContentLoaded', initializeGallery);
