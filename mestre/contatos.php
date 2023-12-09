<?php
    session_start();

if($_SESSION['Acesso'] == 'Mestre'){

    // Conexao BD
    require '../conexao.php';

    //Pegando quantidade de Apoiadores
    $sql = "SELECT COUNT(*) as ID FROM contato INNER JOIN usuario WHERE contato.ID_usuario = usuario.ID";
    $resultado = mysqli_query($conn, $sql);
    $row = $resultado->fetch_assoc();

    //Pegando quantidade de líderes
    $sql2 = "SELECT COUNT(*) as ID_Mestre FROM usuario WHERE Acesso = 'Mestre'";
    $resultado2 = mysqli_query($conn, $sql2);
    $row2 = $resultado2->fetch_assoc();

    //Pegando quantos usuarios informaram local de votacao
    $sql3 = "SELECT COUNT(*) as Endereco FROM usuario WHERE Endereco_Local_Votacao = '' || ' '";
    $resultado3 = mysqli_query($conn, $sql3);
    $row3 = $resultado3->fetch_assoc();

    //Pegando os dados dos usuarios
    $sql4 = "SELECT * FROM usuario WHERE Acesso = 'Apoiador'";
    //Executa o SQL
    $result4=$conn->query($sql4);

    //Se a consulta tiver resultados
    if ($result4->num_rows > 0) {
      // Cria uma matriz com o resultado da consulta
      mysqli_close($conn);
        ?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/mestre/contato.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Scripts Datatable e Jquery -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript">
        $(document).ready(function () {
            $('#listar').DataTable({
                "processing": true,
                "serverSide": true,
                "searching": true,
                "ajax": {
                    "url": "proc_pesq.php",
                    "type": "POST"
                },
                "dom": 'Bfrtip', // Adicione esta linha
                "buttons": [
                    'copy', 'excel', 'pdf'
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
                },
            });
        });
    </script>
</head>

<body>
    <header>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-white bg-white static-top">
            <div class="container">
                <a class="navbar-brand" href="principalmestre.php">
                    <img src="https://placeholder.pics/svg/150x50/888888/EEE/Logo" alt="Home" height="36">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="principalmestre.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="contatos.php">Contatos</a>
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
        <!-- Cards informativos -->
        <div class="container">
            <div class="row div-informacoes">
                <div class="col informacoes d-flex align-items-center" id="card1">
                    <div class="imagem-icon m-4">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/user-group-man-man.png"
                            alt="user-group-man-man" />
                    </div>
                    <div>
                        <h5 class="texto">Contatos</h5>
                        <h6 class="texto"><?php echo $row['ID'];?></h6>
                    </div>
                </div>
                <div class="col informacoes d-flex align-items-center" id="card2">
                    <div class="imagem-icon m-4">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/admin-settings-male.png"
                            alt="admin-settings-male" />
                    </div>
                    <div>
                        <h5 class="texto">Lideranças</h5>
                        <h6 class="texto"><?php echo $row2['ID_Mestre'];?></h6>
                    </div>
                </div>
            </div>

            <div class="row div-informacoes mt-4">
                <div class="col informacoes d-flex align-items-center" id="card3">
                    <div class="imagem-icon m-4">
                        <img width="50" height="50" src="https://img.icons8.com/ios/50/map-marker--v1.png"
                            alt="map-marker--v1" />
                    </div>
                    <div>
                        <h5 class="texto">Sem Local</h5>
                        <h6 class="texto"><?php echo $row3['Endereco'];?></h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabela dos Contatos -->
        <div class="content m-8">
            <div class="table-responsive">
                <table id="listar" class="display dataTable" style="width:98%">
                    <thead>
                        <tr>
                            <th>Cadastro</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Apelido</th>
                            <th>Indicação</th>
                            <th>WhatsApp</th>
                            <th>Local de Votação</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </main>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<?php

    }else{
        echo "<h1>Nenhum contato para exibir!</h1>";
    }
?>

</html>

<?php
}else{
    header("Location: ../index.html");
}
?>