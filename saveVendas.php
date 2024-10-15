<?php

 include_once('config.php');

 if(isset($_POST['update']))
 {
    $ides = $_POST['ides'];  // Recupera o ID enviado pelo formulário
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $cor = $_POST['cor'];
    $marca = $_POST['marca'];
    $tamanho = $_POST['tamanho'];

    $sqlUpdate = "UPDATE vendas SET nome='$nome',tipo='$tipo',preco='$preco',quantidade='$quantidade',cor='$cor',marca='$marca',tamanho='$tamanho'
    WHERE ides='$ides'";

    $result = $conexao->query($sqlUpdate);
 }
 header('Location: vendas.php')

?>
