<?php
    include_once("login/valida_sessao.php");
    include_once("conn.php");
    $rs = getClientes();
    $total = getTotalClientes();
?>

<html>
<head>
    <meta charset='UTF-8'>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <script src="js/persistenciaCliente.js"></script>
    <script src="js/pesquisa.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>




<nav>
  <div class="nav-wrapper">
    <a href="admin.php" class="brand-logo">Gestão de Clientes</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      
      <li><a class="waves-effect waves-light btn-flat white-text" 
      name='adicionar' onclick= "addCliente()" value='adicionar'>Adicionar
      <i class="material-icons right">add</i> </a>
      
      <li><a class="waves-effect waves-light btn-flat white-text" 
      name='removerTudo' onclick= "removeTudo()" value='removeTudo'>Remover Tudo
      <i class="material-icons right">delete</i> </a></li>
      
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
        <input type="search" id="myInput" onkeyup="pesquisaPorNome()" 
           placeholder="Pesquisa por nomes.." >
      </div>
    </div>
  </div>
</div>
       
<table  id='myTable' class= "bordered highlight centered">
 <thead>    
  <tr>
    <th>Nome</th>
    <th>Email</th>
    <th>Nascimento</th>
    <th>Gênero</th>
    <th>CEP</th>
    <th>Cidade</th>
    <th>Estado</th>
    <th>Editar</th>
    <th>Remover</th>
  </tr>
  </thead>
  
    <?php
	    if($total > 0){
	        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
    ?>
      <tbody>
      <tr>
			<td><?=$linha->nome?></td>
			<td><?=$linha->email?></td>
			<td><?=$linha->nascimento?></td>
			<td><?=$linha->genero?></td>
			<td><?=$linha->cep?></td>
			<td><?=$linha->cidade?></td>
			<td><?=$linha->estado?></td>
			<td> <button class="waves-effect waves-light btn-small" name='editar' onclick= "alteraCliente( <?=$linha->id?> )" value='editar'>editar</button></td>
			<td> <button class="waves-effect waves-light btn-small" name='remover' onclick= "removeCliente( <?=$linha->id?> )" value='remover'>remover</button></td>
			</tr>
			</tbody>
			
    <?php
		
		}// fim do if
	}// fim do while
    ?>
    
  </tr>
</table>

</body>
</html>
