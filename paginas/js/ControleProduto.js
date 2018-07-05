function ControleProduto(){
	
	this.persistencia = new PersistenciaProduto();
	this.atividadeVisao = new VisaoProduto();
	var _this= this;
	

	this.atachListenerProdutoVisaoLoadAll= function(){
		this.persistencia.listaListener.attach(function (sender, data) { 
		_this.atividadeVisao.carregarTudo(data);
		}
	);
	}
	
	this.atualizarLista =function(){
		var lista = this.persistencia.listarTodos();
	}
	
	this.remover =function(id){
		var r = confirm("Tem certeza que deseja excluir?");
	    if (r == true) {
	        this.persistencia.remover(id);
	    }
		
	}
	
    
	this.limparTudo = function(){
		var r = confirm("Tem certeza que deseja excluir todos os produtos?");
	    if (r == true){
			this.persistencia.limpar();
			this.atualizarLista();
		}

	}
}
