
atualizaPreco = function(id, produto_id){
	persistencia = new persistenciaCarrinho();		
	
	if(id != null){
		var qtd = document.getElementById(id).value;
		
		persistencia.atualizaProduto(produto_id,qtd);
		
		var preco = document.getElementById('preco'+id).getAttribute("value");
		document.getElementById('preco'+id).textContent = "R$ "+ parseFloat(preco)*parseInt(qtd);
		
		var valor_total = 0;
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");

		// a primeira linha eh o cabecalho 
		 for (i = 1; i < tr.length; i++) {
	 		td = tr[i].getElementsByTagName("td")[2].textContent;
	 		valor_total+= parseFloat(td.split(" ")[1]);
	 		
		 }
		
		//document.getElementById('total').textContent = "R$ " +valor_total; 
		document.getElementById('subtotal').innerHTML = "R$ " +valor_total;
		var frete = parseFloat(document.getElementById('frete').innerHTML.split(" ")[1]);
		document.getElementById('total').innerHTML = "R$ " +(valor_total+frete);
		
		//console.log(document.getElementById('subtotal').innerHTML);
	}
	
}
	
function visaoCarrinho(){
	

	this.carregarTudo = function(id_cliente){
		
		persistencia = new persistenciaCarrinho();		
		
	    carrinho = JSON.parse(localStorage.getItem(localStorage.key("carrinho")));
	    
		var tabela = document.getElementById("myTable");
		tabela.innerHTML = "<thead><tr> <th>Produto</th> <th>Nome</th>  <th>Preço</th> <th>Quantidade</th> <th>Remover</th> </thead>";
		var listaInputs="";
		var valor_total = 0;
		for(i=0; i < carrinho.length; i++){
			var produto = carrinho[i];
			valor_total += parseFloat(produto.preco);
			var imagem = '<img src="../slim-skeleton/src/fotos/' + produto.imagem + '" width="50" id="img-preview">'; 
			var remove = '<div onclick=persistencia.removeProduto('+produto.id+')><i class="material-icons center">cancel</i></div>';
			var quantidade = '<input id='+i+' onchange='+"atualizaPreco("+i+","+produto.id+")"+' type="number" value='+produto.qtd_escolhido+' style="width:50px" min=0 max='+produto.qtd+'>';
			var preco = '<div id="preco'+i+'" value= '+produto.preco+'>R$ '+produto.preco+'</div>';
			var input = '<tbody><tr><td>'+imagem+ '</td><td>'+produto.nome + '</td>'+ '<td>'+preco+'</td>' +'<td>'+quantidade+'</td><td>'+remove +'</td> </tr></tbody>';
			listaInputs += input;
		}
		
		//tabela.innerHTML += "<thead><tr> <th>Total</th> <th></th>  <th></th> <th></th> <th id='total'>R$ "+valor_total+"</th> </thead>";
		if(carrinho.length > 0){
			tabela.innerHTML += listaInputs;
			document.getElementById("card").style.display = 'block';
			atualizaPreco(0, -1);
		}else{
			document.getElementById("card").style.display = 'none';
			tabela.innerHTML = "<h3> Seu carrinho está vazio! </h3>";
			
		}
		
		
	}
	
}
	
	
