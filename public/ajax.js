$(function() {
    // Evento disparado quando o usuário digita no campo de pesquisa
    $(".search").on("input", function() {
        // Captura o valor digitado no campo de pesquisa
        
        let pesquisa = $(".search").val();

        // Envia uma requisição AJAX para o servidor com o valor do campo de pesquisa
        $.ajax({
            url: "ajax_proc.php", // URL do arquivo PHP que processará a pesquisa
            type: "GET", // Tipo de requisição (pode ser "POST" dependendo do caso)
            data: { pesquisa: pesquisa }, // Dados enviados para o servidor
            success: function(result) {
                // Atualiza a div .result com o resultado retornado pelo servidor
                $(".result").html(result);
            },
            error: function() {
                // Exibe uma mensagem de erro caso a requisição falhes
                $(".result").html("Error");
            }
        });
    });
});
