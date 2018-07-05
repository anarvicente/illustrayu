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
    <style type="text/css">
	 	td, th {
			text-align: center;
		}

		  
    </style>
</head> 

<body onload="inicializacao()">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/VisaoCategoria.js"></script>
	<script type="text/javascript" src="js/ControleCategoria.js"></script>
	<script type="text/javascript" src="js/persistenciaCategoria.js"></script>
	<script type="text/javascript" src="js/event.js"></script>

<SCRIPT>
	var controle = new ControleCategoria();
	function inicializacao(){
		controle.atachListenerProdutoVisaoLoadAll();
		controle.atualizarLista();
	}
    
</script>

<nav>
  <div class="nav-wrapper">
    <a href="admin.php" class="brand-logo">Gestão de Categorias</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a class="waves-effect waves-teal btn-flat white-text"
      onclick="location.href='cadastro_categoria.php';"> Adicionar 
      <i class="material-icons right">add</i> </a></li>
      
      <li><a class="waves-effect waves-teal btn-flat white-text" 
      onclick= "controle.limparTudo();" > Remover Tudo
      <i class="material-icons right">delete</i> </a></li>
      
      <li><a class="waves-effect waves-light btn-flat white-text" href="admin.php" 
      name='removerTudo' value='removeTudo'>voltar
      <i class="material-icons right">reply</i> </a></li>
      
    </ul>
  </div>
</nav>
<br>



<br><br>

<div>

<table id="ListaTecnicas" class= "bordered highlight centered"> </table>

</div>

</body>
</html>