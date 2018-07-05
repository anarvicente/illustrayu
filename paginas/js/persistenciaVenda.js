
function realizaVenda(valor_total, frete, forma_pag, cliente){
    //chamada assincrona, entao o reload tem que ficar dentro do success
    $.ajax({
        url: "https://illustrayu-annavicente.c9users.io/slim-skeleton/public/vendas",
        type: 'POST',
        data: {data:'CURRENT_DATE', valor_total:valor_total, frete:frete, forma_pag:forma_pag, pago:0, cliente:cliente},
        success: function(result){
            alert(result);
        }
    })
}

function getCarrinho(){
    //chamada assincrona, entao o reload tem que ficar dentro do success
    persistencia = new persistenciaCarrinho();	
    var carrinho = persistencia.getDados();
    var pagamento = document.getElementsByName('tipo_pagamento');
    var forma_pag;
    var i;
    
    for(i = 0; i < pagamento.length; i++){
        if(pagamento[i].checked){
            forma_pag = pagamento[i].getAttribute('value');
        }
    }

    var valor_total = 0;
    for(i=0; i < carrinho.length; i++){ 
        valor_total = valor_total + parseInt(carrinho[i].qtd_escolhido)*parseInt(carrinho[i].preco);
    }
    
    // verificar se cliente estah logado
    realizaVenda(valor_total, 14, parseInt(forma_pag), parseInt(carrinho[0].cliente));
    
    
}
