function VisaoCategoria(){
	

	this.carregarTudo = function(listas){
		var tabela = document.getElementById("ListaTecnicas");
		tabela.innerHTML = "<tr> <th>ID</th> <th>Nome</th> <th>Editar</th> <th>Remover</th></tr>";
		var listaInputs="";
		for(var key in listas) {
			var categoria = listas[key];
			var Id = categoria.id;
			var edit = '<input type="button" class="waves-effect waves-light btn-small" onclick="location.href='+"'altera_categoria.php?Id=' + "+ Id+';" value="Editar" />';
			var remove = ' <button class="waves-effect waves-light btn-small" onclick="controle.remover('+categoria.id+');"> remover </button>';
			var input = ' <tr><td>'+ categoria.id+ '</td><td>' + categoria.nome +'</td><td>'+edit+'</td><td>'+remove +'</td> </tr>';
			listaInputs += input;
		}
		tabela.innerHTML+= listaInputs;	
	}
	
}