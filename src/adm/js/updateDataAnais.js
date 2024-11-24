let btnUpdate = document.querySelectorAll(".btn-update")

let iptInstituicao = document.querySelector(".ipt-instituicao")
let iptEvento = document.querySelector(".ipt-evento")
let iptTema = document.querySelector(".ipt-tema")
let iptDescricao = document.querySelector(".ipt-descricao")
let iptIsbn = document.querySelector(".ipt-isbn")
let iptAno = document.querySelector(".ipt-ano")
let iptID = document.querySelector(".ipt-id")

btnUpdate.forEach(btn => {
    btn.addEventListener("click", function(){
        let idFileAnais = btn.parentElement.parentElement.querySelector(".id").textContent
        anaisSelectedData = anaisData[`anais-${idFileAnais}`]
    
        iptID.value = anaisSelectedData.id
        iptInstituicao.value = anaisSelectedData.instituicao
        iptEvento.value = anaisSelectedData.evento
        iptTema.value = anaisSelectedData.tema
        iptDescricao.value = anaisSelectedData.descricao
        iptIsbn.value = anaisSelectedData.isbn
        iptAno.value = anaisSelectedData.ano
        
    
    })
})
