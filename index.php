<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Anais Estácio</title>

    <link rel="stylesheet" href="assets/styles/templates_css/header.css">
    <link rel="stylesheet" href="assets/styles/index.css" />
    <link rel="stylesheet" href="assets/styles/templates_css/reset.css">

    <!--Google Fonts API -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,400;0,700;0,900;1,500&display=swap" rel="stylesheet">


</head>
    <body>
<!-- Prompt do ChatGPT: boas práticas para segurança web em php-->
        <div class="modal-info-anais">
            <div class="modal-info-anais-content">
                <div class="btn-close-modal-info">
                    <a><img src="assets/icons/close-modal-icon.png"></a>
                </div>
                <div class="info-anais">
                    <div class="info-tema">
                        <h1 class="modal-tema">Anais de projetos da XX seminário de educação, ciência e tecnologia do estado do pará.</h1>
                    </div>
                    <div class="info-evento-isbn">
                        <h3 class="modal-evento">Seminário de Tecnologia Assistiva</h3>
                        <span class="modal-isbn">123456789</span>
                    </div>
                    <div class="info-details-anais">
                        <span class="modal-instituicao">Instituto Federal de Ciência e Tecnologia do Pará - Campus Castanhal</span>
                        <span class="modal-ano">2024</span>
                    </div>
                </div>
                <hr class="modal-line">
                <div class="descricao-anais">
                    <p class="modal-descricao">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae nisi incidunt quos aliquid, nam quas eaque molestiae natus consectetur eveniet quaerat, aperiam numquam nobis commodi tempora, debitis cumque illum? Quidem! 
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae nisi incidunt quos aliquid, nam quas eaque molestiae natus consectetur eveniet quaerat, aperiam numquam nobis commodi tempora, debitis cumque illum? Quidem! 
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae nisi incidunt quos aliquid, nam quas eaque molestiae natus consectetur eveniet quaerat, aperiam numquam nobis commodi tempora, debitis cumque illum? Quidem! 
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae nisi incidunt quos aliquid, nam quas eaque molestiae natus consectetur eveniet quaerat, aperiam numquam nobis commodi tempora, debitis cumque illum? Quidem! 
                    </p>
                </div>
                <div class="actions-anais">
                    <div class="btn-viewer-pdf">
                        <a class="btn-link-viewer-pdf" href="" target="_blank">Ver PDF</a>
                    </div>
                    <div class="btn-download">
                        <a class="btn-link-download" href=""  download>Baixar</a>
                    </div>
                </div>
            </div>
        </div>
        
        <header>
            <div class="header-img">
                <img src="assets/img/logoEstacio.png">
            </div>
            <div class="btn-sobre">
                <a href="about.php">Sobre</a>
            </div>
        </header>


        <div class="container">
            <div class="title">
                <h1>ANAIS <span>ESTÁCIO</span></h1>
                <p>Pesquise os anais de eventos da <strong>Estácio Campus Castanhal</strong> sobre o curso de <strong>Análise e Desenvolvimento de Sistemas</strong>.</p>
            </div>
            <div class="content">
                <div class="result-anais">
                    <div class="search-anais">
                        <input type="search" name="search-anais" id="search" placeholder="Pesquisa por Instituição, Evento, Tema ou ISBN">
                        <select id="search-filter" class="search-filter filter-curso">
                            <option disabled>-- Curso --</option>
                            <option value="0"  selected>Todos os Cursos</option>
                            <option value="1">Análise e Desenvolvimento de Sistemas</option>
                            <option value="2">Direito</option>
                            <option value="3">Psicologia</option>
                            <option value="4">Fisioterapia</option>
                            <option value="5">Engenharia Civil</option>
                            <option value="6">Administração</option>

                        </select>
                    </div>
                    <div class="result-anais-content">
<!--
                        <hr class="line">
                        <div class="anais">       
                            <div class="tema-modal-info-anais">
                                <h2>Anais de projetos da XX seminário de educação, ciência e tecnologia do estado do pará.</h2>
                                <div class="btn-open-modal-info">
                                    <button>Baixar</button>
                                </div>
                            </div>
                            <div class="evento-isbn-anais">
                                <h3>Seminário de Tecnologia Assistiva</h3>
                                <span>123456789</span>
                            </div>
                            <div class="details-anais">
                                <span class="instituicao">Instituto Federal de Ciência e Tecnologia do Pará - Campus Castanhal</span>
                                <span class="ano">2024</span>
                        </div>

                            
                        <div class="no-results-alert-content">
                            <h1>Sem Resultados.</h1>
                            <p>Essas informações não estão no nosso banco de dados.</p>
                        </div>
--> 
                    </div>
                        
                        
                    </div>
                </div>
            </div>

        </div>
        
        
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="assets/js/index.js"></script>

        
    </body>
</html>