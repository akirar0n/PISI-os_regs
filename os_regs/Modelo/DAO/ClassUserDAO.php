<?php

require_once 'Conexao.php';
class ClassUserDAO
{
    public function cadastrarUser(ClassUser $cadastrarUser)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO login_user (email, senha, nome, sobrenome, cpf, telefone, endereco)
                    values (?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarUser->getEmail());
            $stmt->bindValue(2, $cadastrarUser->getSenha());
            $stmt->bindValue(3, $cadastrarUser->getNome());
            $stmt->bindValue(4, $cadastrarUser->getSobrenome());
            $stmt->bindValue(5, $cadastrarUser->getCpf());
            $stmt->bindValue(6, $cadastrarUser->getTelefone());
            $stmt->bindValue(7, $cadastrarUser->getEndereco());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
?>