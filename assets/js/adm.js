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

function getBasename(path){
    return path.slice(path.lastIndexOf('/') + 1);
}

function renderAnaisDataFilted(anaisData){
    const anaisContainer = document.querySelector('.anais-container');

    while(anaisContainer.firstChild){
        anaisContainer.removeChild(anaisContainer.firstChild)
    }

    

    anaisData.forEach(anais => {
        console.log(anais['id_anais'])
        
        
        anaisContainer.innerHTML +=  `
            <tr class="anais">
                <th scope="row" class="id">${anais['id_anais']}</th>
                <td class="instituicao">${anais['instituicao']}</td>
                <td class="evento">${anais['evento']}</td>
                <td class="tema">${anais['tema']}</td>
                <td class="descricao">${anais['descricao']}</td>
                <td class="isbn">${anais['isbn']}</td>
                <td class="ano">${anais['ano']}</td>
                <td class="nome-arquivo">${getBasename(anais['file_path'])}</td>
                <td class="acoes"><button class="btn-update btn">Atualizar</button> <button class="btn-delete btn">Excluir</button> <a class="btn-viewer btn" href="${'../uploads/' + getBasename(anais['file_path'])}" target="_blank">Ver</a></td>
            </tr>
        `     
    });  


}

let filterElement = document.querySelector('.filter')

function sendAjax(value){
    
    let docenteId = sessionStorage.getItem('id_docente');


    fetch("src/adm_proc.php", {
        method: "POST",
        body: "tipo-form=filter&tipo-filter=" + value + "&id_docente=" + docenteId,
        headers: {"Content-Type": "application/x-www-form-urlencoded"}
    })
    .then(response => response.json())
    .then(data => renderAnaisDataFilted(data));
    

}

filterElement.addEventListener("change", (e) =>{
    let typeOfFilter = e.target.value;
    sendAjax(typeOfFilter);
} )





// Modal Functions


