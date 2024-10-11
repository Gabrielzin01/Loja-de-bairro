<?php

    if(!empty($_GET['cod']))
    {
        include_once('config.php');

        $cod = $_GET['cod'];

        $sqlSelect = "SELECT *  FROM estoque WHERE cod=$cod";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM estoque WHERE cod=$cod";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: produtos.php');
   
?>