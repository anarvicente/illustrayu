<!DOCTYPE html>

<?php
    session_start();
    include_once("conn.php");
    //include_once("login/valida_sessao.php");
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

  
</head>
<body style="background:#f5f5f5;margin:0;padding:0;" onload="carregarCarrinho()">
  
  
  <script>
    var controle;
    function carregarCarrinho(){
        controle = new visaoCarrinho();
        controle.carregarTudo();
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


<div class="container">
  
    <div class="nav-content">
      <ul class="tabs ">
        <li class="tab"><a href="carrinho.php">Meu Carrinho</a></li>
        <li class="tab"><a href="dados_entrega.php">Endereço de Entrega</a></li>
        <li class="tab"><a href="dados_pagamento.php">Forma de Pagamento</a></li>
        <li class="tab"><a class="active" href="acompanhe_pedido.php">Acompanhe o Pedido</a></li>
      </ul>
    </div>
  
  
  
<div style="background:#fff;font:13px Arial,Helvetica,sans-serif;color:#222;line-height:18px">
  <div style="background:#f5f5f5;padding:0 2% 2%">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody><tr><td align="center">
        <div style="max-width:600px">
          <table style="text-align:left;font:13px Arial,Helvetica,sans-serif;color:#222;line-height:18px;width:100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr><td style="padding-top:12px;padding-bottom:10px"></td></tr>
              <tr>
                <td>
                  <div style="background:#fff;padding:3.5%;border-top:1px solid #e1e1e1;border-left:1px solid #e1e1e1;border-right:1px solid #e1e1e1">

                    <div style="padding:20px 0px 15px 0px;text-align:center;">
                      <center> 
                      <a href="<urllocal>/track.asp?idloja=<idloja>&NumPedido=<pedido>&Email=<email>&ltk=<logintoken>" style="font-weight:bold;color:#ffffff;font-family:'PT Sans',arial;font-size:2em;text-decoration:none;" target="_blank">
                        <img src="../slim-skeleton/src/fotos/msg_status_01.png" style="border:0;display:block;">
                        
                      </a>
                      </center>
                    </div>  

                    <h2 style="margin-top:27px;margin-bottom:14px;font-size:20px;line-height:28px;font-weight:normal">Recebemos seu pedido #<b style="color:#5cb85c"><pedido></b> na loja <nomeloja></h2>
                    <p style="min-height:1px;margin-top:0;margin-bottom:14px;border-top:1px solid #e5e5e5;text-align:right;line-height:0">&nbsp;</p>
                    <p style="margin-top:.25em"></p>
                    <div style="text-align:left;font-family:'PT Sans',arial;font-size:1.1em;color:#666666;">
                      <h3>Olá, <primeironome></h3>
                      <p>Confirmamos o recebimento do pedido número <b><pedido></b> feito em <data> na loja virtual <b><nomeloja></b> no valor de <b><totalprazo></b>.</p><br>
                    </div>  

                    <h2 style="margin-top:7px;margin-bottom:14px;font-size:20px;line-height:28px;font-weight:normal;color:#2485c7;">Dados do pedido</h2>
                    <p style="min-height:1px;margin-top:0;margin-bottom:14px;border-top:1px solid #e5e5e5;text-align:right;line-height:0">&nbsp;</p>
                    <p style="margin-top:.25em"></p>
                    <div style="text-align:left;font-family:'PT Sans',arial;font-size:1.1em;color:#666666;">
                      <p><dadospedido></p>
                      <div>
                      <table  id='myTable' class= "bordered highlight centered"> </table>
                      <div>
                      <p style="min-height:1px;margin-top:0;margin-bottom:14px;border-top:1px solid #e5e5e5;text-align:right;line-height:0">&nbsp;</p>
                      <p align="right"><totaispedido></p>
                    </div>
                    <div style="text-align:left;font-family:'PT Sans',arial;font-size:1.1em;color:#666666;">
                      <p style="min-height:1px;margin-top:0;margin-bottom:10px;margin-top:10px;border-top:1px solid #e5e5e5;text-align:right;line-height:0">&nbsp;</p>
                      <p><final></p>
                      <br>
                    </div>

                  </div>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </td></tr></tbody>
    </table>
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