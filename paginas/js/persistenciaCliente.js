

function alteraVenda(id){
    alert("Venda "+ id + "Alterada");
}

function removeCliente(id){
    //chamada assincrona, entao o reload tem que ficar dentro do success
    $.ajax({
        url: 'https://illustrayu-annavicente.c9users.io/slim-skeleton/public/clientes/'+id,
        type: 'DELETE',
        success: function(result){
            alert(result);
            window.location.reload();
        }
    })
}

function alteraCliente(id){
    window.location.href = window.location.origin + "/paginas/altera_clientes.php?id="+id;
}

function addCliente(){
    window.location.href = window.location.origin + "/paginas/cadastro_clientes.php";
}





function testaGet(){
    url = "https://illustrayu-annavicente.c9users.io/slim-skeleton/public/clientes?id="+120;
    $.ajax({
        url: url,
        type: 'GET',
        cache: false,
        data: {id: 120},
        success: function(result){
            alert(result);
            //window.location.reload();
        },
        error: function(error){
            alert("deu erro!");
        }
        
    })
}



function mySubmitAltera(){
    url = "https://illustrayu-annavicente.c9users.io/slim-skeleton/public/cliente";
    $.ajax({
        url: url,
        type: 'PUT',
        data: {form: $('#form').serialize()},
        success: function(result){
            alert(result);
            //window.location.reload();
        }
    })
}

function removeTudo(){
    $.ajax({
        url: "https://illustrayu-annavicente.c9users.io/slim-skeleton/public/clientes",
        type: 'DELETE',
        success: function(result){
            alert(result);
            window.location.reload();
        }
    })
}



