document.addEventListener("DOMContentLoaded", function () {
    var books = document.getElementsByClassName("single-product");
    for (var i = 0; i < books.length; i++) {
        books[i].classList.add("fade-in");
    }
});

