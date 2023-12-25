<?php
session_start();

if($_SESSION['Acesso'] == 'Apoiador'){

    //Pegando nome
    $nome = $_SESSION['Nome'];

    //Incluindo composer
    include_once('../lib/vendor/autoload.php');

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Página Principal</title>
    <link rel="stylesheet" href="/css/apoiador/main.css">
</head>

<body>
    <header>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" id="logo">
                    LOGO
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto me-5">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="principalapoiador.php">Home</a>
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
                        <button class="button_links" id="button1"><img class="imgs-icons"
                                src="https://img.icons8.com/ios/50/FFFFFF/user-group-man-man.png"
                                alt="Novos Contatos" />Contatos</button></a>
                </div>
                <div class="col button">
                    <button class="button_links" id="button2" data-bs-toggle="modal" data-bs-target="#exampleModal"><img
                            class="imgs-icons"
                            src="https://img.icons8.com/ios/50/FFFFFF/speech-bubble-with-dots--v1.png"
                            alt="Atendimento" />Suporte</button>
                </div>
                <div class="w-100"></div>
                <div class="col button"><a href="dashboard.php">
                        <button class="button_links" id="button3"><img class="imgs-icons"
                                src="https://img.icons8.com/ios/50/FFFFFF/performance-macbook.png"
                                alt="Dashboard" />DashBoard</button></a>
                </div>
                <div class="col button">
                    <button class="button_links" id="button4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal2"><img class="imgs-icons"
                            src="https://img.icons8.com/ios/50/FFFFFF/share--v1.png" alt="Convite" />Convite</button>
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
                                <div class="paragrafo text-center">
                                    <h5>Não há nenhum contato selecionado!</h5>
                                </div>
                                <div class="subtitulo text-center">
                                    <h6>Por favor, pesquise por um contato acima e selecione para ver seu resumo.</h6>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>

        <!-- Modal Suporte -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Contatos para Suporte</h1>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-email" class="col-form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="recipient-email" disabled
                                value="suporte@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-tel" class="col-form-label">Telefone:</label>
                            <input type="tel" name="tel" class="form-control" id="recipient-tel" disabled
                                value="(21)11111-1111">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Convite -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Convide novas Pessoas!</h1>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-link" class="col-form-label">Link:</label>
                            <input type="text" name="text" class="form-control" id="recipient-link" disabled
                                value="http://localhost/?i=<?php echo $nome;?>">
                        </div>
                        <div class="mb-3">
                            <h6 class="text-center">Ou use o QRCode abaixo! </h6>
                        </div>
                        <div class="mb-3">
                            <div class="div-qr text-center">
                                <?php
                                //Gerando QRCode da dependencia Chillerlan/QRCode
                                 $qrcode = (new \chillerlan\QRCode\QRCode())->render("localhost/i?'$nome'");
                                 echo "<img src='$qrcode'>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    header("Location: ../index.php");
}
?>