$(function() {

    $("#search").on("input", function() {       
        
        let pesquisa = $("#search").val();



        if(pesquisa.trim() != ''){
            $.ajax({
                url: "ajax_proc.php", 
                type: "GET", 
                data: { pesquisa: pesquisa.trim() }, 
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
