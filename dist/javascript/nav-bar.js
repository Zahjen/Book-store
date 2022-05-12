let menuItems = document.querySelectorAll(".part-link-page");

for (let i = 0; i < menuItems.length; i++) {
    menuItems[i].addEventListener('click', () => {
        let j = 0;

        while (j < menuItems.length) {
            menuItems[j++].className = "part-link-page";
        }

        menuItems[i].className = "part-link-page active";
    });
}