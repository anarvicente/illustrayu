<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\UploadedFile;

include_once("../../paginas/conn.php");

//VERIFICAR COMO FAZER INCLUDE DE ROTAS.
//include_once("paginas/routes_back/routes_clientes.php"); 
//include_once("paginas/routes_back/routes_admin.php");

$app->get('/clientes', function ($request, $response, $args) {        
    header("Access-Control-Allow-Origin: *");
    $sth = $this->db->prepare("SELECT * FROM cliente");     
    $sth->execute();      
    $clientes = $sth->fetchAll();   
    return $this->response->withJson($clientes);   
    
}); 


$app->get('/clientes/{id}', function ($request, $response, $args) {        
    header("Access-Control-Allow-Origin: *");
    $cliente = getClienteEspecifico($args['id']);
    return $this->response->withJson($cliente);   
});


$app->put('/clientes/{id}', function ($request, $response) {
       header("Access-Control-Allow-Origin: *");
        $input = $request->getParsedBody();
        
        $sql = "UPDATE cliente SET nome=:nome, email=:email, genero=:genero, 
               nascimento=:nascimento, senha=:senha, cep=:cep, rua=:rua, 
               bairro=:bairro, cidade=:cidade, estado=:uf WHERE id = :id";
               
        $sth = $this->db->prepare($sql);
        $sth->bindParam("id", $input['id']); //o bind faz a substituicao no sql
        $sth->bindParam("nome", $input['nome']);
        $sth->bindParam("email", $input['email']);
        $sth->bindParam("senha", $input['senha']);
        $sth->bindParam("nascimento", $input['nascimento']);
        $sth->bindParam("genero", $input['genero']);
        
        $sth->bindParam("cep", $input['cep']);
        $sth->bindParam("rua", $input['rua']);
        $sth->bindParam("bairro", $input['bairro']);
        $sth->bindParam("cidade", $input['cidade']);
        $sth->bindParam("uf", $input['uf']);
        
        $sth->execute();
        return $response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/gestao_clientes.php'); // redirecionar para outra pagina
});



$app->post('/clientes', function ($request, $response) {
        header("Access-Control-Allow-Origin: *");
        $input = $request->getParsedBody();
        
        $sql = "INSERT INTO cliente (nome, email, senha, nascimento, genero, cep, rua, bairro, cidade, estado) 
                VALUES (:nome,:email, :senha, :nascimento, :genero, :cep, :rua, :bairro, :cidade, :uf)";
        
        $sth = $this->db->prepare($sql);
        $sth->bindParam("nome", $input['nome']);
        
        $sth->bindParam("email", $input['email']);
        $sth->bindParam("senha", $input['senha']);
        $sth->bindParam("nascimento", $input['nascimento']);
        $sth->bindParam("genero", $input['genero']);
        
        $sth->bindParam("cep", $input['cep']);
        $sth->bindParam("rua", $input['rua']);
        $sth->bindParam("bairro", $input['bairro']);
        $sth->bindParam("cidade", $input['cidade']);
        
        $sth->bindParam("uf", $input['uf']);
        
        $sth->execute();
        
        if ($_SESSION['admin'] == true){
            return $response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/gestao_clientes.php'); // redirecionar para outra pagina
        }else{
            return $response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/home_cliente.php'); // redirecionar para outra pagina        
            $_SESSION['cliente'] = true;
        }

    });



$app->delete('/clientes/{id}', function ($request, $response, $args) {
       header("Access-Control-Allow-Origin: *");
        $input = $request->getParsedBody();
        
        $sql = "DELETE FROM cliente WHERE id = :id";
        
        $sth = $this->db->prepare($sql);
        $sth->bindParam("id", $args['id']); //o bind faz a substituicao no sql
        $sth->execute();
        return $this->response->withJson("Removido com Sucesso!"); 
});


$app->delete('/clientes', function ($request, $response, $args) {
       header("Access-Control-Allow-Origin: *");
        $input = $request->getParsedBody();
        $sql = "DELETE FROM cliente";
        
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $this->response->withJson("Removido com Sucesso!"); 
});



