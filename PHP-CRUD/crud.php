<?php

try {
    $pdo = new PDO("mysql:dbname=CRUDPDO;host=localhost", "root", "");
}
catch (PDOException $e)
{
    echo "Erro com banco de dados: " . $e->getMessage();
}
catch (Exception $e)
{
    echo "erro generico: " . $e->getMessage();
}


/*$res = $pdo->prepare("INSERT INTO  pessoa (nome,telefone,email) values (:n, :t, :e)");
$res->bindValue(":n", "Miriam");
$res->bindValue(":t", "1127019230");
$res->bindValue(":e", "raulcalumby@gmail.com");
$res->execute();
*/

//2 forma
$pdo->query("INSERT INTO pessoa(nome,telefone,email) values('raul', '1127019230', 'teste@gmail.com')");

/*$cmd = $pdo->prepare("DELETE  FROM pessoa where id = :id ");
$id = 1;
$cmd->bindValue(":id", $id);
$cmd->execute();
*/
//$res = $pdo->query("DELETE FROM pessoa where id = '2'");

/*$res = $pdo->prepare("UPDATE pessoa SET email = :e where id = :id");
$res->bindValue(":e", "tsaasdsadsadsad");
$res->bindValue(":id", '3');
$res->execute();
*/
$res = $pdo->query("UPDATE pessoa SET email= 'Raulzao@gmailzao.com' where id= '3'");





