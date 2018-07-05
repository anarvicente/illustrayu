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
	<script src="js/visaoCarrinho.js"></script>  
	<script src="js/persistenciaCarrinho.js"></script>  
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Illustrayu</title>
  
    <style type="text/css">
    	
		 	th {
				text-align: center;
				background-color: #f2f2f2;
			}
			

      .container{
          position: relative;
          width: 100%;
      }
      
      
      .container table{
        width: 80%;
      }
      
      .container button{
        width: 100%;
      }
      
      #card{
        position: fixed;
        bottom: 0;
        right: 10px;
        width: 250px;
        height: 300px;
      }

      #finalizar {
        position: relative;
        width: 100%;
      }
      
      #load {
        position: fixed;
        left: 500px;
        width: 70px;
        height: 70px;
      }
		  
    </style>

  
</head>



<body onload = "carregarCarrinho(<?php $_SESSION['cliente'][1] ?>)">
  
  
  <script>
    var controle;
    function carregarCarrinho(id){
        controle = new visaoCarrinho();
        controle.carregarTudo(id);
      
        jQuery(document).ready(function(id) {
          jQuery('#load').fadeOut(5);
        });

    }
  </script>
	
	
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


<div class="container" id="conteudo">
  
    <div class="nav-content" id="conteudo">
      <ul class="tabs ">
        <li class="tab"><a class="active" href="carrinho.php">Meu Carrinho</a></li>
        <li class="tab"><a href="dados_entrega.php">Endereço de Entrega</a></li>
        <li class="tab"><a href="dados_pagamento.php">Forma de Pagamento</a></li>
        <li class="tab"><a href="acompanhe_pedido.php">Acompanhar Pedido</a></li>
      </ul>
    </div>
  
  
  <h5> Meu Carrinho</h5>
  
  <div class="preloader-wrapper big active" id='load'>
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>

  <table  id='myTable' class= "bordered highlight centered"> </table>
  
</div>  
  
  <div class="row" id='card' > 
    <div class="col s12 m6" id='card'>
      <div class="card blue-grey darken-1" id="card">
        <div class="card-content white-text" >
          <span class="card-title">Resumo do Pedido</span>
          <table>
            <tr>
              <td>Subtotal</td>
              <td id="subtotal">R$ 0</td>  
            </tr>
            <tr>
              <td>Frete</td>
              <td id="frete">R$ 14</td>  
            </tr>
           <tr>
              <td>Total</td>
              <td id="total"> R$ 0</td>  
           </tr>
          </table>
        </div>
        <div class="card-action" >
            <a style='text-align: center' href='dados_entrega.php'>Finalizar Compra</a>
        </div>
      </div>
   </div>   
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