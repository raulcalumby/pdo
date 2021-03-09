<?php
require_once 'Pessoa.php';
$p = new Pessoa("crudpdo", "localhost", "root", "");
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro Pessoas</title>
    <link rel="stylesheet"  href="Style.css";
</head>
<body>
<?php
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST["nome"]);
    $telefone = addslashes($_POST["telefone"]);
    $email = addslashes($_POST["email"]);

    if(!empty($nome) && !empty($telefone) && !empty($email) )
    {
        if(!$p->cadastrarPessoa($nome,$telefone,$email))
        {
            echo "conta ja esta cadastrada";

        }
    }else{
        echo "Preencha todos os campos";
    }
}

?>
<section id="esquerda">
    <form action="index.php" method="POST">
        <h2>Cadastrar Pessoa</h2>
        <label for="nome">Nome</label>
        <input type="text" name="nome " id="nome">
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone " id="telefone">
        <label for="email">Email</label>
        <input type="text" name="email " id="email">
        <input  type="submit" value="cadastro">
    </form>

</section>
<section id="direita">
    <table>
        <tr id="titulo">
            <td>NOME</td>
            <td>TELEFONE</td>
            <td colspan="2">EMAIL</td>
        </tr>
    <?php
    $dados = $p->getDados();
    if(count($dados)>0)
    {
        for ($i=0; $i < count($dados); $i++)
        {  echo "<tr>";
            foreach ($dados[$i] as $k => $v)
            {
                if($k != "id")
                {
                    echo "<td>" .$v. "</td>";
                }
            }

            ?>
            <td><a href="">Editar</a> <a href="">Excluir</a> </td>
            <?php
            echo "</tr>";
        }




    }
    else{
        echo " nao a pessoas ";
    }
    ?>

    </table>
</section>
</body>
</html>
