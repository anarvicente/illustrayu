function pesquisaPorNome() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function pesquisaPorNomeProduto() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
   console.log(tr);
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
     console.log(td);
    if (td) {
      console.log(td.innerHTML.toUpperCase().indexOf(filter) );
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function pesquisaPorNomeHome() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("autocomplete-input");
  console.log("input: " + input.value);
  filter = input.value.toUpperCase();
  table = document.getElementById("catalogo");


  tr = table.getElementsByClassName("col s12 m6 l3");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].textContent.toUpperCase();
   
    if (td) {
      
      if (td.indexOf(filter) > -1) {
        tr[i].style.display = "";
        
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

