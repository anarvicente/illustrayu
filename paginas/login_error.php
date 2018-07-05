<?php
  //session_start();
?>


<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <style>
    p {text-align:center;}
  </style>
  
</head>
<body>
  
  <div class="container">
    <h5> Login </h5>
    
    <form method="post" action="https://illustrayu-annavicente.c9users.io/slim-skeleton/public/login">
      <br>
      
        <div class="input-field col s6">
          <input id="login" name="login" type="email" class="validate">
          <label for="login">E-mail</label>
        </div>
      
        <br>
      
        <div class="input-field col s6">
          <input id="senha" name="senha" type="password" class="validate">
          <label for="senha">Senha</label>
        </div>
      
      <p>
      <font color="red"> Email ou Senha inválidos</font>
      </p>
    
      <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
        <i class="material-icons right">send</i>
      </button>
      
    </form>
  </div>
  
</body>
</html>
