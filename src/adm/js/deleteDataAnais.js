btnDelete = document.querySelectorAll(".btn-delete")
iptIDDelete = document.querySelector(".ipt-id-delete")
//console.log(btnDelete);

btnDelete.forEach(btn => {
    btn.addEventListener('click', function(){
        let idFileAnais = btn.parentElement.parentElement.querySelector(".id").textContent

        iptIDDelete.value = anaisData[`anais-${idFileAnais}`].id

        
        

    })
    
});