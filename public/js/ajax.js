$(function() {

    $("#search").on("input", function() {       
        
        let pesquisa = $("#search").val();

        if(pesquisa.trim() != ''){
            $.ajax({
                url: "ajax_proc.php", 
                type: "GET", 
                data: { pesquisa: pesquisa }, 
                success: function(result) {
                    let ajaxAnaisData = constructorAjaxAnaisData(JSON.parse(result))
                    
                    renderAjaxAnais(ajaxAnaisData);

                    prepareModalInfo(ajaxAnaisData)
                },
                error: function(e) {
                    
                    console.log(e)
    
                }
            
            });    
        }
        
        
        
        
    });
});
