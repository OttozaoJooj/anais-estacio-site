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


