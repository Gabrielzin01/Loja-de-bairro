<?php

    if(!empty($_GET['ides']))
    {
        include_once('config.php');

        $ides = $_GET['ides'];

        $sqlSelect = "SELECT *  FROM vendas WHERE ides=$ides";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM vendas WHERE ides=$ides";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: vendas.php');
   
?>