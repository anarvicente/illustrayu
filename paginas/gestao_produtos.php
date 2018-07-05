<!DOCTYPE html>

<?php
    include_once("login/valida_sessao.php");
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
    <style type="text/css">
    	.nav-wrapper {
		    background-color: #ffffff!important;
		    font-size: 14px;
		    font-weight: bold;
		  }
		 	td, th {
				text-align: center;
			}

		  
    </style>
	
</head> 

<body onload="inicializacao()">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/VisaoProduto.js"></script>
	<script type="text/javascript" src="js/ControleProduto.js"></script>
	<script type="text/javascript" src="js/persistenciaProduto.js"></script>
	<script type="text/javascript" src="js/event.js"></script>
	<script src="js/pesquisa.js"></script>

<SCRIPT>
	var controle = new ControleProduto();
	function inicializacao(){
		controle.atachListenerProdutoVisaoLoadAll();
		controle.atualizarLista();
	}
    
</script>

<nav>
  <div nav class="white">
    <a href="admin.php" class="brand-logo">Gestão de Produtos</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
    	
      <li><a class="waves-effect waves-teal btn-flat white-text" 
      onclick="location.href='cadastro_produto.php';"> Adicionar 
      <i class="material-icons right">add</i> 
      </a></li>
      
      <li><a class="waves-effect waves-teal btn-flat white-text" 
      onclick= "controle.limparTudo();" > Remover Tudo 
      <i class="material-icons right">delete</i> 
      </a></li>
      
      <li><a class="waves-effect waves-light btn-flat white-text" href="admin.php" 
      name='removerTudo' value='removeTudo'>voltar
      <i class="material-icons right">reply</i> </a></li>
      
    </ul>
  </div>
</nav>
<br>

<div class="row">
  <div class="col s12">
    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">search</i>
        <input type="search" id="myInput" onkeyup="pesquisaPorNomeProduto()" 
           placeholder="Pesquisa por nomes.." >
      </div>
    </div>
  </div>
</div>


<div>

	<table  id="myTable" class= "bordered highlight centered"> </table>
	
</div>

</body>
</html>