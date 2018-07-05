<?php
    include_once("login/valida_sessao.php");
    include_once("conn.php");
    
    $rs = getProdutoEspecifico($_GET['Id']);
    $linha = $rs->fetch(PDO::FETCH_OBJ);
    
    $cat = getCategoria();
    $tec = getTecnica();
    
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
  <h4>Alterar Produto</h4>

  <form method="post" action="https://illustrayu-annavicente.c9users.io/slim-skeleton/public/alterar_produto">
    
    <br>
    <input type='hidden'  name="id" value= '<?=$_GET['Id']?>'> 
    
    <div class="input-field">
  	  <input type="text" name="codigo" value= '<?=$linha->codigo?>'>
  	  <label>Código:</label>
    </div>

    <div class="input-field">
  	  <input type="text" name="nome" value= '<?=$linha->nome?>'>
  	  <label> Nome:</label>
    </div>
    
  
  	<div class="input-field">
  	  <input type="number" step=0.05 name="preco" value= '<?=$linha->preco?>'>
  	  <label>Preço:</label>
    </div>
    
    <div class="input-field">
	    <input type="number" step=1 name="qtd" value= '<?=$linha->qtd?>'>
      <label>Quantidade:</label>
	  </div>
	  
	  <label>Categoria:</label>
	  
		<select name="categoria" id="categoria" class="browser-default" >
		
  		<?php
  		  $total = $cat->rowCount();
  	    if($total > 0){
  	        while($cat_row = $cat->fetch(PDO::FETCH_OBJ)){?>
  
    		        	<option value= <?=$cat_row->id?>  > <?=$cat_row->nome?> </option>
      <?php
    	        }
    	      
    	    }
    	?>    
		</select><br>
		
		<script> document.getElementById("categoria").value = '<?=$linha->categoria?>'; </script>
		
		
		<label>Tipo:</label>
		<select name="tipo" id="tipo" class="browser-default">
			<option value= 1 >Físico</option>
			<option value= 2 >Digital</option>
		</select> <br>
		<script> document.getElementById("tipo").value = '<?=$linha->tipo?>'; </script>
		
		
		<label>Técnica de pintura:</label>
		<select name="tecnica" id="tecnica" class="browser-default">
  			<		
    		<?php
    		  $total = $tec->rowCount();
    	    if($total > 0){
    	        while($tec_row = $tec->fetch(PDO::FETCH_OBJ)){?>
    
    		        	<option value= <?=$tec_row->id?>  > <?=$tec_row->nome?> </option>
      <?php
    	        }
    	      
    	    }
    	?>  
		</select> <br>
		<script> document.getElementById("tecnica").value = '<?=$linha->tecnica?>'; </script>
	  
    <div class="input-field">
      <textarea name="descricao" class="materialize-textarea"><?=$linha->descricao?></textarea>
      <label>Descrição:</label>
    </div>
    
    <button class="btn waves-effect waves-light" type="submit" name="action">Salvar
        <i class="material-icons right">send</i>
    </button>
    
  </form>
  </div>
  
</body>
</html>
