let btnDialogUpload = document.querySelector(".btn-upload");
let dialogUpload = document.querySelector(".dialog-upload-anais");
let closeDialogUpload = document.querySelector(".close-upload");

let btnDialogDelete = document.querySelectorAll(".btn-delete");
let dialogDelete = document.querySelector(".dialog-delete-anais");
let btnDeleteAnais = document.querySelector(".btn-delete-anais");
let closeDialogDelete = document.querySelector(".btn-delete-anais-close");



let btnDialogUpdate = document.querySelectorAll(".btn-update");
let dialogUpdate = document.querySelector(".update-anais");
let closeDialogUpdate = document.querySelector(".close-update");



btnDialogUpload.addEventListener("click", function(){
    dialogUpload.showModal();
})
closeDialogUpload.addEventListener("click", function(e){
    e.preventDefault();

    dialogUpload.close();
})

btnDialogUpdate.forEach(btn => {
    btn.addEventListener("click", function(){
        dialogUpdate.showModal();
    })
})

closeDialogUpdate.addEventListener("click", function(){
        dialogUpdate.close();
})

btnDialogDelete.forEach(btn =>{
    btn.addEventListener("click", function(){
        dialogDelete.showModal();
    })
})

btnDeleteAnais.addEventListener("click", function(){
    dialogDelete.close()
})

closeDialogDelete.addEventListener("click", function(){
    dialogDelete.close();
})



