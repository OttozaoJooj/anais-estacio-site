let anaisElements = document.querySelectorAll(".anais");

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
