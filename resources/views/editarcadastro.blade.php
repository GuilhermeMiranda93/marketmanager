@extends('base')
@section('content')

@if (\Session::has('success'))
<div class="alert alert-success" role="alert">
	<strong>Muito bem!</strong> Registro salvo com sucesso.
</div>
@endif

<div class="container-fluid">

	<form class="container" enctype="multipart/form-data" action="/savedit" method="POST">
		{{csrf_field()}}
		@foreach($texto as $item)
		<div class="form-group row">
			<label class="col-12" for="id">ID</label>
			<input name="id_produto" value="{{$item->id}}" type="number" class="form-control" id="id" required readonly>
		</div>
		<div class="form-group row">
			<label class="col-12" for="nomeproduto">Nome do Produto</label>
			<input name="nome" value="{{$item->nome}}" type="text" class="form-control" id="nomeproduto" required>
		</div>
		<div class="form-group row">
			<label class="col-12" for="categoria">Categoria</label>
			<select name="categoria" class="form-control" id="categoria">
				@foreach($categorias as $cats)
				<option
				@if ($item->categoria == $cats->id_categoria)
				selected="selected"
				@endif
				value="{{$cats->id_categoria}}">{{$cats->nome_categoria}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group row justify-content-between">
			<label class="col-12" for="quantidade">Quantidade do lote</label>
			<input name="quantidade" value="{{$item->quantidade}}" type="number" class="form-control col-8" id="quantidade" required>
			<select name="medida" class="form-control col-3">
				@foreach($medidas as $med)
				<option
				@if ($item->medida == $med->id_medida)
				selected="selected"
				@endif
				value="{{$med->id_medida}}">{{$med->nome_medida}}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group row">
			<label class="col-12" for="barcode">Código de Barras</label>
			<input name="codigo" value="{{$item->codigo}}" class="form-control" type="number" id="barcode" required>
		</div>

		<div class="form-group row">
			<label class="col-12" for="validade">Data de Validade</label>
			<input name="datavalidade" value="{{$item->datavalidade}}" class="form-control" type="date" value="2017-01-01" id="validade" required>
		</div>

		<div class="row">
			<button type="submit" class="btn btn-primary mr-4">Salvar</button>
		</div>
		@endforeach
	</form>

</div>
<!-- /.container-fluid -->
@stop

