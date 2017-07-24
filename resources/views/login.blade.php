@extends('base')
@section('content')

<div class="container-fluid">

	<form class="container" enctype="multipart/form-data" action="/login" method="POST">
	{{csrf_field()}}
		<div class="form-group row">
			<label class="col-12" for="login">Login</label>
			<input name="user" type="text" class="form-control" id="login" required>
		</div>

		<div class="form-group row">
			<label class="col-12" for="senha">Senha</label>
			<input name="senha" type="password" class="form-control" id="senha" required>
		</div>

		<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

		<div class="row">
			<button type="submit" class="btn btn-primary mr-4">Entrar</button>
		</div>
		
	</form>

</div>
<!-- /.container-fluid -->
@stop

