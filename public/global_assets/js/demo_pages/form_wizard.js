
//const { defaultsDeep } = require("lodash");


// Setup module
// ------------------------------

var FormWizard = function() {


    //
    // Setup module components
    //

    // Wizard
    var _componentWizard = function() {
        if (!$().steps) {
            console.warn('Warning - steps.min.js is not loaded.');
            return;
        }

        // Basic wizard setup
        $('.steps-basic').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            transitionEffect: 'fade',
            titleTemplate: '<span class="number">#index#</span> #title#',
            labels: {
                previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                next: 'Next <i class="icon-arrow-right14 ml-2" />',
                finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
            },
            onFinished: function (event, currentIndex) {
                alert('Form submitted.');
            }
        });

        // Async content loading
        $('.steps-async').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            transitionEffect: 'fade',
            titleTemplate: '<span class="number">#index#</span> #title#',
            loadingTemplate: '<div class="card-body text-center"><i class="icon-spinner2 spinner mr-2"></i>  #text#</div>',
            labels: {
                previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                next: 'Next <i class="icon-arrow-right14 ml-2" />',
                finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
            },
            onContentLoaded: function (event, currentIndex) {
                $(this).find('.card-body').addClass('hide');

                // Re-initialize components
                _componentSelect2();
                _componentUniform();
            },
            onFinished: function (event, currentIndex) {
                alert('Form submitted.');
            }
        });

        // Saving wizard state
        $('.steps-state-saving').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            titleTemplate: '<span class="number">#index#</span> #title#',
            labels: {
                previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                next: 'Next <i class="icon-arrow-right14 ml-2" />',
                finish: 'Submit <i class="icon-arrow-right14 ml-2" />'
            },
            transitionEffect: 'fade',
            saveState: true,
            autoFocus: true,
            onFinished: function (event, currentIndex) {
                alert('es este.');
            }
        });

        //nuestra clase formulario inversions
        $('.steps-state-saving-inversions').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            titleTemplate: '<span class="number">#index#</span> #title#',
            labels: {
                previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                next: 'Next <i class="icon-arrow-right14 ml-2" />',
                finish: 'Submit <i class="icon-arrow-right14 ml-2" />'
            },
            transitionEffect: 'fade',
            saveState: true,
            autoFocus: true,
            onFinished: function (event, currentIndex) {
                $("#formInversions")[0].submit();
                //alert("contacto añadido correctamente");
            }
        });

        //nuestra clase formulario contactos
        $('.steps-state-saving-contacto').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            titleTemplate: '<span class="number">#index#</span> #title#',
            labels: {
                previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                next: 'Next <i class="icon-arrow-right14 ml-2" />',
                finish: 'Submit <i class="icon-arrow-right14 ml-2" />'
            },
            transitionEffect: 'fade',
            saveState: true,
            autoFocus: true,
            onFinished: function (event, currentIndex) {
                $("#formContacto")[0].submit();
                //alert("contacto añadido correctamente");
            }
        });

       //nuestra clase formulario producto
       $('.steps-state-saving-producto').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        titleTemplate: '<span class="number">#index#</span> #title#',
        labels: {
            previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
            next: 'Next <i class="icon-arrow-right14 ml-2" />',
            finish: 'Submit <i class="icon-arrow-right14 ml-2" />'
        },
        transitionEffect: 'fade',
        saveState: true,
        autoFocus: true,
        onFinished: function (event, currentIndex) {
            $("#formProducto")[0].submit();
            //alert("Producto añadido correctamente");
        }
        });
        //nuestra clase formulario servicio
       $('.steps-state-saving-servicio').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        titleTemplate: '<span class="number">#index#</span> #title#',
        labels: {
            previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
            next: 'Next <i class="icon-arrow-right14 ml-2" />',
            finish: 'Submit <i class="icon-arrow-right14 ml-2" />'
        },
        transitionEffect: 'fade',
        saveState: true,
        autoFocus: true,
        onFinished: function (event, currentIndex) {
            $("#formServicio")[0].submit();
            //alert("Producto añadido correctamente");
        }
        });

        //nuestra clase formulario usuario
       $('.steps-state-saving-usuario').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        titleTemplate: '<span class="number">#index#</span> #title#',
        labels: {
            //previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
            next: 'Next <i class="icon-arrow-right14 ml-2" />',
            finish: 'Submit <i class="icon-arrow-right14 ml-2" />'
        },
        transitionEffect: 'fade',
        saveState: true,
        autoFocus: true,
        onFinished: function (event, currentIndex) {
            $("#formUsuario")[0].submit();
            //alert("Producto añadido correctamente");
        }
        });

        //nuestra clase formulario presupuesto
       $('.steps-state-saving-presupuesto').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        titleTemplate: '<span class="number">#index#</span> #title#',
        labels: {
            //previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
            next: 'Next <i class="icon-arrow-right14 ml-2" />',
            finish: 'Submit <i class="icon-arrow-right14 ml-2" />'
        },
        transitionEffect: 'fade',
        saveState: true,
        autoFocus: true,
        onFinished: function (event, currentIndex) {
            $("#formPresupuesto")[0].submit();
            //alert("Producto añadido correctamente");
        }
        });
        $('.steps-state-saving-facturap').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            titleTemplate: '<span class="number">#index#</span> #title#',
            labels: {
                //previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                next: 'Next <i class="icon-arrow-right14 ml-2" />',
                finish: 'Submit <i class="icon-arrow-right14 ml-2" />'
            },
            transitionEffect: 'fade',
            saveState: true,
            autoFocus: true,
            onFinished: function (event, currentIndex) {
                $("#formFacturap")[0].submit();
                //alert("Producto añadido correctamente");
            }
            });
        $('.steps-state-saving-facturac').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            titleTemplate: '<span class="number">#index#</span> #title#',
            labels: {
                previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                next: 'Next <i class="icon-arrow-right14 ml-2" />',
                finish: 'Submit <i class="icon-arrow-right14 ml-2" />'
            },
            transitionEffect: 'fade',
            saveState: true,
            autoFocus: true,
            onFinished: function (event, currentIndex) {
                $("#formFacturac")[0].submit();
                //alert("Producto añadido correctamente");
            }
            });

        //////////////////////////////////////////////

        $("#productosOptions").on("input", function(){
            alert($(this).val());
            });

        $('#productosOptions').change(function(){
            alert("hola");
            let $option = $('option:selected', this);
            let id = $option.val();
            let ruta = "";
            if($option.attr('class') == "servicios"){
               ruta = "servicio";
            }
            if($option.attr('class') == "productos"){
                ruta = "producto";
            }

            // alert(ruta);
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

        });

        $('#selectPresupuestoFactura').change(function(){
            let $option = $('option:selected', this);
            let id = $option.val();
            //console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               // {{ route('productos.info',['id'=> $producto->id]) }}
                url: "formulario/data/presupuestos",
                method: "POST",
                data: {
                    "id": id
                }
            }).done(function(request) {
                $("#precioTotal").val(request['precio']);
            });
        });
        function ajaxFormFacturaP(impuestos){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               // {{ route('productos.info',['id'=> $producto->id]) }}
                url: "formulario/data/impuestos",
                method: "POST",
                data: {
                    "coleccion_impuestos": impuestos,
                }
            }).done(function(request) {
                //calculo fatal del descuento:
                let precioNormal;
                if($("#descuentoPresupuesto").length){
                    if($("#descuentoPresupuesto").val() != ""){
                        precioNormal = parseFloat($('#precioConDescuento').val());
                    }else{
                        precioNormal = parseFloat($('#precioTotal').val());
                    }
                }else{
                    precioNormal = parseFloat($('#precioTotal').val());
                }

                let totalImpuestos = 0;
                let porcientoImpuestos=  Object.values(request);

                //calculo de impuestos:
                for(let i = 0; i < porcientoImpuestos.length; i++){
                    console.log(porcientoImpuestos[i]);
                    totalImpuestos += precioNormal*porcientoImpuestos[i]/100;
                }

                totalImpuestos += precioNormal;
                $('#precioImp').val(totalImpuestos.toFixed(2));

            });
        }
        $('#formFacturap').change(function(){
            // alert("presu");

            let $impuestos = $('.impuestoCheckbox:checked');
            let impuestos = [];
            let precio;
            $impuestos.each(function(){
                impuestos.push($(this).val());
            });
            $( document ).ajaxComplete(function() {
                precio = $("#precioTotal").val();
                //$('#precioImp').val(precio);
            });
            console.log(impuestos);

            ajaxFormFacturaP(impuestos);
        });
        function formfacturac(){
            // alert("cero");

            let $impuestos = $('.impuestoCheckbox:checked');
            let impuestos = [];
            // let precio;

            $impuestos.each(function(){
                impuestos.push($(this).val());
            });
            console.log(impuestos);
            ajaxFormFacturaP(impuestos);
        }
        $('#formFacturac').change(function(){
            formfacturac();
        });

        /////////////////////////////////////////////////////
        function calcularDescuento($descuento, precioFinal){
            if(!$descuento){
                return "no hay descuento";
            }else{
                let precioDescuento = precioFinal - ((precioFinal * $descuento)/100);
                return precioDescuento;
            }
        }

        $("#descuentoPresupuesto").change(function(){
            let $descuento = $("#descuentoPresupuesto").val();
            $descuento = parseInt($descuento);
            let $precioTotalOld = $("#precioTotal").val();
            let $precioConDescuento = $("#precioConDescuento");
            $precioConDescuento.val(calcularDescuento($descuento, $precioTotalOld));
        });



        $("#anadirPresupuesto").click(function(){
            $(".caja-de-errores").attr("hidden",true).empty();
            function AnadirPresupuesto(){
                let $observaciones=$("#observacionesPresupuesto").val();
                console.log($observaciones);
                let $cantidad=$("#cantidadPresupuesto").val();
                let $padre=$(".table_body");
                let $select=$("#selectPresupuesto").val();
                let $selector2 = $('#selectPresupuesto');
                let $option2 = $('option:selected', $selector2);
                let $nameProd = $("#productosInput option");
                var prod = document.getElementById('productosInput').value;
                let $option3 = $('option:selected', $nameProd);

                console.log("namo");
                console.log(prod);
                // let $selectName=$option2.html();
                let $selectName=$option3;
                let $descuento = $("#descuentoPresupuesto").val();
                $descuento = parseInt($descuento);
                let $precioConDescuento = $("#precioConDescuento");
                let $precio=$("#precioPresupuesto").val();
                let $precioTotal = $("#precioTotal");
                let $precioTotalOld = $("#precioTotal").val();
                let precioFinal=0;
                if(!$cantidad || !$precio || $select == 'null'){
                    $(".caja-de-errores").removeAttr('hidden').append("<h6>Algunos de los campos requeridos estan vacios</h6>");
                }else{
                    let existe = false;
                    let $tr = $padre.children('.tr');
                    let $tdNombre = $tr.children('.tdnombre');
                    $tdNombre.children('.nombre').each(function(){
                        if($(this).val() == $selectName){
                            existe = true;
                        }
                    });
                    if(existe){
                        $(".caja-de-errores").removeAttr('hidden').append("<h6>No se puede añadir dos veces el mismo producto/servicio, modifica la cantidad.</h6>");
                    }else{
                        let objeto = "<tr class='alpha-blue tr'><td class='tdnombre'><i class='icon-cancel-square2 text-danger borrar'></i>"+ " "+prod +" <input class='nombre' type='text' value="+ prod +" hidden><input  type='text' name='"+$option2.attr('class')+"["+$selectName+"][id]' value="+ $select +" hidden></td><td class='precio'>"+ $precio +"€<input type='text' name='"+$option2.attr('class')+"["+prod+"][precio]' value="+ $precio +" hidden></td><td class='cantidad'>"+ $cantidad +"<input  type='text' name='"+$option2.attr('class')+"["+prod+"][cantidad]' value="+ $cantidad +" hidden></td><td class='observaciones'>"+ $observaciones +"<textarea name='"+$option2.attr('class')+"["+prod+"][observaciones]' class='form-control' hidden>"+ $observaciones +"</textarea></td></tr>";
                        $padre.append(objeto).fadeIn("slow");
                        $tr = $padre.children('.tr');
                        let $tdPrecio = $tr.children('.precio');
                        let $tdCantidad = $tr.children('.cantidad');
                        console.log($tdPrecio.length);
                        for(i=0; i<$tdPrecio.length;i++ ){
                            precioFinal =  $tdPrecio.eq(i).children().val() * $tdCantidad.eq(i).children().val();
                        }
                        $precioTotalOld= parseFloat($precioTotalOld);
                        precioFinal = parseFloat(precioFinal);
                        precioFinal=$precioTotalOld+precioFinal;
                        $precioTotal.val(precioFinal);
                        $precioConDescuento.val(calcularDescuento($descuento,precioFinal));
                        formfacturac();
                    }
                }
            }
            let $selector = $('#selectPresupuesto');
            let $option = $('option:selected', $selector);
            let id = $option.val();
            let ruta = "";
            if($option.attr('class') == "productos"){
                ruta = "productoStock";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    // {{ route('productos.info',['id'=> $producto->id]) }}
                    url: "formulario/"+ruta,
                    method: "POST",
                    data: {
                        "id": id
                    }
                }).done(function(request) {
                    //refreshTemarios(id);
                    //temarios.unblockUI();
                    let $cantidad=$("#cantidadPresupuesto").val();
                    if(parseInt($cantidad) <= parseInt(request)){
                        AnadirPresupuesto();
                    }else{
                        $(".caja-de-errores").removeAttr('hidden').append("<h6>No hay stok suficiente, el stock máximo es "+request+"</h6>");
                    }
                });
            }else{
                AnadirPresupuesto();
            }

        });



        $('.table_body').on("click",'.borrar' ,function() {
            let $padre=$(".table_body");
            let $precioTotal = $("#precioTotal");
            let precioFinal=0;
            $td = $(this).parent();
            $td.parent().remove();
            let $tr = $padre.children('.tr');
            let $tdPrecio = $tr.children('.precio');
            let $tdCantidad = $tr.children('.cantidad');
            for(i=0; i<$tdPrecio.length;i++ ){
                precioFinal =  $tdPrecio.eq(i).children().val() * $tdCantidad.eq(i).children().val();
            }
            precioFinal = parseFloat(precioFinal);
            $precioTotal.val(precioFinal);
        });


        // Specify custom starting step
        $('.steps-starting-step').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            titleTemplate: '<span class="number">#index#</span> #title#',
            labels: {
                previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                next: 'Next <i class="icon-arrow-right14 ml-2" />',
                finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
            },
            transitionEffect: 'fade',
            startIndex: 2,
            autoFocus: true,
            onFinished: function (event, currentIndex) {
                alert('Form submitted.');
            }
        });

        // Enable all steps and make them clickable
        $('.steps-enable-all').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            transitionEffect: 'fade',
            enableAllSteps: true,
            titleTemplate: '<span class="number">#index#</span> #title#',
            labels: {
                previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                next: 'Next <i class="icon-arrow-right14 ml-2" />',
                finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
            },
            onFinished: function (event, currentIndex) {
                alert('Form submitted.');
            }
        });


        //
        // Wizard with validation
        //

        // Stop function if validation is missing
        if (!$().validate) {
            console.warn('Warning - validate.min.js is not loaded.');
            return;
        }

        // Show form
        var form = $('.steps-validation').show();


        // Initialize wizard
        $('.steps-validation').steps({
            headerTag: 'h6',
            bodyTag: 'fieldset',
            titleTemplate: '<span class="number">#index#</span> #title#',
            labels: {
                previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                next: 'Next <i class="icon-arrow-right14 ml-2" />',
                finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
            },
            transitionEffect: 'fade',
            autoFocus: true,
            onStepChanging: function (event, currentIndex, newIndex) {

                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    return true;
                }

                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex) {

                    // To remove error styles
                    form.find('.body:eq(' + newIndex + ') label.error').remove();
                    form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
                }

                form.validate().settings.ignore = ':disabled,:hidden';
                return form.valid();
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ':disabled';
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                alert('Submitted!');
            }
        });


        // Initialize validation
        $('.steps-validation').validate({
            ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
            errorClass: 'validation-invalid-label',
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },

            // Different components require proper error label placement
            errorPlacement: function(error, element) {

                // Unstyled checkboxes, radios
                if (element.parents().hasClass('form-check')) {
                    error.appendTo( element.parents('.form-check').parent() );
                }

                // Input with icons and Select2
                else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
                    error.appendTo( element.parent() );
                }

                // Input group, styled file input
                else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
                    error.appendTo( element.parent().parent() );
                }

                // Other elements
                else {
                    error.insertAfter(element);
                }
            },
            rules: {
                email: {
                    email: true
                }
            }
        });
    };

    // Uniform
    var _componentUniform = function() {
        if (!$().uniform) {
            console.warn('Warning - uniform.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.form-input-styled').uniform({
            fileButtonClass: 'action btn bg-blue'
        });
    };

    // Select2 select
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        var $select = $('.form-control-select2').select2({
            minimumResultsForSearch: Infinity,
            width: '100%'
        });

        // Trigger value change when selection is made
        $select.on('change', function() {
            $(this).trigger('blur');
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentWizard();
            _componentUniform();
            _componentSelect2();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    FormWizard.init();
});
