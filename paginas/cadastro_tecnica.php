<!DOCTYPE html>

<?php
    include_once("login/valida_sessao.php");
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset='UTF-8'>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>



<div class='container'>
	<h4>Cadastrar Técnica de Pintura</h4>
	<form method ="post" action ="https://illustrayu-annavicente.c9users.io/slim-skeleton/public/tecnica">
		
		<div class="input-field">
		  	  <input type="text" name="nome"><br><br>
		  	  <label> Nome:</label>
   		 </div>
		
		<button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar
        <i class="material-icons right">send</i>
    </button>
		
	</form>
</div>


</body>
</html>