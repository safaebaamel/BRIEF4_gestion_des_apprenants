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