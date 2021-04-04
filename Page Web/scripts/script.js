$(document).ready(function() {
    $('.btn').click(function() {
        $('.nav_links').toggleClass("show");
        $('ul li').toggleClass("hide");

    });
});

//dashbord script

var add = document.querySelector(".add");
var btns = document.querySelectorAll(".edit_etudiant");
var closeModal = document.querySelectorAll(".close");

const onModalClosed = (event) => {
    console.log("CLOSE MODAL");
    event.target.parentElement.parentElement.parentElement.classList.toggle("hidden");
}

add.addEventListener("click", () => {
    document.querySelector("#modal").classList.toggle("hidden");
})


const onBtnClicked = (event) => {
    console.log("yaw yaw yaw", event.target.parentElement)
    const id = event.target.parentElement.getAttribute('data-id');
    console.log("ID : ", id);
    const modal = document.querySelector(`#modal-${id}`)
    console.log("modal ", modal);
    if (!modal) return;
    console.log(modal.classList)
    modal.classList.toggle('hidden');
}


btns.forEach(btn => btn.addEventListener("click", onBtnClicked));
closeModal.forEach(btn => btn.addEventListener("click", onModalClosed));


// REGEX PART

function requiredFieldemail() {
    var email = document.getElementById('email').value; 
    var mailpattern =/^[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,}$/;

    if (email.length <= 0) {
        document.getElementById('error').innerHTML = "Field empty";
        return false;
    } else if (!email.match(mailpattern)) {
        document.getElementById('error').innerHTML = "The email format should be name@example.com";
        return false;
    } else if (email.match(mailpattern)){
        document.getElementById('error').innerHTML = "";
        return true;
    }
}

function requiredFieldpasswd() {
    var passwd = document.getElementById('password').value;
    var passwdpattern = /[a-zA-Z0-9]{5,}/;

    if (passwd.length === 0) {
        document.getElementById('error').innerHTML = "Field empty";
    }
    else if (!passwd.match(passwdpattern)) {
        document.getElementById('error').innerHTML = "The password should match the appropriat format";
        return false;
    } else {
        document.getElementById('error').innerHTML = "";
        return true;
    }
}

function requiredFieldName() {
    var name = document.getElementById('nom').value;
    var namepattern = /^[a-zA-Z]{3,}/;

    if (name.length === 0) {
        document.getElementById('error').innerHTML = "Name Field empty";
    }
    else if (!name.match(namepattern)) {
        document.getElementById('error').innerHTML = "The name should match the appropriat format";
        return false;
    } else {
        document.getElementById('error').innerHTML = "";
        return true;
    }
}

function requiredFieldlName() {
    var name = document.getElementById('prenom').value;
    var namepattern = /^\[a-zA-Z] \[a-zA-Z]$/g;

    if (name.length === 0) {
        document.getElementById('error').innerHTML = "Field empty";
    }
    else if (!name.match(namepattern)) {
        document.getElementById('error').innerHTML = "The name should match the appropriat format";
        return false;
    } else {
        document.getElementById('error').innerHTML = "";
        return true;
    }
}

function requiredFieldlProf() {
    var name = document.getElementById('professeur').value;
    var namepattern = /^\[a-zA-Z] \[a-zA-Z]$/g;

    if (name.length === 0) {
        document.getElementById('error').innerHTML = "Field empty";
    }
    else if (!name.match(namepattern)) {
        document.getElementById('error').innerHTML = "The name should match the appropriat format";
        return false;
    } else {
        document.getElementById('error').innerHTML = "";
        return true;
    }
}

