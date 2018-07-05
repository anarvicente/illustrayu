function persistenciaCarrinho(){
    
    this.addProduto = function(produto){
        
        var carrinho = JSON.parse(localStorage.getItem(localStorage.key("carrinho")));
        if(carrinho == null){
          var carrinho = []
        }
        
        produto.qtd_escolhido = 1;
        produto.cliente = -1;
        carrinho.push(produto);
        
        localStorage.setItem('carrinho', JSON.stringify(carrinho));
        alert("Produto adicionado com sucesso!");
        
   }

     this.getDados = function(){
       return JSON.parse(localStorage.getItem(localStorage.key("carrinho")));
     }

     this.removeProduto = function(id){
        var r = confirm("Tem certeza que deseja remover do carrinho?");
        if (r == true){
            var carrinho = this.getDados();
            var i;
        
            for(i=0; i < carrinho.length; i++){
              if(carrinho[i].id == id){
                 carrinho.splice(i,1);
              }
            }
            localStorage.setItem('carrinho', JSON.stringify(carrinho));
            window.location.reload();
        }
      }
      

    this.atualizaProduto = function(id, qtd){
    //console.log("Entrou na persistencia!");
    var carrinho = JSON.parse(localStorage.getItem(localStorage.key("carrinho")));
    var i;
    for(i=0; i < carrinho.length; i++){
      if(carrinho[i].id == id){
         carrinho[i].qtd_escolhido = qtd;
      }
    }
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
   }
      
    /*
     this.salvarAtividades = function(){
       var tarefas = this.getDados();
       var i;
       for(i=0; i < tarefas.length; i++){
         
         if(document.getElementById(tarefas[i].id) != null){
           if(document.getElementById(tarefas[i].id).checked == true){
             tarefas[i].status = true;
             document.getElementById("recuperaAtividades").innerHTML = tarefas[i].descricao + '<br>' +
             document.getElementById("recuperaAtividades").innerHTML;
    
           }else{
             tarefas[i].status = false;
           }
         }
       }
       localStorage.setItem('lista_atividades', JSON.stringify(tarefas));
     }
    */
}