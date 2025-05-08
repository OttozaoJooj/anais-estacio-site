function constructorAjaxAnaisData(jsonDataParsed){
    let ajaxAnaisData = [];

    jsonDataParsed.forEach(data => {
        let idAnais = data.id_anais;
        let instituicao = data.instituicao
        let tema = data.tema
        let evento = data.evento
        let descricao = data.descricao
        let isbn = data.isbn
        let ano = data.ano
        let createAt = data.create_at
        let filePath = data.file_path

        ajaxAnaisData[`ajax-anais-${idAnais}`] = {
            idAnais: idAnais,
            instituicao: instituicao,
            tema: tema,
            evento: evento,
            descricao: descricao,
            ano: ano,
            isbn: isbn,
            createAt: createAt,
            filePath: filePath
        }

        
                
    });
    return ajaxAnaisData;
}

let modalInfoContainer = document.querySelector(".modal-info-anais")

// Event Click in Btn Close Modal
let btnCloseModalInfo = document.querySelector(".btn-close-modal-info")
btnCloseModalInfo.addEventListener('click', () =>{
    modalInfoContainer.classList.remove("open-modal")
})


function prepareModalInfo(ajaxAnaisData){

    // Event Click in Btns to Open Modal
    let btnOpenModalInfo = document.querySelectorAll(".btn-open-modal-info > button")

    btnOpenModalInfo.forEach((btn) =>{

        btn.addEventListener("click", (e)=>{

            let idAnaisClicked = e.target.parentElement.previousElementSibling.textContent
            let temaModal = document.querySelector(".modal-tema")
            let eventoModal = document.querySelector(".modal-evento")
            let isbnModal = document.querySelector(".modal-isbn")
            let instituicaoModal = document.querySelector(".modal-instituicao")
            let anoModal = document.querySelector(".modal-ano")
            let descricaoModal =  document.querySelector(".modal-descricao")
            let btnLinkViewerPDF = document.querySelector(".btn-link-viewer-pdf")
            let btnLinkDownload = document.querySelector(".btn-link-download")

            let anaisDataClicked = ajaxAnaisData[`ajax-anais-${idAnaisClicked}`]
            console.log(anaisDataClicked)
            temaModal.textContent = anaisDataClicked.tema
            eventoModal.textContent = anaisDataClicked.evento
            isbnModal.textContent = anaisDataClicked.isbn
            instituicaoModal.textContent = anaisDataClicked.instituicao
            anoModal.textContent = anaisDataClicked.ano
            descricaoModal.textContent = anaisDataClicked.descricao
            btnLinkViewerPDF.href = 'uploads/' + anaisDataClicked.filePath
            btnLinkDownload.href = 'uploads/' + anaisDataClicked.filePath
            
            //console.log(anaisDataClicked.filePath.slice(56))

            modalInfoContainer.classList.add("open-modal")
        })

    })

}
prepareModalInfo()




let iptSearch = document.querySelector("#search");
let resultAnaisContainer = document.querySelector('.result-anais-content')

//to clear results if the input text is empty
iptSearch.addEventListener("input", () =>{
    if(!iptSearch.value){
        resultAnaisContainer.innerHTML = ""
    }
});


function renderAjaxAnais(ajaxAnaisData){
    let resultAnaisContainer = document.querySelector('.result-anais-content')
    
    resultAnaisContainer.innerHTML = ''

    Object.entries(ajaxAnaisData).forEach(anais =>{
        let currentAnais = anais[1]

        resultAnaisContainer.innerHTML += `
            <hr class="line">\n
            <div class="anais">\n
                <div class="tema-modal-info-anais">\n
                    <h2>${currentAnais.tema}</h2>\n
                    <span style="display:none;">${currentAnais.idAnais}</span>\n
                    <div class="btn-open-modal-info">\n
                        <button>Baixar</button>\n
                    </div>\n
                </div>\n
                <div class="evento-isbn-anais">\n
                    <h3>${currentAnais.evento}</h3>\n
                    <span>${currentAnais.isbn}</span>\n
                </div>\n
                <div class="details-anais">\n
                    <span class="instituicao">${currentAnais.instituicao}</span>\n
                    <span class="ano">${currentAnais.ano}</span>\n
                </div>\n
                
            </div>\n
        ` 
    })
      

}


function renderNoResultsAlert(){
    
    
    let resultAnaisContent = document.querySelector(".result-anais-content");
    
    resultAnaisContent.innerHTML = `
     <div class="no-results-alert-content">
        <h1>Sem Resultados.</h1>
        <p>Essas informações não estão no nosso banco de dados.</p>
    </div>
        `
}

$(function() {

    $("#search").on("input", function() {       
        
        let pesquisa = $("#search").val();
        let searchFilterCurso = $('#search-filter').val();

        
        if(pesquisa.trim() != ''){
            $.ajax({
                url: "index_proc.php", 
                type: "GET", 
                data: { 
                    pesquisa: pesquisa.trim(),
                    searchFilterCurso: searchFilterCurso               
                }, 
                success: function(result) {
                   
                    let anaisDataJSONParsed = JSON.parse(result)
                
                    // If the result return nothing from ajax_proc.php
                    if(Object.keys(anaisDataJSONParsed)[0] == "noresult"){                        
                        
                        renderNoResultsAlert();                        
                        return;
                
                    }

                    let ajaxAnaisData = constructorAjaxAnaisData(anaisDataJSONParsed);
                    
                    renderAjaxAnais(ajaxAnaisData);

                    prepareModalInfo(ajaxAnaisData);  
                },
                error: function(e) {
                    
                    console.log(e)
    
                }
            
            });    
        }
        
        
        
        
    });
});
