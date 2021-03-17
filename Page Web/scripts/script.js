$(document).ready(function() {
    $('.btn').click(function() {
        $('.nav_links').toggleClass("show");
        $('ul li').toggleClass("hide");

    });
});
var add = document.querySelector(".add");
var close = document.querySelector(".close");
close.addEventListener("click", () => {

    close.parentElement.parentElement.parentElement.classList.toggle("hidden");
})
add.addEventListener("click", () => {

    close.parentElement.parentElement.parentElement.classList.toggle("hidden");
})