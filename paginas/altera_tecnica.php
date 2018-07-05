<?php
    include_once("login/valida_sessao.php");
    include_once("conn.php");
    
    $rs = getTecnicaEspecifico($_GET['Id']);
    $linha = $rs->fetch(PDO::FETCH_OBJ);
    
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
  
  <div class='container'>
  <h4>Alterar Tecnica</h4>

  <form method="post" action="https://illustrayu-annavicente.c9users.io/slim-skeleton/public/alterar_tecnica">
    
    <br>
    <input type='hidden'  name="id" value= '<?=$_GET['Id']?>'> 

  <div class="input-field">
  	  <input type="text" name="nome" value= '<?=$linha->nome?>'>
  	  <label> Nome:</label>
  </div>
    
    <button class="btn waves-effect waves-light" type="submit" name="action">Salvar
        <i class="material-icons right">send</i>
    </button>
    
  </form>
  </div>
  
</body>
</html>
