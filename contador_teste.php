<?php
session_start();
include_once('config.php');

function atualizarContador() {
    global $conexao;
    try {
        if ($conexao->connect_error) {
            die("Erro: Conexão falhou. " . $conexao->connect_error);
        }
        
        $queryUsuarios = "SELECT COUNT(DISTINCT nome) AS total_usuarios FROM usuarios";
        $resultUsuarios = $conexao->query($queryUsuarios);
        $resultadoUsuarios = $resultUsuarios->fetch_assoc();
        $total_usuarios = $resultadoUsuarios['total_usuarios'];
        
        $queryVendas = "SELECT COUNT(DISTINCT nome) AS total_venda FROM vendas";
        $resultVendas = $conexao->query($queryVendas);
        $resultadoVendas = $resultVendas->fetch_assoc();
        $total_venda = $resultadoVendas['total_venda'];
        
        $queryEstoque = "SELECT COUNT(DISTINCT tipo) AS total_estoque FROM estoque";
        $resultEstoque = $conexao->query($queryEstoque);
        $resultadoEstoque = $resultEstoque->fetch_assoc();
        $total_estoque = $resultadoEstoque['total_estoque'];
        
        $queryUpdate = "UPDATE contador SET total_usuarios='$total_usuarios', total_venda='$total_venda', total_estoque='$total_estoque' ORDER BY id DESC LIMIT 1";
        $conexao->query($queryUpdate);
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

atualizarContador();

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

$logado = $_SESSION['email'];

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT c.id, c.total_usuarios, c.total_venda, c.total_estoque 
            FROM contador c
            WHERE c.id LIKE '%$data%' ORDER BY c.id DESC";
} else {
    $sql = "SELECT c.id, c.total_usuarios, c.total_venda, c.total_estoque 
            FROM contador c
            ORDER BY c.id DESC";
}

$result = $conexao->query($sql);
?>

  <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                <th scope="col">#</th>
                    <th scope="col">Total de clientes</th>
                    <th scope="col">Total de vendas</th>
                    <th scope="col">Total de estoque</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
                while($user_data = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>".$user_data['id']."</td>";
                    echo "<td>".$user_data['total_usuarios']."</td>";
                    echo "<td>".$user_data['total_venda']."</td>";
                    echo "<td>".$user_data['total_estoque']."</td>";
                    echo "<td>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA | GN</title>
    <title>sistema</title>
    <style>
        body {
            background-image: linear-gradient(45deg, cyan, yellow);
            color: black;
            text-align: center;
            font-family: Arial;
        }
        .navbar {
            height: 50px; /* Reduz a altura da barra de navegação */
        }
        .navbar-brand {
            font-size: 1.2rem; /* Ajusta o tamanho da fonte do título */
        }
        .nav-item {
            display: flex;
            align-items: center;
        }
        .btn-custom {
            text-decoration: none;
            color: white;
            border: 3px solid dodgerblue;
            padding: 5px 5px; /* Reduz o padding para ajustar o tamanho */
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.3s;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-custom:hover {
            background-color: dodgerblue;
            transform: scale(1.05);
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.5);
            border-radius: 15px 15px 0 0;
        }
        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="sistema.php" class="btn btn-danger">Voltar</a>
                    </li>
                
                </ul>
            </div>
        </div>
    </nav>

    <br>
    </div>
    <h1>RELATORIO</h1>
</body>
<script>
     function atualizarContador() {
        fetch('contador_teste.php')
            .then(response => response.text())
            .then(data => console.log(data));
    }

    setInterval(atualizarContador, 60000); // Atualiza a cada 60 segundos

    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'contador.php?search='+search.value;
    }
</script>
</html>
