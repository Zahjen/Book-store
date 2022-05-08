const url = '../../modele/ajax/book.php';
const lastContainer = document.querySelector('.last-container');

function createBookItem(title, author) {
    let item = `
        <div class="last-book-container">
            <img src="https://via.placeholder.com/100x150" class="last-book-img">
            <div class="last-book-text">
                <span class="last-book-title">${title}</span>
                <span class="last-book-author">${author}</span>
                <a href="">More</a>
            </div>
        </div>
    `;

    return item;
}

function getAll() {
    fetch(url, {
        method: "GET",
        headers: new Headers(),
        mode: 'cors',
        cache: 'default'
    })
    .then((response) => {
        return response.json();
    })
    .then((json) => {
        for (book of json) {
            lastContainer.innerHTML += createBookItem(book.title, book.id_author)
        }
    })
    .catch((err) => {
        console.log(err);
    });
}

getAll();
