let btnDialogUpload = document.querySelector(".btn-upload");
let dialogUpload = document.querySelector(".dialog-upload-anais");
let closeDialogUpload = document.querySelector(".close-upload");

let dialogDelete = document.querySelector(".dialog-delete-anais");
let btnDeleteAnais = document.querySelector(".btn-delete-anais");
let closeDialogDelete = document.querySelector(".btn-delete-anais-close");


let dialogUpdate = document.querySelector(".update-anais");
let closeDialogUpdate = document.querySelector(".close-update");


btnDialogUpload.addEventListener("click", function(){
    dialogUpload.showModal();
})
closeDialogUpload.addEventListener("click", function(e){
    e.preventDefault();

    dialogUpload.close();
})

closeDialogUpdate.addEventListener("click", function(){
        dialogUpdate.close();
})

btnDeleteAnais.addEventListener("click", function(){
    dialogDelete.close()
})

closeDialogDelete.addEventListener("click", function(){
    dialogDelete.close();
})


function prepareAnaisData(anaisElements){
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
    
    })

    return anaisData;
    
}

function prepareActionUpdate(anaisData){

    function fillModalUpdate(e){
         // Encontrando o id do anais na tabela
         let idAnaisElement = e.target.parentElement.parentElement.querySelector(".id").textContent

         console.log(idAnaisElement + ": Deu certo")
         // Consultando os dados do id selecionado
         anaisSelectedData = anaisData[`anais-${idAnaisElement}`]
     
         // Preenchendo Inputs do Modal Update
         let iptInstituicao = document.querySelector(".ipt-instituicao")
         let iptEvento = document.querySelector(".ipt-evento")
         let iptTema = document.querySelector(".ipt-tema")
         let iptDescricao = document.querySelector(".ipt-descricao")
         let iptIsbn = document.querySelector(".ipt-isbn")
         let iptAno = document.querySelector(".ipt-ano")
         let iptIDUpdate = document.querySelector(".ipt-id-update")

         iptIDUpdate.value = anaisSelectedData.id
         iptInstituicao.value = anaisSelectedData.instituicao
         iptEvento.value = anaisSelectedData.evento
         iptTema.value = anaisSelectedData.tema
         iptDescricao.value = anaisSelectedData.descricao
         iptIsbn.value = anaisSelectedData.isbn
         iptAno.value = anaisSelectedData.ano

         // Exibir o Modal
         dialogUpdate.showModal();
    }

    let btnDialogUpdate = document.querySelectorAll(".btn-update");

    btnDialogUpdate.forEach(btn => { btn.addEventListener("click", fillModalUpdate);})
    
}

function prepareActionDelete(anaisData){

    function fillModalDelete(e){
           // Selecionando elementos do ID e FilePath do anais que será deletado
           let iptIDDelete = document.querySelector(".ipt-id-delete")
           let iptFilePath = document.querySelector(".ipt-file-path")

           // Encontrando o id do anais no HTML
           let idAnaisElement = e.target.parentElement.parentElement.querySelector(".id").textContent
   
           // Preenchendo Hidden Inputs do Modal Delete
           iptIDDelete.value = anaisData[`anais-${idAnaisElement}`].id
           iptFilePath.value = anaisData[`anais-${idAnaisElement}`].nomeArquivo


           dialogDelete.showModal();
    }

    let btnDialogDelete = document.querySelectorAll(".btn-delete");

    btnDialogDelete.forEach(btn =>{ btn.addEventListener("click", fillModalDelete) })


}

function prepareActions(){
    let anaisElements = document.querySelectorAll('.anais');

    var anaisData = prepareAnaisData(anaisElements);

    prepareActionUpdate(anaisData);

    prepareActionDelete(anaisData);


}

prepareActions();

// Filters 
function getBasename(path){
    return path.slice(path.lastIndexOf('/') + 1);
}

function renderAnaisDataFilted(anaisDataFilted){
    const anaisContainer = document.querySelector('.anais-container');

    // Apagar os todos os anais da tabela de anais
    while(anaisContainer.firstChild){
        anaisContainer.removeChild(anaisContainer.firstChild)
    }

    // Renderizar os anais diretamente no HTML
    anaisDataFilted.forEach(anais => {
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
    
    prepareActions();
}


async function sendAjax(e){
    let typeOfFilter = e.target.value
    console.log(typeOfFilter)
    let docenteId = sessionStorage.getItem('id_docente');

    let optionsFetch = {
        method: "POST",
        body: "tipo-form=filter&tipo-filter=" + typeOfFilter + "&id_docente=" + docenteId,
        headers: {"Content-Type": "application/x-www-form-urlencoded"}
    };

    let response = await fetch("src/adm_proc.php", optionsFetch);
    
    let data = await response.json();
        
    renderAnaisDataFilted(data);
}

let filterElement = document.querySelector('.filter')


filterElement.addEventListener("change", sendAjax)

