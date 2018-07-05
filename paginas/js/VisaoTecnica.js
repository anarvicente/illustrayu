function VisaoTecnica(){
	

	this.carregarTudo = function(listas){
		var tabela = document.getElementById("ListaTecnicas");
		tabela.innerHTML = "<tr> <th>ID</th> <th>Nome</th> <th>Editar</th> <th>Remover</th></tr>";
		var listaInputs="";
		for(var key in listas) {
			var tecnica = listas[key];
			var Id = tecnica.id;
			var edit = '<input type="button" class="waves-effect waves-light btn-small" onclick="location.href='+"'altera_tecnica.php?Id=' + "+ Id+';" value="Editar" />';
			var remove = ' <button class="waves-effect waves-light btn-small" onclick="controle.remover('+tecnica.id+');"> remover </button>';
			var input = ' <tr><td>'+ tecnica.id+ '</td><td>' + tecnica.nome +'</td><td>'+edit+'</td><td>'+remove +'</td> </tr>';
			listaInputs += input;
		}
		tabela.innerHTML+= listaInputs;	
	}


}