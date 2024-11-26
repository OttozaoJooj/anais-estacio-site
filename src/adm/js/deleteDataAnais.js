btnDelete = document.querySelectorAll(".btn-delete")
iptIDDelete = document.querySelector(".ipt-id-delete")
iptFilePath = document.querySelector(".ipt-file-path")

//console.log(btnDelete);

btnDelete.forEach(btn => {
    btn.addEventListener('click', function(){
        let idFileAnais = btn.parentElement.parentElement.querySelector(".id").textContent


        iptIDDelete.value = anaisData[`anais-${idFileAnais}`].id
        iptFilePath.value = anaisData[`anais-${idFileAnais}`].nomeArquivo
        

        
        

    })
    
});