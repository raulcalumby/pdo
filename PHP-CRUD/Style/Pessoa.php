<?php


class Pessoa
{


    private $pdo;
    public function __construct($dbname, $host,$user,$senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" .$host,$user,$senha);
        }
        catch (PDOException $e){
            echo "Erro no bando de dados:" . $e-> getMessage();
            exit();

        }
        catch (Exception $e){
            echo "erro: " . $e-> getMessage();
            exit();

        }


    }
    public function cadastrarPessoa($nome, $telefone, $email)
    {
        $cmd =$this->pdo->prepare("SELECT id from pessoa where email = :e");
        $cmd->bindValue(":e", $email);
        $cmd->execute();
        if ($cmd->rowCount() >0){
            return false;
        }else{
            $cmd->$this->pdo->prepare("INSERT INTO pessoa (nome, telefone , email) VALUES (:n,:t, :e)");
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":t", $telefone);
            $cmd->bindValue(":e", $email);
            $cmd->execute();
            return true;
        }
    }
    public function getDados()
    {
        $res = array();
        $cmd = $this->pdo->query("select * from pessoa order by nome");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }




    }



