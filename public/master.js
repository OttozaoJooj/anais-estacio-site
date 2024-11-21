$(function() {
    // Evento disparado quando o usuário digita no campo de pesquisa
    $(".search").on("keyup", function() {
        // Captura o valor digitado no campo de pesquisa
        var pesquisa = $(".search").val();

        // Envia uma requisição AJAX para o servidor com o valor do campo de pesquisa
        $.ajax({
            url: "load.php", // URL do arquivo PHP que processará a pesquisa
            type: "GET", // Tipo de requisição (pode ser "POST" dependendo do caso)
            data: { pesquisa: pesquisa }, // Dados enviados para o servidor
            success: function(result) {
                // Atualiza a div .result com o resultado retornado pelo servidor
                $(".result").html(result);
            },
            error: function() {
                // Exibe uma mensagem de erro caso a requisição falhe
                $(".result").html("Error");
            }
        });
    });
});
