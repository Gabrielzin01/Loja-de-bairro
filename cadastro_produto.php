
<?php


    if(isset($_POST['submit']))
    {
        // print_r('Nome: ' . $_POST['nome']);
        // print_r('<br>');
        // print_r('Email: ' . $_POST['email']);
        // print_r('<br>');
        // print_r('Telefone: ' . $_POST['telefone']);
        // print_r('<br>');
        // print_r('Sexo: ' . $_POST['genero']);
        // print_r('<br>');
        // print_r('Data de nascimento: ' . $_POST['data_nascimento']);
        // print_r('<br>');
        // print_r('Cidade: ' . $_POST['cidade']);
        // print_r('<br>');
        // print_r('Estado: ' . $_POST['estado']);
        // print_r('<br>');
        // print_r('Endereço: ' . $_POST['endereco']);

        include_once('config.php');

        $tipo = $_POST['tipo'];
        $preco = $_POST['preco'];
        $fornecedor = $_POST['fornecedor'];
        $cor = $_POST['cor'];
        $marca = $_POST['marca'];
        $tamanho = $_POST['tamanho'];
   
        $result = mysqli_query($conexao, "INSERT INTO estoque(tipo,preco,fornecedor,cor,marca,tamanho) 
        VALUES ('$tipo','$preco','$fornecedor','$cor','$marca','$tamanho')");

        header('Location: produtos.php');
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
    <a href="produtos.php">Voltar</a>
    <div class="box">
        <form id="form" action="cadastro_produto.php" method="POST" >
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <p>Tipo de Roupa</p>
                <input type="radio" id="camisa" name="tipo" value="camisa" required>
                <label for="camisa">Camisa</label>
                <input type="radio" id="calca" name="tipo" value="calca" required>
                <label for="calca">Calça</label>
                <input type="radio" id="tenis" name="tipo" value="tenis" required>
                <label for="tenis">Tenis</label>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="preco" id="preco" class="inputUser requirede" oninput="mainPasswordValidate()" required>
                    <label for="preco"  class="labelInput">Preço</label>

                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="fornecedor" id="fornecedor" class="inputUser requirede" oninput="emailValidate()" required>
                    <label for="fornecedor" class="labelInput">Fornecedor</label>
                </div>
                <p>Cor</p>
                <input type="radio" id="vermelho" name="cor" value="vermelho" required>
                <label for="vermelho">Vermelho</label>
                <br>
                <input type="radio" id="azul" name="cor" value="azul" required>
                <label for="azul">Azul</label>
                <br>
                <input type="radio" id="amarelo" name="cor" value="amarelo" required>
                <label for="amarelo">Outro</label>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="marca" id="marca" class="inputUser requirede" oninput="cityValidate()" required>
                    <label for="marca"  class="labelInput">Marca</label>

                </div>
                <br><br>
                <p>Tamanho</p>
                <input type="radio" id="p" name="tamanho" value="p" required>
                <label for="p">P</label>
                <input type="radio" id="m" name="tamanho" value="m" required>
                <label for="m">M</label>
                <input type="radio" id="g" name="tamanho" value="g" required>
                <label for="g">G</label>
                <br><br>
                <input type="submit" name="submit" id="submit">
                 



            </fieldset>            
  


        </form>



    </div>
</body>
</html>
