<?php
    session_start();

    if($_SESSION['Acesso'] == 'Mestre'){
    // Conexao BD
    require '../conexao.php';

    //Pegando quantidade de Apoiadores
    $sql = "SELECT COUNT(*) as ID FROM usuario WHERE Acesso = 'Apoiador'";
    $resultado = mysqli_query($conn, $sql);
    $row = $resultado->fetch_assoc();

    //Pegando quantidade de líderes
    $sql2 = "SELECT COUNT(*) as ID_Mestre FROM usuario WHERE Acesso = 'Mestre'";
    $resultado2 = mysqli_query($conn, $sql2);
    $row2 = $resultado2->fetch_assoc();

    //Pegando quantos usuarios informaram local de votacao
    $sql3 = "SELECT COUNT(*) as Endereco FROM usuario WHERE Endereco_Local_Votacao != '' || ' '";
    $resultado3 = mysqli_query($conn, $sql3);
    $row3 = $resultado3->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/mestre/dashboard.css">
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
                        <a class="nav-link" aria-current="page" href="principalmestre.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contatos.php">Contatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">DashBoard</a>
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
            <div class="row div-informacoes">
                <div class="col informacoes d-flex align-items-center" id="card1">
                    <div class="imagem-icon m-4">
                    <img width="50" height="50" src="https://img.icons8.com/ios/50/FFFFFF/conference-call--v1.png" alt="Cadastrados"/>
                    </div>
                    <div>
                        <h5 class="texto">Total de Cadastrados</h5>
                        <h6 class="texto"><?php echo $row['ID'];?></h6>
                    </div>
                </div>
                <div class="col informacoes d-flex align-items-center" id="card2">
                    <div class="imagem-icon m-4">
                    <img width="50" height="50" src="https://img.icons8.com/ios/50/FFFFFF/admin-settings-male.png" alt="Liderança"/>
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
                    <img width="50" height="50" src="https://img.icons8.com/ios/50/FFFFFF/marker--v1.png" alt="Endereço informado"/>
                    </div>
                    <div>
                        <h5 class="texto">Total de Endereços</h5>
                        <h6 class="texto"><?php echo $row3['Endereco'];?></h6>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            $sql4 = "SELECT count(*) as Ativo FROM usuario  WHERE Estado='Ativo' AND Acesso='Apoiador'";
            $sql5 = "SELECT count(*) as Inativo  FROM usuario WHERE Estado='Inativo' AND Acesso='Apoiador'";
            $sql6 = "SELECT count(*) as Datas FROM usuario WHERE Cadastro BETWEEN CURRENT_DATE()-7 AND CURRENT_DATE() AND Acesso='Apoiador'";
            
            
            //Executa o SQL
            $result4 = $conn->query($sql4);
            $result5 = $conn->query($sql5);
            $result6 = $conn->query($sql6);
            
            //Prepara as contagens
            $row4 = $result4->fetch_assoc();
            $row5 = $result5->fetch_assoc();
            $row6 = $result6->fetch_assoc();
        ?>
 <div class="container mt-5">
    <div class="row justify-content-center"> <!-- Centraliza os cards -->
        <!-- Grafico 1 -->
        <div class="col-md-5 mb-3">
            <div class="card" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title text-center">Quantidade de usuários com</h5>
                    <div class="chart-container" style="position: relative; height: 100%; width: 100%;">
                        <canvas id="myChart" style="max-width: 100%; height: auto;"></canvas>
                    </div>
                </div>
            </div>
        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById("myChart");
    var valores = [<?php echo $row4["Ativo"] ?>, <?php echo $row5["Inativo"] ?>];
    var tipos = ["Email confirmado", "Email não confirmado"];

    var myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: tipos,
            datasets: [{
                label: "usuario",
                data: valores,
                backgroundColor: [
                    "rgba(71, 70, 71, 0.8)",
                    "rgba(0, 166, 253, 0.8)",
                    "rgba(255, 206, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                ]
            }]
        }
    });
</script>

   
   <!-- Grafico 2 -->
   <div class="col-md-5">
            <div class="card" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title text-center">Quantidade de usuários que entraram recentemente</h5>
                    <div class="chart-container" style="position: relative; height: 100%; width: 100%;">
                        <canvas id="myChart2" style="max-width: 100%; height: auto;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var ctx2 = document.getElementById("myChart2");
    var valores2 = [<?php echo $row6["Datas"] ?>];
    var tipos2 = ["Entraram nos últimos 7 dias"];

    var myChart2 = new Chart(ctx2, {
        type: "bar",
        data: {
            labels: tipos2,
            datasets: [{
                label: "Entraram nos últimos 7 dias",
                data: valores2,
                backgroundColor: [
                    "rgba(0, 166, 253, 0.8)",
                    "rgba(71, 70, 71, 0.8)",
                ]
            }]
        },        
    });
</script>

    </main>

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