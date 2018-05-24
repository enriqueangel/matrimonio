	document.getElementById("demo").innerHTML = '<img  src="imagenes/mesas/tipos-de-mesas.png" width="80%" >	';


	function seleccionarMesa() {

				var listaMeseros = ["12345676543","123454324565"];
				var listaInvitados = ["jose obdulio pereira"];
			    
			    var x = document.getElementById("listaMesas").value ;
			    document.getElementById("demo").innerHTML = "You selected: " + x;
			    console.log(x)
			    document.getElementById("demo").innerHTML = '<div id="mesa"></div>';
			   
			    document.getElementById("mesa").innerHTML = '<img  src="imagenes/mesas/tipos-de-mesas'+ x.charAt(x.length-1) +'.png" width="40%" ><div id="descripcion"></div>	';
			    
			    var texto= "asdefghjkjhgfdsaswedrtgyhujikolñkjhgfdsdrftgyhjiklñ"
			    document.getElementById("descripcion").innerHTML = '<div id="descripcion" class="col s6"><h3>DESCRIPCION</h3> <p>'+texto+'</p></div>';
			    mostrarLista(listaMeseros,"listaInvitadosMesa");
			    mostrarLista(listaInvitados,"listaInvitados");
			    mostrarLista(listaMeseros,"listaMeseros");




			}
	

	function mostrarLista(lista,nombre){

				var output="";

                for (var i in lista) {
                     output += "<td>"
                        +lista[i]
                        
                        +"</td>";

                }
                document.getElementById(nombre).innerHTML = output +'<span class="icon fa-edit"><i class="small material-icons">add</i></span>';



	}

	 document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });
        
			


