<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-image: linear-gradient(45deg, cyan, yellow);
    }

    div {
      background-color: rgba(0, 0, 0, 0.9);
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 80px;
      border-radius: 15px;
      color: white;
      font-size: 15px;
    }

    input {
      padding: 15px;
      border: none;
      outline: none;
    }

    .inputSubmit {
      background-color: dodgerblue;
      border: none;
      padding: 15px;
      width: 100%;
      border-radius: 10px;
      color: white;
      font-size: 15px;
      cursor: pointer;
    }

    .inputSubmit:hover {
      background-color: deepskyblue;
    }
  </style>
</head>

<body>
  <a href="home.php">Voltar</a>
  <div>
    <h1>Login</h1>
    <form action="testelogin.php" method="POST">
      <input type="text" name="email" placeholder="Email">
      <br><br>
      <input type="password" name="senha" placeholder="Senha">
      <br><br>
      <input class="inputSubmit" type="submit" name="submit" value="Enviar">
    </form>
    <br>
    <a href="solicitar_recuperacao.php" target="_blank" style="color: white;">Esqueceu a senha?</a>
  </div>
</body>

</html>
