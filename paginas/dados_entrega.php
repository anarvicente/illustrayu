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
	<script src="js/endereco.js"></script>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Illustrayu</title>

  
</head>
<body>
  
  

	
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

<div class="container">
  
    <div class="nav-content">
      <ul class="tabs ">
        <li class="tab"><a href="carrinho.php">Meu Carrinho</a></li>
        <li class="tab"><a class="active" href="dados_entrega.php">Endereço de Entrega</a></li>
        <li class="tab"><a href="dados_pagamento.php">Forma de Pagamento</a></li>
        <li class="tab"><a href="acompanhe_pedido.php">Acompanhar Pedido</a></li>
      </ul>
    </div>

  <form>
  CEP:<br>
    <input name="cep" type="text" id="cep" value="" size="10" maxlength="20" 
    autocomplete='postal-code' onblur="pesquisacep(this.value);" />
    
    Rua:<br>
    <input name="rua" type="text" id="rua" size="40" autocomplete='street-address' />
    
    Bairro:<br>
    <input name="bairro" type="text" id="bairro" size="40" />
    
    Cidade:<br>
    <input name="cidade" type="text" id="cidade" size="40" autocomplete='address-level2' />
    
    Estado:<br>
    <input name="uf" type="text" id="uf" size="2" autocomplete='address-level1' />
    
    <button class="btn waves-effect waves-light" style="width: 100%;" type="submit" onclick="alert('Salvo com sucesso')">Salvar
        <i class="material-icons right">send</i>
    </button>
  </form>



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