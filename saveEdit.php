<?php

 include_once('config.php');

 if(isset($_POST['update']))
 {
    $id = $_POST['id'];  // Recupera o ID enviado pelo formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $datadenascimento = $_POST['datadenascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $sqlUpdate = "UPDATE usuarios SET nome='$nome',email='$email',telefone='$telefone',sexo='$sexo',datadenascimento='$datadenascimento',cidade='$cidade',estado='$estado',endereco='$endereco'
    WHERE id='$id'";

    $result = $conexao->query($sqlUpdate);
 }
 header('Location: sistema.php')

?>
