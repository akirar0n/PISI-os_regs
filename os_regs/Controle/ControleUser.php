<?php
include '../Modelo/ClassUser.php';
include '../Modelo/DAO/ClassUserDAO.php';

$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;
$nome = $_POST['nome'] ?? null;
$sobrenome = $_POST['sobrenome'] ?? null;
$cpf = $_POST['cpf'] ?? null;
$telefone = $_POST['telefone'] ?? null;
$endereco = $_POST['endereco'] ?? null;
$acao = $_GET['ACAO'] ?? null;

if ($acao) {
    $novoUser = new ClassUser();
    $novoUser->setEmail($email);
    $novoUser->setSenha($senha);
    $novoUser->setNome($nome);
    $novoUser->setSobrenome($sobrenome);
    $novoUser->setCpf($cpf);
    $novoUser->setTelefone($telefone);
    $novoUser->setEndereco($endereco);

    $classUserDAO = new ClassUserDAO();

    switch ($acao) {
        case "cadastrarUser":
            $user = $classUserDAO->cadastrarUser($novoUser);
            if ($user >= 1) {
                header('Location:../index.php?&MSG=Cadastro realizado com sucesso!');
            } else {
                header('Location:../index.php?&MSG=Não foi possível realizar o cadastro!');
            }
            break;

        default:
            header('Location:../index.php?&MSG=Ação inválida!');
            break;
    }
} else {
    header('Location:../index.php?&MSG=Parâmetro de ação não encontrado!');
}
