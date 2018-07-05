<!DOCTYPE html>

<?php
    session_start();
    include_once("conn.php");
    $pdt = getProduto();
    
    //verificar se a variavel jah existe, ou seja,
    // jah tem informacao no carrinho
  
    
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/pesquisa.js"></script>
  <title>Illustrayu</title>
</head>

<body>
	
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
                <input type="text" placeholder="pesquisar produto" id="autocomplete-input" class="autocomplete white-text" onkeyup="pesquisaPorNomeHome()"  >
              </div>
            </li> 
            <li>
              <a href="#catalogo">Catálogo</a>
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

  
  <!-- Section: Catalogo de produtos-->
      <div class="container">
        <h2> Minha Conta </h2>
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