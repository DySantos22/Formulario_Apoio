<?php
session_start();

if($_SESSION['Acesso'] == 'Mestre'){

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Página Principal</title>
    <link rel="stylesheet" href="/css/mestre/main.css">
</head>

<body>
    <header>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-white bg-white static-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="https://placeholder.pics/svg/150x50/888888/EEE/Logo" alt="..." height="36">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contatos.php">Contatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">DashBoard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row div_buttons">
                <div class="col button"><a href="contatos.php">
                    <button class="button_links" id="button1"><img width="45" height="45" class="imgs-icons"
                            src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/external-contacts-twitter-flatart-icons-outline-flatarticons.png"
                            alt="Novo Contato" />Contato</button></a>
                </div>
                <div class="col button">
                    <button class="button_links" id="button2"><img width="35" height="35" class="imgs-icons"
                            src="https://img.icons8.com/ios/50/1A1A1A/add-to-chat.png" alt="Novo Atendimento" />Atendimento</button>
                </div>
                <div class="w-100"></div>
                <div class="col button"><a href="dashboard.php">
                    <button class="button_links" id="button3"><img width="35" height="35"
                        class="imgs-icons"
                            src="https://img.icons8.com/ios/50/1A1A1A/combo-chart--v1.png"
                            alt="Dashboard" />DashBoard</button></a>
                </div>
                <div class="col button">
                    <button class="button_links" id="button4">Novo Teste</button>
                </div>
            </div>

            <!-- Formulario de Pesquisa por Nomes/Contatos -->
            <div class="container-formulario">
                <div class="div-formulario">
                    <div class="form">
                        <form class="form-pesquisa">
                            <div class="form-floating barra-pesquisa">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Pesquisar por Contato">
                                <label for="floatingInput">Pesquisar por Contato</label>
                            </div>

                            <div class="informacoes">
                                <div class="paragrafo">
                                    <h5>Não há nenhum contato selecionado!</h5>
                                </div>
                                <div class="subtitulo">
                                    <h6>Por favor, pesquise por um contato acima e selecione para ver seu resumo.</h6>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </main>

    <footer>

    </footer>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>

<?php
}else{
    header("Location: ../index.html");
}
?>