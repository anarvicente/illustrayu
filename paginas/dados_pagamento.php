<!DOCTYPE html>

<?php
    session_start();
    include_once("conn.php");
    //include_once("login/valida_sessao_cliente.php");
    //$pdt = getProduto();
    //$rs = getProdutoEspecifico($carrinho[0]);
    
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset='UTF-8'>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="css/main.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/pesquisa.js"></script>  
	<script src="js/persistenciaVenda.js"></script>  
	<script src="js/persistenciaCarrinho.js"></script>  

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Illustrayu</title>

  
</head>
<body onload="mostraDados()">
  
  

<!-- Navbar -->
  <div class="navbar-fixed">
    <nav class="teal">
      
        <div class="nav-wrapper">
          <a href="home.php" class="brand-logo">Illustrayu</a>
          
          <a href="#" data-target="mobile-nav" class="sidenav-trigger">
            <i class="material-icons">menu</i>
          </a>
          
          <ul class="right hide-on-med-and-down">
            
            <li>
              <a href="home.php#catalogo">Catálogo</a>
            </li>
            <li>
              <a href="contato.php">Contato</a>
            </li>
            <li>
              <a href="carrinho.php">Carrinho
              <i class="material-icons right">shopping_cart</i> 
              </a>
            </li>
            <li>
              <a href="login.php">Entrar
              <i class="material-icons right">account_circle</i> 
              </a>
            </li>
      
          </ul>
        </div>
    </nav>
  </div>
  
  
  <ul class="sidenav" id="mobile-nav">
    
    <li>
      <a href="#catalogo">Catálogo</a>
    </li>
    <li>
      <a href="#gallery">Gallery</a>
    </li>
    <li>
      <a href="#contact">Contact</a>
    </li>
    <li>
      <a href="#contact">Carrinho</a>
    </li>
    
    <li>
      <a href= "login.php" >  Minha Conta
      <i class="material-icons right">account_circle</i> 
      </a>
    </li>
  </ul>
  
  
  <ul class="sidenav" id="mobile-nav">
    <li>
      <a href="#home">Home</a>
    </li>
    <li>
      <a href="#search">Search</a>
    </li>
    <li>
      <a href="#catalogo">Catálogo</a>
    </li>
    <li>
      <a href="#gallery">Gallery</a>
    </li>
    <li>
      <a href="#contact">Contact</a>
    </li>
    <li>
      <a href="#contact">Carrinho</a>
    </li>
    
    <li>
      <a href= "login.php" >  Minha Conta
      <i class="material-icons right">account_circle</i> 
      </a>
    </li>
  </ul>

<script>
  function mostraDados(){
    if (document.getElementById('bol').checked){
      document.getElementById('boleto').style.display = "";
      document.getElementById('cartao').style.display = "none";

    }else{
      document.getElementById('cartao').style.display = "";
      document.getElementById('boleto').style.display = "none";
    }
    
    
  }
  
  function acompanharPedido(){
    window.location.href = window.location.origin + '/paginas/acompanhe_pedido.php';
  }
  
</script>

<div class="container">
  
    <div class="nav-content">
      <ul class="tabs ">
        <li class="tab"><a href="carrinho.php">Meu Carrinho</a></li>
        <li class="tab"><a href="dados_entrega.php">Endereço de Entrega</a></li>
        <li class="tab"><a class="active" href="dados_pagamento.php">Forma de Pagamento</a></li>
        <li class="tab"><a href="acompanhe_pedido.php">Acompanhar Pedido</a></li>
      </ul>
    </div>

  <h4>Forma de Pagamento</h4>
  

    <label>
        <input type="radio" onchange="mostraDados()" name="tipo_pagamento" value=0 id='bol' checked>
        <span>Boleto</span>
    </label>      
    
    
    <label>
        <input type="radio" onchange="mostraDados()" name="tipo_pagamento" value=1 id='car'>
        <span>Cartão de Crédito</span>
    </label>

    
    
    <div class="row" id='cartao' >
      <form class="col s12">
        <div class="row">
          
          <div class="input-field col s6">
            <input id="numero_cartao" type="text" class="validate">
            <label for="numero_cartao">Número do Cartão</label>
          </div>
        
          <div class="input-field col s6">
            <input id="nome_cartao" type="text" class="validate">
            <label for="nome_cartao">Nome impresso no Cartão</label>
          </div>
          
          <div class="input-field col s6">
            <input id="mes" type="text" class="validate">
            <label for="mes">Mes</label>
          </div>
        
          <div class="input-field col s6">
            <input id="ano" type="text" class="validate">
            <label for="ano">Ano</label>
          </div>
  
          <div class="input-field col s4">
            <input id="cvv" type="text" class="validate">
            <label for="cvv">CVV</label>
          </div>
      </form>
    </div>
  </div>
  <br><br><br>
  <div class='boleto' id='boleto'>
     <button class="btn waves-effect waves-light" onclick="window.open('boleto.php', '_blank')">Gerar Boleto
      <i class="material-icons right">file_download</i>
    </button>
  </div> 
  <br>
    <button class="btn waves-effect waves-light" style="width: 100%;" onclick="getCarrinho()">Finalizar Pedido
        <i class="material-icons right">send</i>
    </button>
 </div>
 

  
  
  <!--JavaScript at end of body for optimized loading-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  
  <script>
    // Sidenav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav, {});

    // Slider
    const slider = document.querySelector('.slider');
    M.Slider.init(slider, {
      indicators: false,
      height: 500,
      transition: 500,
      interval: 6000
    });
    
  
             
  </script>
  
</body>
</html>