<?php
    include_once("login/valida_sessao.php");
    include_once("conn.php");
    
    $rs = getClienteEspecifico($_GET['id']);
    $linha = $rs->fetch(PDO::FETCH_OBJ);
    
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
  <script src="js/endereco.js"></script>
  <script src="js/persistenciaCliente.js"></script>
  
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  
</head>
<body>
  
  <form method='post' action="https://illustrayu-annavicente.c9users.io/slim-skeleton/public/clientes/<?=$_GET['id']?>">
  
  <br>
  <div class='container'>
  <h4>Alteração de Dados</h4>

    <input type='hidden'  name="id" value= '<?=$_GET['id']?>'> 
    
    <input type="hidden" name="_METHOD" value="PUT"/>
    
    Nome:<br>
    <input type="text" name="nome" value= '<?=$linha->nome?>'>
    

    E-mail:<br>
    <input type="email" name="email" value= '<?=$linha->email?>' required>
    

    Senha:<br>
    <input type="password" name="senha" value= '<?=$linha->senha?>' required>
    

    Nascimento:<br>
    <input type="date" name="nascimento" value= '<?=$linha->nascimento?>'>
    

    Gênero:<br>
    <?php if($linha->genero == 'F'){
      echo '
              <label>
                <input class="with-gap" name="genero" type="radio" value="M" />
                <span> Masculino </span>
              </label>
              <br>
              
              <label>
                <input class="with-gap" name="genero" type="radio" value="F" checked />
                <span> Feminino </span>
              </label>
              <br><br>';
              
    }else{
        echo '
              <label>
                <input class="with-gap" name="genero" type="radio" value="M" checked />
                <span> Masculino </span>
              </label>
              <br>
              
              <label>
                <input class="with-gap" name="genero" type="radio" value="F" />
                <span> Feminino </span>
              </label>
              <br><br>';
    }
    ?>
    <br>
    
    CEP:<br>
    <input name="cep" type="text" id="cep" value="<?=$linha->cep?>" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" />
    
    Rua:<br>
    <input name="rua" type="text" id="rua" value='<?=$linha->rua?>' size="40" />
    
    
    Bairro:<br>
    <input name="bairro" type="text" id="bairro" value='<?=$linha->bairro?>' size="40" />
    
    
    Cidade:<br>
    <input name="cidade" type="text" id="cidade" value='<?=$linha->cidade?>' size="40" />
    
    
    Estado:<br>
    <input name="uf" type="text" id="uf" value='<?=$linha->estado?>' size="5" />
    
    <button class="btn waves-effect waves-light" type="submit" >Salvar
        <i class="material-icons right">send</i>
    </button>
  
    
    
  </form>
  </div>
  
</body>
</html>
