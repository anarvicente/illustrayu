function PersistenciaProduto(){     

	_this = this;
	this.listaListener = new Event(this);
	this.lista = [];
	
	this.limpar = function(){
	
		$.ajax({
			url: 'https://illustrayu-annavicente.c9users.io/slim-skeleton/public/produtos',
			type: 'delete',
			success: function(data, status){
				_this.lista = data;
				_this.listaListener.notify(data);
				alert("Removido com sucesso!");
			},
			error: function(er){
				alert(er);
			}
			
		});
	}
	
	this.update =  function(atividade){
		let url = 'https://desenvolvimento-web-julianayuri.c9users.io/slim-skeleton/public/alterar_produto';
		$.post( url,  atividade)
			.done(function(msg){
				alert(msg);
				_this.listarTodos()
			})
			.fail(function(xhr, status, error) {
				alert("alguma falha");
				alert(xhr.responseText);
			})
	}
	
	this.remover = function(id){
		
		$.ajax({
			url: 'https://illustrayu-annavicente.c9users.io/slim-skeleton/public/produtos/'+id,
			type: 'delete',
			success: function(msg){
				_this.listarTodos();
			},
			error: function(er){
				alert(er);
			}
			
		});
		/*
		$.delete( 'https://illustrayu-annavicente.c9users.io/slim-skeleton/public/remover_produto', {'id': id})
			.done(function(msg){
				_this.listarTodos;

			})
			.fail(function(xhr, status, error) {
				alert("alguma falha");
				alert(xhr.responseText);
			})
			
		*/
	}

	this.listarTodos  = function (){	
		_this.lista = [];
		
		let url = 'https://illustrayu-annavicente.c9users.io/slim-skeleton/public/produtos';
			$.get(url, function(data, status){
				_this.lista = data;
				console.log(_this.lista);
				_this.listaListener.notify(data);
		});
	}
	
}