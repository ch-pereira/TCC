<?php
include('conexao/conexao.php');

$db = new Database();

class Crud{

    private $conn;
    private $nome_tabela = "usuarios";
    
    public function __construct($db){
        $this->conn = $db;
    }

    public function create($postValues){
        $nome = $postValues['nome'];
        $sobrenome = $postValues['sobrenome'];
        $data_de_nasci = $postValues['data_de_nasci'];
        $telefone = $postValues['telefone'];
        $email = $postValues['email'];
        $senha = $postValues['senha'];
        $confirma_senha = $postValues['confirma_senha'];

        $query = "INSERT INTO ".$this->nome_tabela . " (nome, sobrenome, data_de_nasci, telefone, email, senha, confirma_senha) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$nome);
        $stmt->bindParam(2,$sobrenome);
        $stmt->bindParam(3,$data_de_nasc);
        $stmt->bindParam(4,$telefone);
        $stmt->bindParam(5,$email);
        $stmt->bindParam(6,$senha);
        $stmt->bindParam(7,$confirma_senha);
        $row = $this->read();

        if($stmt->execute()){
            print "<script> alert('Cadastro realizado com sucesso !!!')</script>";
            print"<script> location.href='?action=read';</script>";
            return true;
        }else{
            return false;
        }
    }

    public function read(){
        $query = "SELECT * FROM ". $this->nome_tabela;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update($postValues){
        $id = $postValues['id'];
        $nome = $postValues['nome'];
        $sobrenome = $postValues['sobrenome'];
        $data_de_nasci = $postValues['data_de_nasci'];
        $telefone = $postValues['telefone'];
        $email = $postValues['email'];
        $senha = $postValues['senha'];
        $confirma_senha = $postValues['confirma_senha'];

        if(empty($id) || empty($nome) || empty($sobrenome) || empty($data_de_nasci) || empty($telefone) || empty($email) ||empty($senha) || empty($confirma_senha)){
            return false;
        }
        $query = "UPDATE ". $this->nome_tabela . " SET nome = ?, sobrenome = ?, gravadoira = ?, telefone = ?, email = ?, senha = ?, confirma_senha = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$nome);
        $stmt->bindParam(3,$sobrenome);
        $stmt->bindParam(4,$data_de_nasc);
        $stmt->bindParam(5,$telefone);
        $stmt->bindParam(6,$email);
        $stmt->bindParam(7,$senha);
        $stmt->binsParam(8,$confirma_senha);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function readOne($id){
        $query = "SELECT * FROM ". $this->nome_tabela . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }

    //funcao deletar
    public function delete($id){
        $query = "DELETE FROM ". $this->nome_tabela . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>