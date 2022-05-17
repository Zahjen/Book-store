const url = '../../../controller/book/book-search.php?statement=';
const resultContainer = document.querySelector('.result-container');
const searchButton = document.querySelector('#search-bar-btn');
const inputValue = document.querySelector('#search-bar-input');

function createBookItem(book) {
    let item = `
        <div class="result-book-container">
            <span class="result-book-title">${book.title}</span>

            <a href="book-detail.php?id_book=${book.id_book}">More</a>
        </div>
    `;

    return item;
}

function getBySearch() {
    resultContainer.innerHTML = "";

    fetch(url + inputValue.value, {
        method: "GET",
        headers: new Headers(),
        mode: 'cors',
        cache: 'default',
    })
    .then((response) => {
        return response.json();
    })
    .then((json) => {
        let length = Object.keys(json).length
        
        for (i = 0 ; i < length ; i++) {
            resultContainer.innerHTML += createBookItem(json[i])
        }
    })
    .catch((err) => {
        console.log(err);
    });
}

searchButton.addEventListener('click', getBySearch);
