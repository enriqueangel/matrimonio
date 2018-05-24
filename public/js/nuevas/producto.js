$(document).on('ready', funcMain);


function funcMain()
{
	$("#add_row").on('click',newRowTable);

	$("loans_table").on('click','.fa-eraser',deleteProduct);
	$("loans_table").on('click','.fa-edit',editProduct);

	$("body").on('click',".fa-eraser",deleteProduct);
	$("body").on('click',".fa-edit",editProduct);

	
}


function funcEliminarProductosso(){
	//Obteniendo la fila que se esta eliminando
	var a=this.parentNode.parentNode;
	//Obteniendo el array de todos loe elementos columna en esa fila
	//var b=a.getElementsByTagName("td");
	var cantidad=a.getElementsByTagName("td")
	console.log(a);

	$(this).parent().parent().fadeOut("slow",function(){$(this).remove();});
}


function deleteProduct(){
	//Guardando la referencia del objeto presionado
	var _this = this;
	//Obtener las filas los datos de la fila que se va a elimnar
	var array_fila=getRowSelected(_this);


	$(this).parent().parent().fadeOut("slow",function(){$(this).remove();});
}


function editProduct(){
	var _this = this;;
	var array_fila=getRowSelected(_this);
	console.log(array_fila[0]+" - "+array_fila[1]+" - "+array_fila[2]);
	
}



function getRowSelected(objectPressed){
	//Obteniendo la linea que se esta eliminando
	var a=objectPressed.parentNode.parentNode;
	//b=(fila).(obtener elementos de clase columna y traer la posicion 0).(obtener los elementos de tipo parrafo y traer la posicion0).(contenido en el nodo)
	var nombre=a.getElementsByTagName("td")[0].getElementsByTagName("p")[0].innerHTML;
	var DNI=a.getElementsByTagName("td")[1].getElementsByTagName("p")[0].innerHTML;
	
	

	var array_fila = [nombre,DNI];

	return array_fila;
	//console.log(numero+' '+codigo+' '+descripcion);
}





function newRowTable()
{
	var nombre=document.getElementById("nombre").value;
	var descripcion=document.getElementById("descripcion").value;
	var precio=document.getElementById("precio").value;
	var pic=document.getElementById("pic");
	
	
	

	var name_table=document.getElementById("tabla_factura");

    let newRow = name_table.insertRow(0+1);
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);
    
    
    cell1.innerHTML = '<p name="nombre_producto[]" class="non-margin">'+'<a href="#" id="data">' +nombre+'</a>'+'</p>';
    cell2.innerHTML = '<p name="descripcion_producto[]" class="non-margin">'+'<a href="#" id="data">'+descripcion+'</a>'+'</p>';
    cell3.innerHTML = '<p name="descripcion_producto[]" class="non-margin">'+'<a href="#" id="data">'+precio+'</a>'+'</p>';
   
   	//cell4.innerHTML = '<img src="'+pic.src+'">';
    cell4.innerHTML = '<img src="imagenes/example.jpeg">';
    cell5.innerHTML = '<span class="icon fa-edit"><i class="small material-icons">edit</i></span><span class="icon fa-eraser"><i class="small material-icons">   close</i></span>';
    
   
    
}





function format(input)
{
	var num = input.value.replace(/\,/g,'');
	if(!isNaN(num)){
		input.value = num;
	}
	else{ alert('Solo se permiten numeros');
		input.value = input.value.replace(/[^\d\.]*/g,'');
	}
}