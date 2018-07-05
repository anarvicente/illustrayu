<!DOCTYPE html>

<?php
    include_once("conn.php");
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
<!-- Section: Contact -->
  <section id="contact" class="section section-contact scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12 m6">
          <div class="card-panel teal white-text center">
            <i class="material-icons medium">email</i>
            <h5>Contact Us For Booking</h5>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus sed praesentium delectus. Sit, mollitia
              quo. Veniam repellat voluptas ipsum doloremque?</p>
          </div>
          <ul class="collection with-header">
            <li class="collection-header">
              <h4>Location</h4>
            </li>
            <li class="collection-item">Travelville Agency</li>
            <li class="collection-item">555 Beach rd, Suite 33</li>
            <li class="collection-item">Miami FL, 55555</li>
          </ul>
        </div>
        <div class="col s12 m6">
          <div class="card-panel grey lighten-3">
            <h5>Please fill out this form</h5>
            <div class="input-field">
              <input type="text" placeholder="Name" id="name">
              <label for="name">Name</label>
            </div>
            <div class="input-field">
              <input type="email" placeholder="Email" id="email">
              <label for="email">Email</label>
            </div>
            <div class="input-field">
              <input type="text" placeholder="Phone" id="phone">
              <label for="phone">Phone</label>
            </div>
            <div class="input-field">
              <textarea class="materialize-textarea" placeholder="Enter Message" id="message"></textarea>
              <label for="message">Message</label>
            </div>
            <input type="submit" value="Submit" class="btn">
          </div>
        </div>
      </div>
    </div>
  </section>
  

  
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

  </script>
</body>
</html>