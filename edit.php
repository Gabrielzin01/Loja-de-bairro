<?php

include_once('config.php');

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $senha = $user_data['senha'];
            $telefone = $user_data['telefone'];
            $sexo = $user_data['sexo'];
            $datadenascimeto = $user_data['datadenascimento'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $endereco = $user_data['endereco'];
        }
       
    } else {
        header('Location: sistema.php');
    }
}
else
{
    header('Location: sistema.php');
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
    #datadenascimento{
        border: none;
        padding: 8px;
        border-radius: 10px;
        outline: none;
        font-size: 15px;



    }
    #update{

       background-image: linear-gradient(to right, rgb(0,92,187), rgb(90,20,220));
       width: 100%;
       border: none;
       padding: 15px;
       color: white;
       font-size: 15px;
       cursor: pointer;
       border-radius: 10px;

    }
    #update:hover{
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
        <form id="form" action="saveEdit.php" method="POST" >
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser requirede" oninput="nameValidate()" value="<?php echo $nome ?>" required>
                    <label for="nome"  class="labelInput">Nome Completo</label>
                    <span class="span-required">Nome deve ter no minimo 3 caracteres</span>

                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser requirede" oninput="mainPasswordValidate()"  value="<?php echo $senha ?>" required>
                    <label for="senha"  class="labelInput">Senha</label>
                    <span class="span-required">Digite uma senha com no minimo 8 caracteres</span>

                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser requirede" oninput="emailValidate()" value="<?php echo $email ?>" required>
                    <label for="nome" class="labelInput">Email</label>
                    <span class="span-required">Digite um email valido</span>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser requirede telefone" oninput="phoneValidate()" placeholder="(xx) xxxx-xxxx" value="<?php echo $telefone ?>" required>
                    <label for="nome"  class="labelInput">Telefone</label>
                    <span class="span-required">telefone minimo 9 digitos</span>

                </div>
                <p>Sexo</p>
                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo($sexo == 'feminino') ? 'checked' : '' ?> required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" <?php echo($sexo == 'masculino') ? 'checked' : '' ?> required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" <?php echo ($sexo == 'outro') ? 'checked' : '' ?> required>
                <label for="outro">Outro</label>
                <br>
          
                <label for="nome"><b>Data de Nascimento:</b></label>
                <input type="date" name="datadenascimento" id="datadenascimento"  value="<?php echo $datadenascimeto ?>"  required>

          
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser requirede" oninput="cityValidate()"  value="<?php echo $cidade ?>" required>
                    <label for="cidade"  class="labelInput">Cidade</label>
                    <span class="span-required">escreva um cidade valido</span>

                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser requirede" oninput="stateValidate()"  value="<?php echo $estado ?>" required>
                    <label for="estado"  class="labelInput">Estado</label>
                    <span class="span-required">escreva um estado valido minimo 2 siglas</span>

                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser requirede" oninput="addressValidate()"  value="<?php echo $endereco ?>" required>
                    <label for="endereco"  class="labelInput">Endereço</label>
                    <span class="span-required">escreva um endereço valido</span>

                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update">
                 



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
