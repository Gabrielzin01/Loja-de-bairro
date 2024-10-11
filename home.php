<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Cadastro/Login</title>
    <style>
    body {
        font-family: Arial;
        background: linear-gradient(45deg, cyan, yellow);
        text-align: center;
        color: white;
    }
    .box {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0,0,0,0.9); /* Aqui estava faltando o ponto e vírgula */
        padding: 30px;
        border-radius: 10px;
    }
    a {
        text-decoration: none;
        color: white;
        border: 3px solid dodgerblue;
        padding: 10px 50px;
        border-radius: 10px;
    }
    a:hover {
      background-color: dodgerblue;
    }
    </style>
</head>
<body>
    <div class="box">
        <a href="login.php">Login</a>
      
    </div>
</body>
</html>
