$('#mostrarTodos').click(CargarTodo);

/*
  Creación de una función personalizada para jQuery que detecta cuando se detiene el scroll en la página
*/

$.fn.scrollEnd = function(callback, timeout) {
  $(this).scroll(function(){
    var $this = $(this);
    if ($this.data('scrollTimeout')) {
      clearTimeout($this.data('scrollTimeout'));
    }
    $this.data('scrollTimeout', setTimeout(callback,timeout));
  });
};
/*
  Función que inicializa el elemento Slider
*/

function inicializarSlider(){
  $("#rangoPrecio").ionRangeSlider({
    type: "double",
    grid: false,
    min: 0,
    max: 100000,
    from: 200,
    to: 80000,
    prefix: "$"
  });
}

function playVideoOnScroll(){
  var ultimoScroll = 0,
      intervalRewind;
  var video = document.getElementById('vidFondo');
  $(window)
    .scroll((event)=>{
      var scrollActual = $(window).scrollTop();
      if (scrollActual > ultimoScroll){
       video.play();
     } else {
        //this.rewind(1.0, video, intervalRewind);
        video.play();
     }
     ultimoScroll = scrollActual;
    })
    .scrollEnd(()=>{
      video.pause();
    }, 10)
}


function CargarTodo(){
                     $('#Resultados').load('php/listar.php');
 }

function Resultados(response){
    $('#Resultados').html("");
    $('#Resultados').html("<div class='table-responsive'><table class='table table-striped table-bordered table-hover' style='text-align:center;'>");
    $.each(response, function(i, data) {
        $('#Resultados').append(
                "<tr><td rowcolspan=2><img src='img/home.jpg'  width='100' height='72' /></td>"
              +      "<td>"+data.Id+"</td>"
              +      "<td>Dirccion: "+data.Direccion+"</td>"
              +      "<td>Ciudad: "+data.Ciudad+"</td>"
              +      "<td>Fono: "+data.Telefono+"</td>"              
              +      "<td>Cod Postal: "+data.Codigo_Postal+"</td>"              
              +      "<td>Tipo: "+data.Tipo+"</td>"              
              +      "<td> "+data.Precio+"</td>"              
              + "</tr>"

          );
      });
$('#Resultados').append("</tbody></table></div>");
} 

function CargaInicial(){
    //Callback para cargar en los selectores ciudad y tipo todos las ciudades disponibles en el archivo
    $(document).ready(function() {
        $.ajax({
            url: "./php/unicos.php",
            type: 'POST',
            dataType: 'json', //se especifica que el tipo de datos es json
            data: {CargarCiudad: 1,Tipo: 1},
            success: function(data) {
                Object.keys(data.Ciudades).forEach(function(key){     
                    $('#selectCiudad').append("<option value='"+data.Ciudades[key]+"'>"+data.Ciudades[key]+"</option>");                
                });
                Object.keys(data.Tipo).forEach(function(key){     
                    $('#selectTipo').append("<option value='"+data.Tipo[key]+"'>"+data.Tipo[key]+"</option>");                
                });
                $(document).ready(function(){$('#selectCiudad').material_select();});
                $(document).ready(function(){$('#selectTipo').material_select();});
            }
        });
    });
}


$('#submitButton').click(buscar);

function buscar(event){
    
  event.preventDefault();
  var form_data = Parametros();
  $.ajax({
    url: "./php/listar2.php",
    dataType: 'JSON',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    type: 'POST',
    success: function(data){
      if (data != "") { 
          Resultados(data)
      }else {
        alert("Nada en la Busqueda");
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {

        alert(xhr.status);
        alert(thrownError);
      }
  })
}


function Parametros(){
  var form_data = new FormData();
  form_data.append('selectCiudad', $("[id='selectCiudad']").val());
  form_data.append('selectTipo', $("[id='selectTipo']").val());
  form_data.append('rangoPrecio', $("[id='rangoPrecio']").val());
  
  return form_data;
}

inicializarSlider();
CargaInicial();
$(document).ready(function(){$('#selectCiudad').material_select();});
$(document).ready(function(){$('#selectTipo').material_select();});
