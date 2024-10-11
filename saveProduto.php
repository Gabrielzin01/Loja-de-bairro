<?php

 include_once('config.php');

 if(isset($_POST['update']))
 {
    $cod = $_POST['cod'];  // Recupera o ID enviado pelo formulário
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];
    $fornecedor = $_POST['fornecedor'];
    $cor = $_POST['cor'];
    $marca = $_POST['marca'];
    $tamanho = $_POST['tamanho'];

    $sqlUpdate = "UPDATE estoque SET tipo='$tipo',preco='$preco',fornecedor='$fornecedor',cor='$cor',marca='$marca',tamanho='$tamanho'
    WHERE cod='$cod'";

    $result = $conexao->query($sqlUpdate);
 }
 header('Location: produtos.php')

?>
