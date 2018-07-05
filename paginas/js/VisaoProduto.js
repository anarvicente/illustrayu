function VisaoProduto(){
	
	this.carregarTudo = function(listas){
		var tabela = document.getElementById("myTable");
		tabela.innerHTML = "<thread><tr> <th>Código</th> <th>Imagem</th>  <th>Nome</th> <th>Preço</th> <th>Categoria</th> <th>Qtd</th> <th>Editar</th> <th>Remover</th> </tr></thread>";
		var listaInputs="";
		for(var key in listas) {
			var produto = listas[key];
			var imagem = '<img src="../slim-skeleton/src/fotos/' + produto.imagem + '" width="50" id="img-preview">'; 
			var Id = produto.id;
			var edit = '<input type="button" class="waves-effect waves-light btn-small" onclick="location.href='+"'altera_produto.php?Id=' + "+ Id+';" value="Editar" />';
			var remove = '<button class="waves-effect waves-light btn-small" onclick="controle.remover('+produto.id+');"> remover </button>';
			var input = '<tbody><tr><td>'+produto.codigo+ '</td><td>'+imagem + '</td><td>' +produto.nome+'</td><td> R$ '+produto.preco+'</td><td>'+ 
			produto.categoria+'</td><td>'+produto.qtd +'</td><td>'+edit+'</td><td>'+remove +'</td> </tr></tbody>';
			listaInputs += input;
		}
		tabela.innerHTML+= listaInputs;	
	}

}