$app->post('/login', function ($request, $response) {
    header("Access-Control-Allow-Origin: *");
    $input = $request->getParsedBody();
    
    $sql = "SELECT id,email, senha FROM cliente WHERE email = :email AND senha = :senha";
    
    $sth = $this->db->prepare($sql);
    $sth->bindParam("email", $input['login']);
    $sth->bindParam("senha", $input['senha']);
    
    $sth->execute();
    $cliente = $sth->fetchAll();
    
    
    if('admin@admin.com' == $input['login'] && '123123' == $input['senha']){
        $_SESSION['admin'] = true;
        $response->withStatus(200);
        return $response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/admin.php');
    
    }else if(sizeof($cliente) != 0){
        $_SESSION['cliente'] = array(true, $cliente[0]['id']);
        
        return $response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/home_cliente.php');    
    }else{
        return $response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/login_error.php'); 
    }
});


$app->post('/vendas', function ($request, $response) {
       header("Access-Control-Allow-Origin: *");
        $input = $request->getParsedBody();
        $sql = "INSERT INTO venda (data, valor_total, frete, forma_pag, pago, cliente)
	    VALUES (CURRENT_DATE, :valor_total, :frete, :forma_pag, :pago, :cliente)";
	    
	    $sth = $this->db->prepare($sql);
        $sth->bindParam("valor_total", $input['valor_total']);
        $sth->bindParam("frete", $input['frete']);
        $sth->bindParam("forma_pag", $input['forma_pag']);
        $sth->bindParam("pago", $input['pago']);
        $sth->bindParam("cliente", $input['cliente']);
        
        $sth->execute();
        
        return $this->response->withJson("Venda realizada com sucesso!"); 
    });


$app->get('/vendas', function ($request, $response) {
       header("Access-Control-Allow-Origin: *");
        $input = $request->getParsedBody();
        $sql = "SELECT * FROM venda";

        $sth = $this->db->prepare($sql);
        $sth->execute();
        $vendas = $sth->fetchAll();
        
        return $this->response->withJson($vendas); 
    });



$container = $app->getContainer();
$container['upload_directory'] = __DIR__ . '/fotos';

$app->post('/produto', function ($request, $response) {
	
	header("Access-Control-Allow-Origin: *");
	$input = $request->getParsedBody();
	$directory = $this->get('upload_directory');
	
	$uploadedFiles = $request->getUploadedFiles();

    // handle single input with single file upload
    $uploadedFile = $uploadedFiles['imagem'];
    if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
        $filename = moveUploadedFile($directory, $uploadedFile);
        $response->write('uploaded ' . $filename . '<br/>');
    }
    
    
	$sql = "INSERT INTO produto (codigo, nome, preco, categoria, tipo, descricao, tecnica, qtd, imagem)
	VALUES (:codigo, :nome, :preco, :categoria, :tipo, :descricao, :tecnica, :qtd, :imagem)";
	$sth = $this->db->prepare($sql);
	$sth->bindParam("codigo", $input['codigo']);
	$sth->bindParam("nome", $input['nome']);
	$sth->bindParam("preco", $input['preco']);
	$sth->bindParam("descricao", $input['descricao']);
	$sth->bindParam("tecnica", $input['tecnica']);
	$sth->bindParam("tipo", $input['tipo']);
	$sth->bindParam("categoria", $input['categoria']);
	$sth->bindParam("qtd", $input['qtd']);
	$sth->bindParam("imagem", $filename);

	$sth->execute();
	return $this->response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/gestao_produtos.php');  
});

$app->get('/produtos/{id}', function ($request, $response, $args) {        
    header("Access-Control-Allow-Origin: *");
    
    $produto  = getProdutoEspecifico($args['id']);
    
    return $this->response->withJson($produto);    

}); 



