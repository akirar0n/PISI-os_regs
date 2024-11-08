<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/listar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php
    require './Modelo/ClassEquips.php';
    require './Modelo/DAO/ClassEquipsDAO.php';

    $classEquipsDAO = new ClassEquipsDAO();
    $eq = $classEquipsDAO->listarEquips();
    echo "<div class='table-container'>";
    echo "<table>";
    echo "  <tr>";
    echo "      <th scope='col'><p align='center'>O.S Num</p></th> ";
    echo "      <th scope='col'><p align='center'>Modelo</p></th> ";
    echo "      <th scope='col'><p align='center'>Marca</p></th> ";
    echo "      <th scope='col'><p align='center'>Serial Number</p></th>";
    echo "      <th scope='col'><p align='center'>Obs</p></th>";
    echo "      <th scope='col'><p align='center'>Defeito</p></th>";
    echo "      <th scope='col'><p align='center'>Status</p></th>";
    echo "      <th scope='col'><p align='center'>Valor</th>";
    echo "  <tr>";

    foreach ($eq as $eq) {
        echo "<tr>";
        echo "<td scope='col'><p align='center'>" . $eq['id_num_os'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $eq['modelo'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $eq['marca'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $eq['serial_number'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $eq['obs'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $eq['defeito'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $eq['os_status'] . "</p></td>";
        echo "<td scope='col'><p align='center'>" . $eq['valor'] . "</p></td>";
        echo "</tr>"; 
    }
    echo "</table>";
    echo "<div>";  
    echo "";
?>
<a href="HomeAdm.php" class="btn btn-secondary">Voltar</a>

</body>
</html>