
function buscadorContactos()
    {

        var componentContainer = $("#pacientes-component-container");
        var val = document.getElementById("contactosInput").value;
        $("#contactosOptions").empty();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            //get clientes paginados
            url: '/buscar/clientes',
            type:'POST',
            dataType: "JSON",
            data: {
                val : val,
            },
            async:false,
            success: function (data) {

                var content = '';
                $.each(data, function(i, post) {
                    content += '<option value="'+post.persona_contacto+'">'+post.persona_contacto+'</option>';
                });
                $(content).appendTo("#contactosOptions");

            },
            error: function(x,xs,xt) {
                componentContainer.html("Error al cargar los clientes");
            },
        });

    }

    function renderPacientes()
{
    // var paciente_id = $("select#pacientes").find("option:selected").val();
    // $("input#paciente_id").val(paciente_id);
    // user_id = paciente_id;


    var val = document.getElementById("pacientesInput").value;
    var opts = document.getElementById('pacientesOptions').childNodes;
    for (var i = 0; i < opts.length; i++) {
        if (opts[i].value === val) {
        // alert(opts[i].dataset.value);
        $("input#paciente_id").val(opts[i].dataset.value);
        user_id = paciente_id;
        break;
        }
    }
}


function testProductos()
{
    alert("yes");
}

function setValueProduct(){

    var val = document.getElementById("productosInput").value;
    var opts = document.getElementById('productosOptions').childNodes;
    for (var i = 0; i < opts.length; i++) {
        console.log(opts[i].value);
        if (opts[i].value === val) {
        $("input#idValue").val(opts[i].dataset.value);
        $("input#typeOption").val(opts[i].className);
        break;
        }
    }
    if($("input#idValue").val){

    }
    // var ruta = $("input#typeOption").val(opts[i].dataset.value);
    var ruta = document.getElementById("typeOption").value;
    var id = document.getElementById("idValue").value;
    // alert(ruta);
    // alert(id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
       // {{ route('productos.info',['id'=> $producto->id]) }}
        url: "formulario/data/"+ruta,
        method: "POST",
        data: {
            "id": id
        }
    }).done(function(request) {
        console.log(request);

        $("#precioPresupuesto").val(request['precio']);
        $("#observacionesPresupuesto").val(request['descripcion']);
        //refreshTemarios(id);
        //temarios.unblockUI();

    });


}


function buscadorProductos()
{
    var val = document.getElementById("productosInput").value;
    var componentContainer = $("#pacientes-component-container");
    $("#productosOptions").empty();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        //get clientes paginados
        url: '/buscar/productos',
        type:'POST',
        dataType: "JSON",
        data: {
            val : val,
        },
        async:true,
        success: function (data) {
            console.log(data);
            
            var content = '';
            
            $.each(data.productos, function(i, post) {
                content += '<option name="productos" class="producto" data-value="'+post.id+'">'+post.nombre+'</option>';
            });

            $.each(data.servicios, function(i, post) {
                content += '<option name="servicios" class="servicio" data-value="'+post.id+'">'+post.titulo_servicio+'</option>';
            });

            $("#productosOptions").html(content);

        },
        error: function(x,xs,xt) {
            componentContainer.html("Error al cargar los clientes");
        },
    });

}
