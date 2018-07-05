<!DOCTYPE html>

<?php
    session_start();
    include_once("conn.php");
    
    $linha = getProdutoEspecifico2($_GET['Id']);
    
    
    //$rstc = getTecnicaEspecifico($_GET['$linha["tecnica"]']);
    //$linhatc = $rstc->fetch(PDO::FETCH_OBJ);
    
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
  
  <script src="js/persistenciaCarrinho.js"></script>  
  <script src="js/visaoCarrinho.js"></script>  
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Illustrayu</title>
  
  <style>
    ul#menu li {
        display:inline;
    }
  </style>
</head>

<body onload = "carregarCarrinho()">
  
  <script>
    var controle;
    function carregarCarrinho(){
        controle = new persistenciaCarrinho();
        
    }
  </script>  
  
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/pesquisa.js"></script>

 <!-- Navbar -->
  <div class="navbar-fixed">
    <nav class="teal">
      <div class="container">
        <div class="nav-wrapper">
          <a href="home.php" class="brand-logo">Illustrayu</a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger">
            <i class="material-icons">menu</i>
          </a>
        
          <ul class="right hide-on-med-and-down">
            <li>    
              <div class="input-field col s6 s12 white-text">
                <i class="white-text material-icons prefix">search</i>
                <input type="text" placeholder="search" id="autocomplete-input" class="autocomplete white-text" onkeyup="pesquisaPorNomeProduto()" >
              </div>
            </li> 
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
              <a href="login_cadastro.php">Entrar
              <i class="material-icons right">account_circle</i> 
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  
  <ul class="sidenav" id="mobile-nav">
    <li>
      <a href="home.php">Home</a>
    </li>
    <li>
      <a href="#search">Search</a>
    </li>
    <li>
      <a href="home.php#catalogo">Catálogo</a>
    </li>
    <li>
      <a href="#contato.php">Contato</a>
    </li>
    <li>
      <a href="carrinho.php">Carrinho</a>
    </li>
    <li>
      <a href="login.php">Entrar</a>
    </li>
  </ul>


 <!-- Section: Gallery -->
 
 <br><br>
  <section id="gallery" class="section section-gallery scrollspy">
    <div class="container">
      
      <a class="center row">
        <div class="col s4">
          
           <div class="card-image">
            <img class="responsive-img" src="../slim-skeleton/src/fotos/<?=$linha['imagem']?>">
          </div>
        </div>
        <div class="col s8">
          <div class="card">
            <div class="card-content">
              <span class="card-title" align="left"><?=$linha['nome']?></span>
              <img align="left"  src="../slim-skeleton/src/fotos/ranking.jpg"  height="20" width="100"> <br><br>
              <p align="left"><?=$linha['descricao']?></p><br>
              <span class="card-title" align="left">R$ <?=$linha['preco']?></span><br>
              
              <ul id="menu">
                <li></li><p align="left" class="col s2.5">Calcular frete: </p></li>
                <li><input class="col s3" type="text" name="preco"></li>
                <li><button class="btn waves-effect waves-light modal-trigger"   href="#modal1">OK</button></li>
                <li><button class="btn waves-effect waves-light"  name="action" onclick ='controle.addProduto(<?=json_encode($linha)?>)'>Add Carrinho</button></li>
              </ul>  
            </div>


          </div>
        </div>
        
        <br><br>
        <table class="col s12 striped">
          <thead>
            <th>Ficha Técnica</th>
          </thead>
  
          <tbody >
            <tr>
              <td>Nome</td>
              <td><?=$linha['nome']?></td>
            </tr>
            <tr>
              <td>Descrição</td>
              <td><?=$linha['descricao']?></td>
            </tr>
            <tr>
              <td>Categoria</td>
              <td><?=$linha['categoria']?></td>
            </tr>
            <tr>
              <td>Tipo</td>
              <td><?=$linha['tipo']?></td>
            </tr>
            <tr>
              <td>Técnica de pintura</td>
              <td><?=$linha['tecnica']?></td>
            </tr>
          </tbody>
      </table>
        
        </a>
       </div> 
       
        
       
      
      
    </div>

  </section>
  
    <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Consulta de frete</h4>
      
      <table>
        <thead>
          <tr>
              <th>Entrega</th>
              <th>Frete</th>
              <th>Prazo</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Calhau Transportadora</td>
            <td>Frete grátis</td>
            <td>4 a 5 dias úteis</td>
          </tr>
          <tr>
            <td>Rápida</td>
            <td>R$ 14,99</td>
            <td>4 a 5 dias úteis</td>
          </tr>
          <tr>
            <td>Econômica</td>
            <td>R$ 4,99</td>
            <td>5 a 7 dias úteis</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">OK</a>
    </div>
  </div>
  
    <!-- Footer -->
  <footer class="section teal darken-2 white-text center">
    <div class="row">
          <h4>Acompanhe a Illustrayu</h4>
          <p>Siga a gente nas redes sociais</p>
          <a href="#" class="white-text">
            <i class="fab fa-facebook fa-3x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-twitter fa-3x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-linkedin fa-3x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-google-plus fa-3x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-pinterest fa-3x"></i>
          </a>
    <p class="flow-text">Illustrayu &copy; 2018 </p>
  </footer>
  
  
  <!--JavaScript at end of body for optimized loading-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  
  <script>
    // Sidenav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav, {});
    
     $(document).ready(function(){
    $('.modal').modal();
  });

  </script>
</body>
</html>