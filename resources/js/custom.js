var DatatableBasic = function() {
    // Basic Datatable examples
    var _componentDatatableBasic = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }
        // Basic datatable
        $('.datatable-basic').DataTable({
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: 100,
                targets: [ 2 ]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
                search: '<span>Buscador: </span> _INPUT_',
                searchPlaceholder: 'Escribe para filtrar...',
                lengthMenu: '<span>Mostrar:</span> _MENU_ <span>registros</span>',

            }
        });
    };

    return {
        init: function() {
            _componentDatatableBasic();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    DatatableBasic.init();
});
