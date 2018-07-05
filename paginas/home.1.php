<!DOCTYPE html>

<?php
    include_once("conn.php");
    //include_once("login/valida_sessao_cliente.php");
    $pdt = getProduto();
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
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Illustrayu</title>
</head>

<body>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/pesquisa.js"></script>



 <!-- Navbar -->
  <div class="navbar-fixed">
    <nav class="teal">
      <div class="container">
        <div class="nav-wrapper">
          <a href="#" class="brand-logo">Illustrayu</a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger">
            <i class="material-icons">menu</i>
          </a>
        
          <ul class="right hide-on-med-and-down">
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
              <a href="login_cadastro.php">Entrar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  
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
      <a href="login.php">Entrar</a>
    </li>
  </ul>

  <!-- Section: procurar -->
<div class="row">
  <div class="col s12">
    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">search</i>
        <input type="search" id="myInput" onkeyup="pesquisaPorNomeProduto()" 
           placeholder="O que você deseja buscar?" >
      </div>
    </div>
  </div>
</div>

  <!-- Section: Slider -->
  <section class="slider">
    <ul class="slides">
      <li>
        <img src="../slim-skeleton/src/fotos/banner_02.jpg">
      </li>
      <li>
        <img src="../slim-skeleton/src/fotos/comousar.jpg">
      </li>
      <li>
        <img src="../slim-skeleton/src/fotos/sakura.jpg">
      </li>
    </ul>
  </section>

 <div class="row">

      <div class="col s12 m3 l3"> 

        <div>
         <label>Filtros</label><br>
        </div>
        
        <div class="col s12">
          <ul class="collection with-header">
            <li class="collection-header">
              <h5>Tipo do produto</h5>
            </li>
            <li class="collection-item" >
              <label>
                <input class="with-gap" name="tipo" type="radio" value="digital" />
                <span> Digital </span>
              </label>
            </li>
            <li class="collection-item" >
              <label>
                <input class="with-gap" name="tipo" type="radio" value="fisico"/>
                <span> Físico </span>
              </label>
            </li>
          </ul>
        </div>
        
  
        
        <div class="col s12">
          <ul class="collection with-header">
            <li class="collection-header">
              <h5>Técnica de Pintura</h5>
            </li>
            <li class="collection-item" >
              <label>
                <input type="checkbox" />
                <span>Aquarelar</span>
              </label>
            </li>
            <li class="collection-item" >
              <label>
                <input type="checkbox" />
                <span>Marcador</span>
              </label>
            </li>
            <li class="collection-item" >
              <label>
                <input type="checkbox" />
                <span>Line Art</span>
              </label>
            </li>
          </ul>
        </div>

        
    </div>

  <!-- Section: Catalogo de produtos-->
      <div class="col s12 m9 l9"> 
      
      <section id="catalogo" class="section section-popular scrollspy">
      <div class="container">
        <div class="row">
          <h4 class="center"><span class="teal-text">Catalogo</span> de Produtos</h4>

          <?php
    		  $total = $pdt->rowCount();
    	    if($total > 0){
    	        while($pdt_row = $pdt->fetch(PDO::FETCH_OBJ)){?>
    	        
              <div class="col s12 m6 l3">
                <div class="card">
                  <div class="card-image">
                    <img src="../slim-skeleton/src/fotos/<?=$pdt_row->imagem?>" width="150" height="150" alt="">
                    
                  </div>
                  <div class="card-content">
                    <label><?=$pdt_row->nome?></label><br>
                    <label>R$ <?=$pdt_row->preco?></label>
                    
                  </div>
                </div>
              </div> 
          
          <?php
	  	        }
	  	      
	  	    }
    	  	?>  

       </div>
    </div>
  </section>
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