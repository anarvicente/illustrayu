<?php
    include_once("login/valida_sessao.php");
    include_once("conn.php");
    $rs = getVendas();
    $total = $rs->rowCount();
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
    <a href="admin.php" class="brand-logo">Gestão de Vendas</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
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
    <th>ID</th>
    <th>Cliente</th>
    <th>Data</th>
    <th>Valor Total</th>
    <th>Forma de pagamento</th>
    <th>Pago</th>
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
			<td><?=$linha->id?></td>
			<td><?=$linha->cliente?></td>
			<td><?=$linha->data?></td>
			<td>R$ <?=$linha->valor_total?></td>
			<td>Boleto</td>
			
			<?php
	    if($linha->pago > 0){
      ?>
      <td><i class="material-icons">thumb_up</i></td>
      <?php
	        } else {
      ?>
      <td><i class="material-icons">thumb_down</i></td>
      <?php
	        }
      ?>
			
			<td> <button class="waves-effect waves-light btn-small" name='editar' onclick= "alteraVenda( <?=$linha->id?> )" value='editar'>editar</button></td>
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
