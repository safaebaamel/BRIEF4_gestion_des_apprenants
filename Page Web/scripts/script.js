$(document).ready(function() {
    $('.btn').click(function() {
        $('.nav_links').toggleClass("show");
        $('ul li').toggleClass("hide");

    });
});


const form = document.getElementById('form')
const name = document.getElementById('name')
const email = document.getElementById('email')
const errorElement = document.getElementById('error')
const message = document.getElementById('message')

form.addEventListener('submit', (e) => {
    let messages  = []
    if (name.value == '' || name.value == null) {
        messages.push('Name is required')
    }
    if (message.length < 6) {
        prompt('Password mush be longer than 6 characters')
    }

    if (messages.length > 0) {
    e.preventDefault()
    errorElement.innerText = messages.join(', ')
    }

})