<?php

    if(!isset($_GET['i'])){
        $indicacao = '';
    }else{
        $indicacao = $_GET['i'];
    }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Formulário de Apoio</title>
    <link rel="stylesheet" href="css/index/index.css">
    <link rel="stylesheet" href="css/index/header.css">
    <link rel="stylesheet" href="css/index/form.css">
    <link rel="stylesheet" href="css/index/footer.css">
</head>

<body>
    <header id="header" class="header-3" style="min-height: 100%;">
        <div class="container navbar-custom">
            <div class="row">
                <div class="col-md-12" style="text-align:center;">
                    <div class="cadastro-contrato">
                        <div class="photo">
                            <img id="img_principal" src="img/person.png">
                        </div>
                        <h2>
                            Nome Teste

                            <span class="nav-item social-icons">
                                <span class="fa-stack">
                                    <a target="_blank" href="">
                                        <img src="img/svg/facebook.svg" width="25px" height="25px">
                                    </a>
                                </span>
                                <span class="fa-stack">
                                    <a target="_blank" href="">
                                        <img src="img/svg/instagram.svg" width="25px" height="25px">
                                    </a>
                                </span>
                                <span class="fa-stack">
                                    <a target="_blank" href="">
                                        <img src="img/svg/tiktok.svg" width="25px" height="25px">
                                    </a>
                                </span>
                                <span class="fa-stack">
                                    <a target="_blank" href="">
                                        <img src="img/svg/twitter.svg" width="25px" height="25px">
                                    </a>
                                </span>
                            </span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div id="titulos">
                <div class="text-center titulo">
                    <h1 id="paragrafo">JUNTOS POR UM BEM MAIOR!</h1>
                </div>
                <div class="text-center titulo">
                    <p id="subtitulo">Agradecemos a todos pelo apoio e confiança! É uma honra poder contar com vocês
                        nessa jornada.
                        Juntos, seguiremos trabalhando incansavelmente para construir um futuro melhor para nossa
                        comunidade.
                        Obrigado pelo seu voto e pela oportunidade de representá-los. Vamos em frente, com determinação
                        e comprometimento, buscando sempre o bem-estar e o progresso para todos.
                        Contem sempre conosco!</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form id="form" method="POST" action="insert.php">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="indicacao" id="floatingInputValue"
                                placeholder="Indicação" name="indicacao" value="<?php echo $indicacao; ?>" readonly>
                            <label for="floatingInputValue">Indicação</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" id="nome" class="form-control" id="floatingInputValue2"
                                placeholder="Nome" min="8" max="80" name="nome" autocomplete="off" required>
                            <label for="floatingInputValue">Nome Completo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" id="apelido" class="form-control" id="floatingInputValue3" name="apelido"
                                placeholder="Apelido" autocomplete="off">
                            <label for="floatingInputValue">Apelido</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="floatingInputValue4" placeholder="WhatsApp"
                                minlenght="15" maxlenght="15" name="whatsapp" autocomplete="off"
                                onkeypress="$(this).mask('(00) 00000-0000')" required>
                            <label for="floatingInputValue">WhatsApp</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Email"
                                autocomplete="off" maxlength="80">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput2" placeholder="Data de Nascimento"
                                name="data" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'"
                                maxlength="10" minlength="10" required>
                            <label for="floatingInput">Data de Nascimento</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput3"
                                placeholder="Endereço do Local de Votação" name="local" autocomplete="off">
                            <label for="floatingInput">Endereço do Local de Votação</label>
                        </div>

                        <div class="button">
                            <button type="submit" class="btn btn-primary" id="cadastrar">CADASTRAR</button>
                        </div>
                        <div>
                            <p id="divisor">EU SOU APOIADOR!!</p>
                        </div>
                        <div class="button">
                            <button id="button-login" class="btn btn-primary" onclick="javascript:window.location='login.html';return false;">LOGIN</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script defer src="js/blockcaracter.js"></script>
</body>

</html>