<?php
include '../Modelo/ClassEquips.php';
include '../Modelo/DAO/ClassEquipsDAO.php';

$modelo = $_POST['modelo'] ?? null;
$marca = $_POST['marca'] ?? null;
$serialNumber = $_POST['serialNumber'] ?? null;
$obs = $_POST['obs'] ?? null;
$defeito = $_POST['defeito'] ?? null;
$osStatus = $_POST['os_status'] ?? null;
$valor = $_POST['valor'] ?? null;
$acao = $_GET['ACAO'] ?? null;

if ($acao) {
    $novoEquip = new ClassEquips();
    $novoEquip->setModelo($modelo);
    $novoEquip->setMarca($marca);
    $novoEquip->setSerialNumber($serialNumber);
    $novoEquip->setObs($obs);
    $novoEquip->setDefeito($defeito);
    $novoEquip->setOsStatus($osStatus);
    $novoEquip->setValor($valor);

    $classEquipsDAO = new ClassEquipsDAO();

    switch ($acao) {
        case "cadastrarEquips":
            $equip = $classEquipsDAO->cadastrarEquips($novoEquip);
            if ($equip >= 1) {
                header('Location:../index.php?&MSG=Cadastro de equipamento realizado com sucesso!');
            } else {
                header('Location:../index.php?&MSG=Não foi possível realizar o cadastro do equipamento!');
            }
            break;

        default:
            header('Location:../index.php?&MSG=Ação inválida!');
            break;
    }
} else {
    header('Location:../index.php?&MSG=Parâmetro de ação não encontrado!');
}
