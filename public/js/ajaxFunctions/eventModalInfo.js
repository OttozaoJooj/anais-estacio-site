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

            temaModal.textContent = anaisDataClicked.tema
            eventoModal.textContent = anaisDataClicked.evento
            isbnModal.textContent = anaisDataClicked.isbn
            instituicaoModal.textContent = anaisDataClicked.instituicao
            anoModal.textContent = anaisDataClicked.ano
            descricaoModal.textContent = anaisDataClicked.descricao
            btnLinkViewerPDF.href = '../src/adm/uploads/anais' + anaisDataClicked.filePath.slice(56)
            btnLinkDownload.href = '../src/adm/uploads/anais' + anaisDataClicked.filePath.slice(56)
            
            //console.log(anaisDataClicked.filePath.slice(56))

            modalInfoContainer.classList.add("open-modal")
        })

    })

}
prepareModalInfo()


