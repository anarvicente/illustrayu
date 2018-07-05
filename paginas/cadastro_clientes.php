<?php
  include_once("login/valida_sessao.php");
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
  <div class='container'>
  <h4>Cadastro de Clientes</h4>
  
  <form method='post'  action= 'https://illustrayu-annavicente.c9users.io/slim-skeleton/public/clientes'>
    
    <br>    
    Nome:<br>
    <input class='validate' type="text" id='nome' name="nome" value="" autocomplete='name'>

    E-mail:<br>
    <input type="email" name="email" value="" autocomplete='email' required>


    Senha:<br>
    <input type="password" name="senha" value="" autocomplete='current-password' required>


    Nascimento:<br>
    <input type="date" name="nascimento" value="">
    

    Gênero:<br>
    <!--<input class="with-gap" type="radio" name="genero" value="M" checked> Masculino<br> -->
    <label>
      <input class="with-gap" name="genero" type="radio" value="M" checked />
      <span> Masculino </span>
    </label>
    <br>
    
    <label>
      <input class="with-gap" name="genero" type="radio" value="F" />
      <span> Feminino </span>
    </label>
    <br><br>
    
    <br>
    
    <!-- Inserir endereco -->
    
    CEP:<br>
    <input name="cep" type="text" id="cep" value="" size="10" maxlength="20" 
    autocomplete='postal-code' onblur="pesquisacep(this.value);" />
    
    Rua:<br>
    <input name="rua" type="text" id="rua" size="40" autocomplete='street-address' />
    
    Bairro:<br>
    <input name="bairro" type="text" id="bairro" size="40" />
    
    Cidade:<br>
    <input name="cidade" type="text" id="cidade" size="40" autocomplete='address-level2' />
    
    Estado:<br>
    <input name="uf" type="text" id="uf" size="2" autocomplete='address-level1' />
    
    
    <!--
    <button class="waves-effect waves-light btn-small" name='submit' onclick= "mySubmit(<script>document.getElementById('nome').value </script>)" >enviar
      <i class="material-icons right">send</i>
    </button>
    -->
    
    
    <button class="btn waves-effect waves-light" type="submit" name="action">Salvar
        <i class="material-icons right">send</i>
    </button>
    
    
  </form>
  </div>

  
</body>
</html>
