<?php

session_start();
if (empty($_SESSION)) {
    print "<script>location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./CSS/reset.css">
    <link rel="stylesheet" href="./CSS/home.css">
    <link rel="stylesheet" href="./Visao/CSS/caduser.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    
    <?php include 'MenuOnAdm.php'; ?>

    <div class="card-formulario">
            <form class="formulario-cadastro" method="POST" action="./Controle/ControleEquips.php?ACAO=cadastrarEquips">
                <label for="inputModelo">Modelo</label>
                <input type="text" name="modelo" id="inputEmail" required>
                <br>
                <label for="inputMarca">Marca</label>
                <input type="text" name="marca" id="inputSenha" required>
                <br>
                <label for="inputSN">Serial Number</label>
                <input type="text" name="serialNumber" id="inputNome" required>
                <br>
                <label for="inputObs">Obs</label>
                <input type="text" name="obs" id="inputSobrenome" required>
                <br>
                <label for="inputDefeito">Defeito</label>
                <input type="text" name="defeito" id="inputCpf" required>
                <br>
                <label for="inputStatusOS">Status da O.S</label>
                <input type="text" name="os_status" id="inputTelefone" required>
                <br>
                <label for="inputValor">Valor do reparo</label>
                <input type="text" name="valor" id="inputEndereco" required>
                <br>
                <button type="submit" class="cad-se">Inserir</button>
            </form>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>