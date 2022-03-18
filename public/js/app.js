let toogle = document.querySelector('.toogle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('main');
let titles = document.querySelectorAll('.title');

function showAndHideToogle() {
    navigation.classList.toggle('active');
    main.classList.toggle('active');
    titles.forEach((title) => {
        title.classList.toggle("menu-content");
    });
}

toogle.addEventListener('click', showAndHideToogle);