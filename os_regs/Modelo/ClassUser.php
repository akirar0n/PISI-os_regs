<?php
class ClassUser
{
    private $idUser;
    private $tipoUser;
    private $email;
    private $senha;
    private $nome;
    private $sobrenome;
    private $cpf;
    private $telefone;
    private $endereco;

    // GETTERS
    function getIdUser()
    {
        return $this->idUser;
    }

    function getTipoUser()
    {
        return $this->tipoUser;
    }
    
    function getEmail()
    {
        return $this->email;
    }

    function getSenha()
    {
        return $this->senha;
    }

    function getNome()
    {
        return $this->nome;
    }

    function getSobrenome()
    {
        return $this->sobrenome;
    }

    function getCpf()
    {
        return $this->cpf;
    }

    function getTelefone()
    {
        return $this->telefone;
    }

    function getEndereco()
    {
        return $this->endereco;
    }

    //SETTERS
    function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    function setTipoUser($tipoUser)
    {
        $this->tipoUser = $tipoUser;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setSenha($senha)
    {
        $this->senha = $senha;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    
    function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
}
