<?php
include("config.php");

if (isset($_POST['ok'])) {
    
    $email = $conexao->real_escape_string($_POST['email']);
    $erro = array(); // Inicializa o array de erros

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Corrigido para verificar se o email é inválido
        $erro[] = "Email inválido";
    }

    $sql_code = "SELECT senha, id FROM cadastro WHERE email = '$email'";
    $sql_query = $conexao->query($sql_code) or die($conexao->error);
    $dado = $sql_query->fetch_assoc();
    $total = $sql_query->num_rows;

    if ($total == 0) {
        $erro[] = "O email informado não existe no banco de dados.";
    }

    if (count($erro) == 0 && $total > 0) {
        $novasenha = substr(md5(time()), 0, 6);
        $nscriptografada = $novasenha; // Senha não criptografada
        //$nscriptografada = md5(md5($novasenha)); //Senha criptografada
             
        if(1 == 1){
        //(mail($email, "Sua nova senha", "Sua nova senha:" .$novasenha)){

     

        $sql_code = "UPDATE cadastro SET senha = '$nscriptografada' WHERE email = '$email'";
        $sql_query = $conexao->query($sql_code) or die($conexao->error);

        if($sql_query) {
            $erro[] = "Senha alterada com sucesso";
        } else {
            $erro[] = "Erro ao alterar a senha";
        }
    } }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar Senha</title>
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
      padding: 50px;
      border-radius: 15px;
      color: white;
      font-size: 15px;
    }

    input {
      padding: 15px;
      border: none;
      outline: none;
      border-radius: 10px;
    }

    #submit:hover {
      background-color: dodgerblue;
    }

    .error-message {
      height: 20px; /* Define a altura fixa para o parágrafo de erro */
      margin: 0; /* Remove a margem para evitar deslocamento */
      color: red; /* Cor do texto de erro */
      
    }
  </style>
</head>
<body>
  <div>
  <form action="" method="POST">
    <?php 
    if (isset($erro) && count($erro) > 0) {
        foreach ($erro as $msg) {
            echo "<p class='error-message'>$msg</p>";
        }
    } else {
        echo "<p class='error-message'></p>"; // Espaço reservado para mensagens de erro
    }
    ?>
    <label for="email">E-mail:</label>
    <input value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" type="email" name="email" placeholder="Seu Email" required>
    <input type="submit" name="ok" value="OK" id="submit">
  </form>
  </div>
</body>
</html>
