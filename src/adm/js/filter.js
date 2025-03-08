let filterElement = document.querySelector('.filter')


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