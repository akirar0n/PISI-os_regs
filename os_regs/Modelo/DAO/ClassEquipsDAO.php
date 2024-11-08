<?php

require_once 'Conexao.php';
class ClassEquipsDAO
{
    public function cadastrarEquips(ClassEquips $cadastrarEquips)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO equips (modelo, marca, serial_number, obs, defeito, os_status, valor)
                    values (?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarEquips->getModelo());
            $stmt->bindValue(2, $cadastrarEquips->getMarca());
            $stmt->bindValue(3, $cadastrarEquips->getSerialNumber());
            $stmt->bindValue(4, $cadastrarEquips->getObs());
            $stmt->bindValue(5, $cadastrarEquips->getDefeito());
            $stmt->bindValue(6, $cadastrarEquips->getOsStatus());
            $stmt->bindValue(7, $cadastrarEquips->getValor());

            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarEquips()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM equips order by (id_num_os) asc";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $idNumOs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $idNumOs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
?>