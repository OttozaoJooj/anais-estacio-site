let iptSearch = document.querySelector("#search");
let resultAnaisContainer = document.querySelector('.result-anais-content')

//to clear results if the input text is empty
iptSearch.addEventListener("input", () =>{
    if(!iptSearch.value){
        resultAnaisContainer.innerHTML = ""
    }
});