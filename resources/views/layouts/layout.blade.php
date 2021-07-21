<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Business Control - Gestion empresarial</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ url ('global_assets/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{url('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/presupuesto.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ url('global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ url('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <script src="{{ url('global_assets/js/plugins/extensions/jquery_ui/widgets.min.js') }}"></script>
    <!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ url('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script src="{{ url('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<!--<script src="{{ url('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>-->
	<script src="{{ url('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script src="{{ url('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

	<script src="{{ url('assets/js/app.js') }}"></script>
	<script src="{{ url('global_assets/js/demo_pages/dashboard.js') }}"></script>
	<script src="{{ url('global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js') }}"></script>
	<script src="{{ url('global_assets/js/demo_charts/pages/dashboard/light/sparklines.js') }}"></script>
	<script src="{{ url('global_assets/js/demo_charts/pages/dashboard/light/lines.js') }}"></script>
	<script src="{{ url('global_assets/js/demo_charts/pages/dashboard/light/areas.js') }}"></script>
	<script src="{{ url('global_assets/js/demo_charts/pages/dashboard/light/donuts.js') }}"></script>
	<script src="{{ url('global_assets/js/demo_charts/pages/dashboard/light/bars.js') }}"></script>
	<script src="{{ url('global_assets/js/demo_charts/pages/dashboard/light/progress.js') }}"></script>
	<script src="{{ url('global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js') }}"></script>
	<script src="{{ url('global_assets/js/demo_charts/pages/dashboard/light/pies.js') }}"></script>
    <script src="{{ url('global_assets/js/demo_charts/pages/dashboard/light/bullets.js') }}"></script>
    <!--form-->
    <script src="{{url('global_assets/js/plugins/forms/wizards/steps.min.js')}}"></script>
	<script src="{{url('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script src="{{url('global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script src="{{url('global_assets/js/plugins/forms/inputs/inputmask.js')}}"></script>
	<script src="{{url('global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
	<script src="{{url('global_assets/js/plugins/extensions/cookie.js')}}"></script>
    <script src="{{url('global_assets/js/demo_pages/form_wizard.js')}}"></script>

    <!--check-->
    <script src="{{url('global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<!--<script src="{{url('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>-->
	<script src="{{url('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
    <script src="{{url('global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
    <!-- /theme JS files -->

    <!--select-->
    <script src="{{url('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
	<script src="{{url('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script src="{{url('global_assets/js/demo_pages/form_select2.js')}}"></script>

    <!--widgets-->
    <script src="{{ url('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ url('global_assets/js/plugins/uploaders/dropzone.min.js') }}"></script>
    <script src="{{ url('global_assets/js/demo_pages/widgets_content.js') }}"></script>

    <!-- Paginado -->
    <script src="{{ url('js/paginado.js') }}"></script>



</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="{{route('home')}}" class="d-inline-block text-white">
				<i class="icon-trophy4 ">
                    @php
                        $nombre_empresa = App\Empresa::where('id', '1')->get()->first();
                        echo $nombre_empresa->nombre;
                    @endphp
                </i>
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse " id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>



			<ul class="navbar-nav ">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">

						<span>{{ Auth::user()->name }}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<!--<a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>-->
						<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
	<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Navigation
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
    <!-- /sidebar mobile toggler -->
    <!-- Sidebar content -->
			<div class="sidebar-content">

<!-- User menu -->
<div class="sidebar-user">
    <div class="card-body">
        <div class="media">
            <div class="mr-3  " >
                <i class="icon-user text-teal-400" style="font-size: 40px;"  ></i>
            </div>

            <div class="media-body">
                <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                <div class=" text-muted font-size-xs line-height-xs">{{ Auth::user()->email }}</div>
            </div>


        </div>
    </div>
</div>
<!-- /user menu -->


<!-- Main navigation -->
<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menú Principal</div> <i class="icon-menu" title="Main"></i></li>
        <li class="nav-item">
            <!--<a href="index.html" class="nav-link active">-->
            <a href="{{url('home')}}" class="nav-link">
                <i class="icon-home4"></i>
                <span>
                    Inicio
                </span>
            </a>
        </li>
        <li class="nav-item"><a href="{{url('productos')}}" class="nav-link"><i class="icon-price-tags"></i><span>Productos</span></a></li>
        <li class="nav-item"><a href="{{url('servicios')}}" class="nav-link"><i class="icon-wrench3"></i><span>Servicios</span></a></li>


        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Facturación</div> <i class="icon-menu" title="Main"></i></li>
        <li class="nav-item"><a href="{{ route('facturas.index') }}" class="nav-link"><i class="icon-file-check"></i><span>Facturas</span></a></li>
        <li class="nav-item"><a href="{{ route('presupuestos.index') }}" class="nav-link"><i class="icon-clipboard3"></i><span>Presupuestos</span></a></li>
        <li class="nav-item"><a href="{{route('inversiones.index')}}" class="nav-link"><i class="icon-coin-euro"></i><span>Inversiones</span></a></li>

        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Control</div> <i class="icon-menu" title="Main"></i></li>

        <li class="nav-item"><a href="{{url('contactos')}}" class="nav-link"><i class="icon-address-book2"></i><span>Contactos</span></a></li>
        <li class="nav-item">
            <!--<a href="index.html" class="nav-link active">-->
            <a href="{{url('usuarios')}}" class="nav-link">
                <i class="icon-users"></i>
                <span>
                    Usuarios
                </span>
            </a>
        </li>

         <!-- <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-paste2"></i> <span>Facturas y presupuestos</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Form components">
                <li class="nav-item"><a href="{{ route('presupuestos.index') }}" class="nav-link"><i class="icon-clipboard3"></i><span>Generar Presupuesto</span></a></li>
                <li class="nav-item"><a href="{{ route('facturas.index') }}" class="nav-link"><i class="icon-file-check"></i><span>Generar Factura</span></a></li>
                <li class="nav-item"><a href="{{ route('impuestos.index') }}" class="nav-link"><i class="icon-cogs"></i><span>Configuracion Impuestos</span></a></li>
            </ul>
        </li> -->

        <!-- <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-folder"></i> <span>CRUD</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Form components">
                <li class="nav-item"><a href="{{url('contactos')}}" class="nav-link"><i class="icon-address-book2"></i><span>Contactos</span></a></li>
                <li class="nav-item"><a href="{{url('productos')}}" class="nav-link"><i class="icon-price-tags"></i><span>Productos</span></a></li>
                <li class="nav-item"><a href="{{url('servicios')}}" class="nav-link"><i class="icon-wrench3"></i><span>Servicios</span></a></li>
            </ul>
        </li> -->





        <!-- /page kits -->

    </ul>
</div>
<!-- /main navigation -->

</div>
<!-- /sidebar content -->

</div>
<!-- /main sidebar -->
    <div class="w-100 h-100">
        @yield('content')
    </div>



</div><!--div_content-->
<!-- Footer -->
<div class="navbar navbar-expand-lg navbar-light">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Footer
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">

    </div>
</div>
<!-- /footer -->
</body>
</html>

