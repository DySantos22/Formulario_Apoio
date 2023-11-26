<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Troca de Senha</title>
    <link rel="stylesheet" href="css/edit-password/form-password.css">
    <link rel="stylesheet" href="css/edit-password/edit-password.css">

</head>

<body>
    <main>
        <div class="d-flex justify-content-center container">
            <div class="col-md-5">
                <form id="formulario" name="formulario" method="POST" action="recoveringpassword.php">
                    <div class="form-floating mb-3">
                        <input type="hidden" class="form-control" id="floatingInput" name="email" placeholder="Email" value="<?php echo $_GET['email'];?>" required>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput2" name="nova_senha" placeholder="Nova Senha" id="nova_senha"
                            autocomplete="off" minlength="8" maxlength="20" required>
                        <label for="floatingInput2">Nova Senha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput3" placeholder="Confirmar Senha" name="confirmar_senha" id="confirmar_senha"
                            autocomplete="off" minlength="8" maxlength="20" required>
                        <label for="floatingInput3">Confirmar Senha</label>
                    </div>
                    <div class="button">
                        <button type="submit" class="btn btn-primary" id="trocar" onclick="validar()">TROCAR SENHA</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script defer src=js/validacao-password.js></script>
</body>

</html>