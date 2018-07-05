<?php



    function getConnection() {
        // removi informacao do bd
        $con = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    }

    function getClientes(){
        $con = getConnection();
        $rs = $con->prepare("SELECT id, nome, email, nascimento, genero, senha,
                             cep, rua, bairro, cidade, estado FROM cliente");
        $rs->execute();
        return $rs;
    }


    function getTotalClientes(){
        $rs = getClientes();
        $total = $rs->rowCount();
        return $total;
    }

    function getClienteEspecifico($id){

        $con = getConnection();
        $rs = $con->prepare("SELECT * FROM cliente WHERE id= ?");
        $rs->bindParam(1, $id);
        $rs->execute();
        $cliente = $rs->fetchAll();
        return $cliente;
    }


    function getAdmin($admin){
        $con = getConnection();
        $rs = $con->prepare("SELECT login, senha FROM admin WHERE login= ?");
        $rs->bindParam(1, $admin);
        $rs->execute();
        return $rs;
    }


    function removeProdCarrinho($carrinho, $id){
        $novo_carrinho = array();

        for($i=0; $i < sizeof($carrinho); $i++){
            if($i != $id){
                $novo_carrinho[$i] = $carrinho[$i];
            }
        }

        return $novo_carrinho;
    }



    function getProdutoEspecifico($id){

        $con = getConnection();
        $rs = $con->prepare("SELECT * FROM produto as prod WHERE prod.id= :id");

        $rs->bindParam('id', $id);
        $rs->execute();
        $produto = $rs->fetchAll();

        return $produto[0];
    }

    function getProdutoEspecifico2($id){

        $con = getConnection();
        $rs = $con->prepare("SELECT pd.id, codigo, pd.nome as nome, preco, cat.nome as categoria,
            tp.nome as tipo, descricao, tec.nome as tecnica, qtd, imagem
            FROM produto as pd
            INNER JOIN categoria as cat ON pd.categoria = cat.id
            INNER JOIN tipo as tp ON pd.tipo = tp.id
            INNER JOIN tecnica as tec ON pd.tecnica = tec.id
            WHERE pd.id= :id");
        $rs->bindParam('id', $id);
        $rs->execute();
        $produto = $rs->fetchAll();

        return $produto[0];
    }


    function getProduto(){
        $con = getConnection();
        $rs = $con->prepare("SELECT * FROM produto");
        $rs->execute();
        return $rs;
    }

    function getTecnicaEspecifico($id){
        $con = getConnection();
        $rs = $con->prepare("SELECT * FROM tecnica WHERE id= ?");
        $rs->bindParam(1, $id);
        $rs->execute();
        return $rs;
    }

    function getTecnica(){
        $con = getConnection();
        $rs = $con->prepare("SELECT * FROM tecnica");
        $rs->execute();
        return $rs;
    }

    function getCategoriaEspecifico($id){
        $con = getConnection();
        $rs = $con->prepare("SELECT * FROM categoria WHERE id= ?");
        $rs->bindParam(1, $id);
        $rs->execute();
        return $rs;
    }

    function getCategoria(){
        $con = getConnection();
        $rs = $con->prepare("SELECT * FROM categoria");
        $rs->execute();
        return $rs;
    }

     function getVendas(){
        $con = getConnection();
        $rs = $con->prepare("SELECT * FROM venda");
        $rs->execute();
        return $rs;
    }

    function getLucro(){
        $con = getConnection();
        $rs = $con->prepare("SELECT SUM(valor_total) as total FROM venda");
        $rs->execute();
        $row = $rs->fetchAll();

        $sum = $row[0]['total'];

        return $sum;
    }

    function getNumPago($pago){
        $con = getConnection();
        $rs = $con->prepare("SELECT count(pago) as sum FROM venda WHERE pago = ?
        AND (data BETWEEN '2010-01-30' AND '2018-09-29')");
        $rs->bindParam(1, $pago);
        $rs->execute();
        $row = $rs->fetchAll();

        $sum = $row[0]['sum'];
        return $sum;
    }

    function getVendaEspecifica($id){

        $con = getConnection();
        $rs = $con->prepare("SELECT * FROM venda WHERE id= :id");
        $rs->bindParam('id', $id);
        $rs->execute();
        $venda = $rs->fetchAll();
        return $venda;
    }

    function getClientesCompras(){
        $con = getConnection();
        $rs = $con->prepare("SELECT nome, count(cliente) as qtd
        FROM venda
        INNER JOIN cliente ON cliente.id = venda.cliente
        GROUP BY cliente");
        $rs->execute();
        //var_dump($rs->fetchAll());
        $venda = $rs->fetchAll();
        return $venda;
    }


?>
