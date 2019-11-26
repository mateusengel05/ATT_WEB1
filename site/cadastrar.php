<?php
require_once 'CLASSES/usuarios.php';
$u = new usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Pagina de login</title>
</head>

<body>
    <div>
        <h1> Cadastrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome completo" maxlength="30">
            <input type="email" name="email" placeholder="usuario" maxlength="40">
            <input type="password" name="senha" placeholder="senha" maxlength="15">
            <input type="password" name="confsenha" placeholder="confimar senha" maxlength="15">
            <input type="submit" value="cadastrar">
            <a href="cadastrar.php">Sem cadastro?<strong>Cadastre-se </strong></a>
    </div>
    <?php
    if (isset($_POST['nome'])) {
        $nome = ($_POST['nome']);
        $email = ($_POST['email']);
        $senha = ($_POST['senha']);
        $confimarsenha = ($_POST['confsenha']);
        if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarsenha)) {
            $u->conectar("teste158", "localhost", "root", "");
            if ($u->msgERRO == "") {
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
                    echo "Senha e confirmar senha diferentes!";
                }
            } 
            else 
            {
                echo "Erro: " . $u->msgERRO;
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