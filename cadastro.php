
<?php
if (isset($_POST['submit'])) {
    include_once('config.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['dataNascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    // Verificação dos campos no servidor
    $valid = true;
    if (strlen($nome) < 3) {
        $valid = false;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valid = false;
    }
    if ($valid) {
        // Uso de prepared statements
        $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, telefone, sexo, datadenascimento, cidade, estado, endereco) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nome, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco);
        if ($stmt->execute()) {
            header('Location: sistema.php');
        } else {
            // Log de erro para o desenvolvedor
            error_log("Erro ao cadastrar usuário: " . $stmt->error);
        }
        $stmt->close();
    }
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
     body{
        font-family: Arial, Helvetica, sans-serif;  
        background-image: linear-gradient(45deg, cyan, yellow );      


     }
    .box{
        color: white;
       position: absolute;
       top: 50%;
       left: 50%;
       transform: translate(-50%,-50%);
       background-color: rgba(0, 0, 0, 0.9);
       padding: 15px;
       border-radius: 15px;
       
       
    }
    fieldset{

    border: 3px solid dodgerblue;

    }
    legend{

    border: 1px solid dodgerblue;
    padding: 10px;
    text-align: center;
    background-color: dodgerblue;
    border-radius: 8px;
    


    }
    .inputBox{
 
     position: relative;

    }
    .inputUser{

        background: none;
        border: none;
        border-bottom: 1px solid white;
        outline: none;
        color: white;
        font-size: 15px;
        letter-spacing: 2px;
    }
    .labelInput{

        position: absolute;
        top: 0px;
        left: 0px;
        pointer-events: none;
        transition: .5s;

    }
    .inputUser:focus ~ .labelInput,
    .inputUser:valid ~ .labelInput{
        top: -20px;
        font-size: 12px;
        color: dodgerblue;

    }
    #dataNascimento{
        border: none;
        padding: 8px;
        border-radius: 10px;
        outline: none;
        font-size: 15px;



    }
    #submit{

       background-image: linear-gradient(to right, rgb(0,92,187), rgb(90,20,220));
       width: 100%;
       border: none;
       padding: 15px;
       color: white;
       font-size: 15px;
       cursor: pointer;
       border-radius: 10px;

    }
    #submit:hover{
       background-image: linear-gradient(to right, rgb(0,80,172), rgb(80,19,195));

    }
    .span-required{
        font-size: 12px;
        margin: 3px 0 0 1px;
        color: var(--color-red);
        display: none;
    }
    </style>
</head>
<body>
    <a href="sistema.php">Voltar</a>
    <div class="box">
        <form id="form" action="cadastro.php" method="POST" >
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser requirede" oninput="nameValidate()" required>
                    <label for="nome"  class="labelInput">Nome Completo</label>
                    <span class="span-required">Nome deve ter no minimo 3 caracteres</span>

                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser requirede" oninput="emailValidate()" required>
                    <label for="email" class="labelInput">Email</label>
                    <span class="span-required">Digite um email valido</span>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser requirede telefone" oninput="phoneValidate()" placeholder="(xx) xxxx-xxxx" required>
                    <label for="telefone"  class="labelInput">Telefone</label>
                    <span class="span-required">telefone minimo 9 digitos</span>

                </div>
                <p>Sexo</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br>
          
                <label for="nome"><b>Data de Nascimento:</b></label>
                <input type="date" name="dataNascimento" id="dataNascimento" required>

          
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser requirede" oninput="cityValidate()" required>
                    <label for="cidade"  class="labelInput">Cidade</label>
                    <span class="span-required">escreva um cidade valido</span>

                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser requirede" oninput="stateValidate()" required>
                    <label for="estado"  class="labelInput">Estado</label>
                    <span class="span-required">escreva um estado valido minimo 2 siglas</span>

                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser requirede" oninput="addressValidate()" required>
                    <label for="endereco"  class="labelInput">Endereço</label>
                    <span class="span-required">escreva um endereço valido</span>

                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
                 



            </fieldset>            
  


        </form>



    </div>
</body>
<script>
    const form = document.getElementById('form');
    const campos = document.querySelectorAll('.requirede');
    const spans = document.querySelectorAll('.span-required');
    const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
  
    function setError(index){
     campos[index].style.border = '2px solid #e63636';
     spans[index].style.display = 'block';
   }

   function removeError(index){
    campos[index].style.border = '';
    spans[index].style.display = 'none';
   }


    function nameValidate(){
  if (campos[0].value.length < 3)
  {
   setError(0);

    }
  else
  {
    removeError(0);
  }

 
}
function setError(index){
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
}

function removeError(index){
    campos[index].style.border = '';
    spans[index].style.display = 'none';
}

function emailValidate(){
    const emailField = document.getElementById('email');
    const emailIndex = Array.from(campos).indexOf(emailField);
    if(emailRegex.test(emailField.value)) {
        console.log('valido com sucesso');
        removeError(emailIndex); // Remover erro se o email for válido
    } else {
        console.log('não valido');
        setError(emailIndex); // Mostrar erro se o email for inválido
    }
}
function mainPasswordValidate(){

    if(campos[1].value.length < 8)
{
    setError(1);
}
else
{
    removeError(1); 
}
}


</script>
</html>
