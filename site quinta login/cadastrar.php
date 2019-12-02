<?php
require_once 'classes/usuarios.php';
$u = new usuarios;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar</title>
</head>

<body>
    <div>
        
        <div id="divCenter2">
            <h1 class="titulo"> Cadastrar</h1>    
            <form id="frmPost" method="POST">
                <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
                <br><br>
                <input type="email" name="email" placeholder="Usuario" maxlength="40">
                <br><br>
                <input type="password" name="senha" placeholder="Senha" maxlength="15">
                <br><br>
                <input type="password" name="confirmarsenha" placeholder="Confirmar Senha" maxlength="15">
                <br><br>
                <input type="submit" value="Cadastrar">
                <br><br>
                <a href="cadastrar.php">Sem cadastro?<strong>Cadastre-se </strong></a>
            </form>   
        </div>   
    </div>
    <?php
    if (isset($_POST['nome'])) 
    {
        $nome = ($_POST['nome']);
        $email = ($_POST['email']);
        $senha = ($_POST['senha']);
        $confirmarsenha = ($_POST['confirmarsenha']);
        if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarsenha)) {
            $u->conectar("login", "localhost", "root", "");
            if ($u->msgErro == "") {
                if ($senha == $confirmarsenha) {
                    if ($u->cadastrar($nome, $email, $senha)) {
                        echo "cadastrado com sucesso! Acesse para entrar!";
                    } 
                    else 
                    {
                        echo "Email ja cadastrado!";
                    }
                } 
                else 
                {
                    echo "As senha não batem";
                }
            } 
            else 
            {
                echo "Erro: " . $u->msgErro;
            }
        } 
        else
         {
            echo "Preencha todos os campos!";
        }
    }

    ?>

</body>

</html>