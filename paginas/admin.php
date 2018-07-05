<!DOCTYPE html>
<html>
<head>
  <?php 
  include_once("login/valida_sessao.php");
  include_once("conn.php");
    
  $totalClientes = getTotalClientes();
  
  $vendas = getVendas();
  $totalVendas = $vendas->rowCount();
  
  $totalLucro = getLucro();
  
  $totalnPago = getNumPago(0);
  $totalPago = getNumPago(1);
  
  $clientesNcompras = getClientesCompras();
  ?>
    
  <meta charset="UTF-8">

   <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
   <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="css/main.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

  
</head>
<body>
   <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Administração</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="gestao_clientes.php">Gestão de Clientes</a></li>
        <li><a href="gestao_produtos.php">Gestão de Produtos</a></li>
        <li><a href="gestao_vendas.php">Gestão de Vendas</a></li>
        <li><a href="gestao_tecnica.php">Gestão de Tecnicas</a></li>
        <li><a href="gestao_categoria.php">Gestão de Categorias</a></li>
        <li><a href="login/logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>
        
  
  <h5>Bem vindo à Administração</h5>
  
  <div id="card-stats">
    <div class="row">
      <div class="col s12 m6 l3">
        <div class="card #00acc1 cyan darken-1">
          <div class="card-content white-text">
              <i class="col s7 m7 material-icons background-round mt-5">add_shopping_cart</i>
              <p class="col s7 m7">Total Vendas</p>
              <h5  align="right"class="mb-0"> <?=$totalVendas?></h5>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card #e53935 red darken-1">
          <div class="card-content white-text">
              <i class="col s7 m7 material-icons background-round mt-5">perm_identity</i>
              <p class="col s7 m7">Total Clientes</p>
              <h5  align="right"class="mb-0">  <?=$totalClientes?></h5>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card #43a047 green darken-1">
          <div class="card-content white-text">
              <i class="col s7 m7 material-icons background-round mt-5">timeline</i>
              <p class="col s7 m7">Crescimento</p>
              <h5  align="right"class="mb-0">80% a.m.</h5>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card #f4511e deep-orange darken-1">
          <div class="card-content white-text">
              <i class="col s7 m7 material-icons background-round mt-5">attach_money</i>
              <p class="col s7 m7">Lucro do Mês</p>
              <h5  align="right"class="mb-0">R$ <?=number_format($totalLucro, 2)?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div id="card-stats-2">
    <div class="row">
      <div class="col s6">
        <div class="card white">
          <div class="card-content">
              <canvas id="myChart" width="400" height="400"></canvas>
              <br><br>
              <div class="row">
                <div class="input-field col s5">
                  <input id='data_ini' type="text" class="datepicker">
                  <label for="data_ini">Data inicial</label>
                </div>
                <div class="input-field col s5">
                  <input id='data_fim' type="text" class="datepicker">
                  <label for="data_fim">Data final</label>
                </div>
                <a class="waves-effect waves-light btn-large col s2">OK</a>
              </div>
          </div>
        </div>
      </div>
      <div class="col s6">
        <div class="card white">
          <div class="card-content">
              <canvas id="chartDonut" width="400" height="400"></canvas>
              <br><br>
              <div class="row">
                <div class="input-field col s5">
                  <input id='data_ini' type="text" class="datepicker">
                  <label for="data_ini_donut">Data inicial</label>
                </div>
                <div class="input-field col s5">
                  <input id='data_fim' type="text" class="datepicker">
                  <label for="data_fim_donut">Data final</label>
                </div>
                <a  onclick="myFunction()" class="waves-effect waves-light btn-large col s2">OK</a>
              </div>
              
        </div>
      </div>
      
    </div>
  </div>
  
  
  <script>
    var ctx = document.getElementById("chartDonut");
    var myDoughnutChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Pagos", "Pendentes"],
        datasets: [{
          data: [<?=$totalPago?>, <?=$totalnPago?>],
          backgroundColor: [
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 99, 132, 0.2)'
          ]
        }]
      }
    });
  </script>
  
  <script>


    

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            //labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            labels: ['joaquim', 'ana'],
            
            datasets: [{
                label: ['Quantidade de compras'],
                //data: [12, 19, 3, 5, 2, 3],
                data: [5,4],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
  <script type="text/javascript" src="https://pixinvent.com/materialize-material-design-admin-template/vendors/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="https://pixinvent.com/materialize-material-design-admin-template/js/materialize.min.js"></script>

</<body>
</html>