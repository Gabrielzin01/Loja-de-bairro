<?php


include_once('config.php');

if (!empty($_GET['ides'])) {

    $ides = $_GET['ides'];

    $sqlSelect = "SELECT * FROM vendas WHERE ides=$ides";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data['nome'];
            $tipo = $user_data['tipo'];
            $preco = $user_data['preco'];
            $quantidade = $user_data['quantidade'];
            $cor = $user_data['cor'];
            $marca = $user_data['marca'];
            $tamanho = $user_data['tamanho'];
        }
       
    } else {
        header('Location: vendas.php');
    }
}
else
{
    header('Location: vendas.php');
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
    <a href="vendas.php">Voltar</a>
    <div class="box">
        <form id="form" action="cadastro_vendas.php" method="POST">
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                
                <!-- Campo de seleção para o nome -->
                <label for="nome">Selecione o Nome:</label>
                <select name="nome" id="nome" required>
                    <option value="">Selecione um usuário</option>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <option value="<?= $usuario; ?>"><?= $usuario; ?></option>
                    <?php endforeach; ?>
                </select>
                <br><br>

                <p>Tipo de Roupa</p>
                <input type="radio" id="camisa" name="tipo" value="camisa" <?php echo($tipo == 'camisa') ? 'checked' : '' ?>  required>
                <label for="camisa">Camisa</label>
                <input type="radio" id="calca" name="tipo" value="calca" <?php echo($tipo == 'calca') ? 'checked' : '' ?>  required>
                <label for="calca">Calça</label>
                <input type="radio" id="tenis" name="tipo" value="tenis" <?php echo($tipo == 'tenis') ? 'checked' : '' ?>  required>
                <label for="tenis">Tenis</label>
                <br><br>
                
                <p>Cor</p>
                <input type="radio" id="vermelho" name="cor" value="vermelho" <?php echo($cor == 'vermelho') ? 'checked' : '' ?>   required>
                <label for="vermelho">Vermelho</label>
                <br>
                <input type="radio" id="azul" name="cor" value="azul"  <?php echo($cor == 'azul') ? 'checked' : '' ?>  required>
                <label for="azul">Azul</label>
                <br>
                <input type="radio" id="amarelo" name="cor" value="amarelo"  <?php echo($cor == 'amarelo') ? 'checked' : '' ?>  required>
                <label for="amarelo">Amarelo</label>
                <br><br>

                <p>Marca</p>
                <input type="radio" id="nike" name="marca" value="nike" <?php echo($marca == 'nike') ? 'checked' : '' ?> required>
                <label for="nike">NIKE</label>
                <br>
                <input type="radio" id="addidas" name="marca" value="addidas" <?php echo($marca == 'addidas') ? 'checked' : '' ?> required>
                <label for="addidas">ADDIDAS</label>
                <br>
                <input type="radio" id="puma" name="marca" value="puma" <?php echo($marca == 'puma') ? 'checked' : '' ?> required>
                <label for="puma">PUMA</label>
                <br><br>

                <p>Tamanho</p>
                <input type="radio" id="p" name="tamanho" value="p" <?php echo($tamanho == 'p') ? 'checked' : '' ?> required>
                <label for="p">P</label>
                <input type="radio" id="m" name="tamanho" value="m" <?php echo($tamanho == 'm') ? 'checked' : '' ?> required>
                <label for="m">M</label>
                <input type="radio" id="g" name="tamanho" value="g" <?php echo($tamanho == 'g') ? 'checked' : '' ?> required>
                <label for="g">G</label>
                <br><br><br>

                <div class="inputBox">
                    <input type="text" name="quantidade" id="quantidade" class="inputUser requirede" value="<?php echo $quantidade ?>" required>
                    <label for="quantidade" class="labelInput">Quantidade</label>
                </div>
                <br>
                
                <!-- Exibição do preço fixo -->
                <p>Preço: 50R$</p>
                
                <!-- Campo oculto para enviar o preço fixo -->
                <input type="hidden" name="preco" value="50">
                
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
