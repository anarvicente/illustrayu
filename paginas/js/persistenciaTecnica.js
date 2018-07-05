function PersistenciaTecnica(){     

	_this = this;
	this.listaListener = new Event(this);
	this.lista = [];
	
	this.limpar = function(){
		$.post( 'https://illustrayu-annavicente.c9users.io/slim-skeleton/public/remover_tecnicas',  function(data, status){
			_this.lista = data;
			_this.listaListener.notify(data);
		});
	}
	
	this.update =  function(atividade){
		let url = 'https://desenvolvimento-web-julianayuri.c9users.io/slim-skeleton/public/updatetecnica';
		$.post( url,  atividade)
			.done(function(msg){
				_this.listarTodos()
			})
			.fail(function(xhr, status, error) {
				alert("alguma falha");
				alert(xhr.responseText);
			})
	}
	
	this.remover = function(id){
		$.post( 'https://illustrayu-annavicente.c9users.io/slim-skeleton/public/remover_tecnica', {'id': id})
			.done(function(msg){
				_this.listarTodos();
			})
			.fail(function(xhr, status, error) {
				alert("alguma falha");
				alert(xhr.responseText);
			})
	}

	this.listarTodos  = function (){	
		_this.lista = []
		let url = 'https://illustrayu-annavicente.c9users.io/slim-skeleton/public/tecnica';
			$.get(url, function(data, status){
				_this.lista = data;
				console.log(_this.lista)
				_this.listaListener.notify(data);
		});
	}
}