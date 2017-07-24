@extends('base')
@section('content')

@if (\Session::has('deleted'))
<div class="alert alert-danger" role="alert">
    <strong>Registro deletado com sucesso.</strong> 
</div>
@endif

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-12">

            <!-- Example Notifications Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-bell-o"></i> Notificações
                </div>
                <div class="list-group list-group-flush small">

                    @foreach($texto as $items)
                    @if($items->dias <= 0)
                    <div class="list-group-item list-group-item-action">
                        <div class="media">
                            <div class="media-body">
                                <strong>{{$items->nome}}</strong> já venceu.
                            </div>
                        </div>
                    </div>
                    @elseif($items->dias < 5)
                    <div class="list-group-item list-group-item-action">
                        <div class="media">
                            <div class="media-body">
                                <strong>{{$items->nome}}</strong> vencerá em <strong>{{$items->dias}} dias</strong>.
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <!-- Example Tables Card -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Dados de produtos
        </div>
        <div class="card-block">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Produto</th>
                            <th>Categoria</th>
                            <th>Quantidade</th>
                            <th>Data de Chegada</th>
                            <th>Data de Validade</th>
                            <th>Código de Barras</th>
                            <th>Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($texto as $item)
                        <tr>
                            <td class="text-center">
                            <p style="display: none">{{$item->dias}}</p>
                            <i style="color: {{$item->status}}" class="fa fa-circle fa-2x"></i></td>
                            <td>{{$item->nome}}</td>
                            <td>{{$item->nome_categoria}}</td>
                            <td>{{$item->quantidade}} {{$item->nome_medida}}</td>
                            <td>{{$item->datacriacao}}</td>
                            <td>{{$item->datavalidade}}</td>
                            <td>{{$item->codigo}}</td>
                            <td>
                                <a href="{{url('/cadastro/'.$item->id)}}" title="Editar" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                <a href="{{url('/del/'.$item->id)}}" title="Excluir" class="btn btn-danger delete_categoria"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@stop

