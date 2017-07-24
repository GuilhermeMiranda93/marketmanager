<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="Guilherme Miranda">
    <meta name="robots" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MarketManager</title>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{URL::asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="{{URL::asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{URL::asset('css/sb-admin.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Market Manager</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="sidebar-nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}"><i class="fa fa-fw fa-home" style="color:#1abc9c"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/cadastro')}}"><i class="fa fa-fw fa-plus" style="color:#1abc9c"></i> Cadastro de Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/categorias')}}"><i class="fa fa-fw fa-plus" style="color:#1abc9c"></i> Cadastro de Categorias</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-sign-out" style="color:#1abc9c"></i> Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                
            </li>
        </ul>
    </div>
</nav>

<!-- Conteúdo da página -->

<div class="content-wrapper py-3" style="min-height: 100vh">
    @yield('content')
</div>

<!-- Fim do Conteúdo da página -->

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-chevron-up"></i>
</a>

<!-- Bootstrap core JavaScript -->
<script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('vendor/tether/tether.min.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{URL::asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{URL::asset('vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{URL::asset('vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{URL::asset('js/sb-admin.min.js')}}"></script>

</body>

</html>
