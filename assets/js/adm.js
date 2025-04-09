let anaisElements = document.querySelectorAll(".anais");

btnDelete = document.querySelectorAll(".btn-delete")
iptIDDelete = document.querySelector(".ipt-id-delete")
iptFilePath = document.querySelector(".ipt-file-path")


let btnUpdate = document.querySelectorAll(".btn-update")

let iptInstituicao = document.querySelector(".ipt-instituicao")
let iptEvento = document.querySelector(".ipt-evento")
let iptTema = document.querySelector(".ipt-tema")
let iptDescricao = document.querySelector(".ipt-descricao")
let iptIsbn = document.querySelector(".ipt-isbn")
let iptAno = document.querySelector(".ipt-ano")
let iptIDUpdate = document.querySelector(".ipt-id-update")

let filterElement = document.querySelector('.filter')



let anaisData = {};

anaisElements.forEach(anais =>{
    let idValue = anais.querySelector(".id").textContent;
    let instituicaoValue = anais.querySelector(".instituicao").textContent
    let eventoValue = anais.querySelector(".evento").textContent
    let temaValue = anais.querySelector(".tema").textContent
    let descricaoValue = anais.querySelector(".descricao").textContent
    let isbnValue = anais.querySelector(".isbn").textContent
    let anoValue = anais.querySelector('.ano').textContent
    let nomeArquivoValue = anais.querySelector(".nome-arquivo").textContent


    anaisData[`anais-${idValue}`] = {
        id: idValue,
        instituicao: instituicaoValue,
        evento: eventoValue,
        tema: temaValue,
        descricao: descricaoValue,
        isbn: isbnValue,
        ano: anoValue,
        nomeArquivo: nomeArquivoValue
    }

} )


// Delete Action
btnDelete.forEach(btn => {
    btn.addEventListener('click', function(){
        let idFileAnais = btn.parentElement.parentElement.querySelector(".id").textContent


        iptIDDelete.value = anaisData[`anais-${idFileAnais}`].id
        iptFilePath.value = anaisData[`anais-${idFileAnais}`].nomeArquivo

    })
    
});


// Update Action


btnUpdate.forEach(btn => {
    btn.addEventListener("click", function(){
        let idFileAnais = btn.parentElement.parentElement.querySelector(".id").textContent
        anaisSelectedData = anaisData[`anais-${idFileAnais}`]
    
        iptIDUpdate.value = anaisSelectedData.id
        iptInstituicao.value = anaisSelectedData.instituicao
        iptEvento.value = anaisSelectedData.evento
        iptTema.value = anaisSelectedData.tema
        iptDescricao.value = anaisSelectedData.descricao
        iptIsbn.value = anaisSelectedData.isbn
        iptAno.value = anaisSelectedData.ano
        
    
    })
})


// Filters 


function sendAjax(value){
    //jsonBody["tipo-filter"] = value

    fetch("painel_proc.php", {
        method: "POST",
        body: "tipo-form=ajax&tipo-filter=" + value,
        headers: {"Content-Type": "application/x-www-form-urlencoded"}
    }).then(response => response.json()).then(data => console.log(data))
    

}

filterElement.addEventListener("change", (e) =>{
    sendAjax(e.target.value);
} )





// Modal Functions

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