$app->get('/produtos', function ($request, $response, $args) {        

    header("Access-Control-Allow-Origin: *");
    $sth = $this->db->prepare("SELECT pd.id, codigo, pd.nome as nome, preco, cat.nome as categoria,
    tp.nome as tipo, descricao, tec.nome as tecnica, qtd, imagem FROM produto as pd
    INNER JOIN categoria as cat ON pd.categoria = cat.id
    INNER JOIN tipo as tp ON pd.tipo = tp.id
    INNER JOIN tecnica as tec ON pd.tecnica = tec.id");     
    $sth->execute();      
    $todos = $sth->fetchAll();   
    return $this->response->withJson($todos);    

}); 


$app->delete('/produtos/{id}', function ($request, $response, $args) {
    
    header("Access-Control-Allow-Origin: *");
    $sth = $this->db->prepare("DELETE FROM produto WHERE id = :id");  
    $input = $request->getParsedBody();
    
    $sth->bindParam("id", $args['id']);
    $sth->execute();      
    return $this->response->withJson("Removido com sucesso!"); ;
    
});

$app->delete('/produtos', function ($request, $response) { 
    
    header("Access-Control-Allow-Origin: *");
    $sth = $this->db->prepare("DELETE FROM produto");     
    $sth->execute();      
    
    $sth = $this->db->prepare("SELECT * FROM produto");     
    $sth->execute();      
    $todos = $sth->fetchAll();   
    return $this->response->withJson($todos);    
    
    
});




$app->post('/admin', function ($request, $response, $args) {        
    header("Access-Control-Allow-Origin: *");
    $input = $request->getParsedBody();
    $sth = $this->db->prepare("SELECT * FROM admin where login = :login and senha = :senha"); 
    
    $sth->bindParam("login", $input['login']);
    $sth->bindParam("senha", $input['senha']);

    $sth->execute();      
    $admin = $sth->fetchAll();
    
    if(sizeof($admin) != 0){
        return $response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/admin.html');    
    }else{
        return $this->response->withJson("Usuario ou senha invalidos"); 
    }
    
}); 


$app->post('/categoria', function ($request, $response) {
	
	header("Access-Control-Allow-Origin: *");
	$input = $request->getParsedBody();
	
	$sql = "INSERT INTO categoria (nome) VALUES (:nome)";
	$sth = $this->db->prepare($sql);
	$sth->bindParam("nome", $input['nome']);

	$sth->execute();
	return $this->response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/gestao_categoria.php');  
});



$app->get('/categoria', function ($request, $response, $args) {        

    header("Access-Control-Allow-Origin: *");
    $sth = $this->db->prepare("SELECT * FROM categoria");     
    $sth->execute();      
    $todos = $sth->fetchAll();   
    return $this->response->withJson($todos);    

}); 

$app->post('/tecnica', function ($request, $response) {
	
	header("Access-Control-Allow-Origin: *");
	$input = $request->getParsedBody();
	
	$sql = "INSERT INTO tecnica (nome) VALUES (:nome)";
	$sth = $this->db->prepare($sql);
	$sth->bindParam("nome", $input['nome']);

	$sth->execute();
	return $this->response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/gestao_tecnica.php');  
});



$app->get('/tecnica', function ($request, $response, $args) {        

    header("Access-Control-Allow-Origin: *");
    $sth = $this->db->prepare("SELECT * FROM tecnica");     
    $sth->execute();      
    $todos = $sth->fetchAll();   
    return $this->response->withJson($todos);    

}); 


$app->post('/venda', function ($request, $response) {
	
	header("Access-Control-Allow-Origin: *");
	$input = $request->getParsedBody();
	
	$sql = "INSERT INTO venda (data, valor_total, forma_pag, frete pago, cliente) 
	VALUES (:data, :valor_total, :forma_pag, :frete, :pago, :cliente)";
	$sth = $this->db->prepare($sql);
	$sth->bindParam("data", date("Y-m-d"));
	$sth->bindParam("valor_total", $input['valor_total']);
	$sth->bindParam("frete",  $input['frete']);
	$sth->bindParam("forma_pag", 1);
	$sth->bindParam("pago", 0);
	$sth->bindParam("cliente", $input['cliente']);

	$sth->execute();
	return $this->response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/gestao_categoria.php');  
});



//******************* NAO ATUALIZADO DAQUI PRA BAIXO *************************//

$app->post('/alterar_produto', function ($request, $response) {
    
    header("Access-Control-Allow-Origin: *");
    
    $sth = $this->db->prepare("UPDATE produto SET nome=:nome, codigo=:codigo, 
    preco=:preco, descricao=:descricao, qtd=:qtd, tecnica=:tecnica, tipo=:tipo,
    categoria=:categoria WHERE id = :id");
    $input = $request->getParsedBody();
	$sth->bindParam("codigo", $input['codigo']);
	$sth->bindParam("nome", $input['nome']);
	$sth->bindParam("preco", $input['preco']);
	$sth->bindParam("descricao", $input['descricao']);
	$sth->bindParam("tecnica", $input['tecnica']);
	$sth->bindParam("tipo", $input['tipo']);
	$sth->bindParam("categoria", $input['categoria']);
	$sth->bindParam("qtd", $input['qtd']);
	//$sth->bindParam("imagem", $filename);
    $sth->bindParam("id", $input['id']);
    
    $sth->execute();
    
    return $response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/gestao_produtos.php');   
    return;
    
});


$app->post('/remover_categoria', function ($request, $response) {
    
    header("Access-Control-Allow-Origin: *");
    $sth = $this->db->prepare("DELETE FROM categoria WHERE id = :id");  
    $input = $request->getParsedBody();
    
    $sth->bindParam("id", $input['id']);
    $sth->execute();      
    return;
    
});

$app->post('/remover_categorias', function ($request, $response) { 
    
    header("Access-Control-Allow-Origin: *");
    $sth = $this->db->prepare("DELETE FROM categoria");     
    $sth->execute();      
    
    $sth = $this->db->prepare("SELECT * FROM categoria");     
    $sth->execute();      
    $todos = $sth->fetchAll();   
    return $this->response->withJson($todos);    
    
    
});

$app->post('/alterar_categoria', function ($request, $response) {
    
    header("Access-Control-Allow-Origin: *");
    
    $sth = $this->db->prepare("UPDATE categoria SET nome=:nome WHERE id = :id");
    $input = $request->getParsedBody();
	$sth->bindParam("nome", $input['nome']);
    $sth->bindParam("id", $input['id']);
    $sth->execute();
    
    return $response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/gestao_categoria.php');   
    
});



$app->post('/remover_tecnica', function ($request, $response) {
    
    header("Access-Control-Allow-Origin: *");
    $sth = $this->db->prepare("DELETE FROM tecnica WHERE id = :id");  
    $input = $request->getParsedBody();
    
    $sth->bindParam("id", $input['id']);
    $sth->execute();      
    return;
    
});

$app->post('/remover_tecnicas', function ($request, $response) { 
    
    header("Access-Control-Allow-Origin: *");
    $sth = $this->db->prepare("DELETE FROM tecnica");     
    $sth->execute();      
    
    $sth = $this->db->prepare("SELECT * FROM tecnica");     
    $sth->execute();      
    $todos = $sth->fetchAll();   
    return $this->response->withJson($todos);    
    
    
});

$app->post('/alterar_tecnica', function ($request, $response) {
    
    header("Access-Control-Allow-Origin: *");
    
    $sth = $this->db->prepare("UPDATE tecnica SET nome=:nome WHERE id = :id");
    $input = $request->getParsedBody();
	$sth->bindParam("nome", $input['nome']);
    $sth->bindParam("id", $input['id']);
    $sth->execute();
    
    return $response->withRedirect('https://illustrayu-annavicente.c9users.io/paginas/gestao_tecnica.php');   
    
});


function moveUploadedFile($directory, UploadedFile $uploadedFile)
{
    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    $basename = uniqid(); // see http://php.net/manual/en/function.random-bytes.php
    $filename = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

    return $filename;
}