function constructorAjaxAnaisData(jsonDataParsed){
    let ajaxAnaisData = [];

    jsonDataParsed.forEach(data => {
        let idAnais = data.id_anais;
        let instituicao = data.instituicao
        let tema = data.tema
        let evento = data.evento
        let descricao = data.descricao
        let isbn = data.isbn
        let ano = data.ano
        let createAt = data.create_at
        let filePath = data.file_path

        ajaxAnaisData[`ajax-anais-${idAnais}`] = {
            idAnais: idAnais,
            instituicao: instituicao,
            tema: tema,
            evento: evento,
            descricao: descricao,
            ano: ano,
            isbn: isbn,
            createAt: createAt,
            filePath: filePath
        }

        
                
    });
    return ajaxAnaisData;
}