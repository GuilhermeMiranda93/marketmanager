@extends('base')
@section('content')

@if (\Session::has('success'))
<div class="alert alert-success" role="alert">
	<strong>Muito bem!</strong> Registro salvo com sucesso.
</div>
@elseif(\Session::has('deleted'))
<div class="alert alert-danger" role="alert">
	<strong>Registro deletado com sucesso.</strong> 
</div>
@endif

<div class="container-fluid mb-4">

	<form class="container" enctype="multipart/form-data" action="/savcat" method="POST">
		{{csrf_field()}}
		<div class="form-group row">
			<label class="col-12" for="nomecategoria">Nome da Categoria</label>
			<input name="nome" type="text" class="form-control" id="nomecategoria" required>
		</div>

		<div class="row">
			<button type="submit" class="btn btn-primary mr-4">Salvar</button>
			<button type="reset" class="btn btn-danger">Limpar</button>
		</div>
		
	</form>

</div>
<!-- /.container-fluid -->

<div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Categorias salvas
        </div>
        <div class="card-block">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($texto as $item)
                        <tr>
                            <td>{{$item->id_categoria}}</td>
                            <td>{{$item->nome_categoria}}</td>
                            <td>
                                <a href="{{url('/delcat/'.$item->id_categoria)}}" title="Excluir" class="btn btn-danger delete_categoria"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

