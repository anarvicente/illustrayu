<!DOCTYPE html>
<?php
    include_once("login/valida_sessao.php");
    include_once("conn.php");
    
    $cat = getCategoria();
    $tec = getTecnica();
?>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">      
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    
    <script>
         $(document).ready(function() {
            $('select').material_select();
         });
    </script>
</head>

<body>
<div class='container'>
	<h4>Cadastro de Produto</h4>
	
	<form method ="post" action ="https://illustrayu-annavicente.c9users.io/slim-skeleton/public/produto" enctype="multipart/form-data">
		
		Código: 
		<input type="text" name="codigo"><br>
		
		Nome: 
		<input type="text" name="nome"><br>
		
		Preço:
		<input type="number" step=0.05 name="preco"><br>
		
		Quantidade:
		<input type="number" step=1 name="qtd"><br>
		
		Categoria:
		<select name="categoria" id="categoria" class="browser-default">
			
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
		
		Tipo:
		<select name="tipo" id="tipo" class="browser-default">
			<option value= 1 >Físico</option>
			<option value= 2 >Digital</option>
		</select> <br>
		
		Técnica de pintura:
		<select name="tecnica" id="tecnica" class="browser-default">
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
		
		Descrição:
		<textarea name="descricao" class="materialize-textarea"></textarea><br>
		
		Imagem: 
		<input type="file" id="imagem" name='imagem' onchange="PreviewImage();"><br><br>
		<img src="" width="100" id="img-preview">
		<br><br>
		
		<button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar
        <i class="material-icons right">send</i>
    </button>
		
	</form>
</div>

<script type="text/javascript">
	function PreviewImage() {
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("imagem").files[0]);

		oFReader.onload = function (oFREvent) {
			document.getElementById("img-preview").src = oFREvent.target.result;
		};
	};
</script>

</body>
</html>