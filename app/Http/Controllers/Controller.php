<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\texto;
use App\categoria;
use App\medida;
use App\login;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function retornaRegistro(){

		$texto = texto::where('excluido','=','0')
		->join('categoria','categoria.id_categoria','=','texto.categoria')
		->join('medida','medida.id_medida','=','texto.medida')
		->get();

		foreach($texto as $items){
			$datacriacao = date('d-m-Y',strtotime($items->datacriacao));
			$datavalidade = date('d-m-Y',strtotime($items->datavalidade));

			$items->datacriacao = $datacriacao;
			$items->datavalidade = $datavalidade;

			$datetime1 = date_create($datavalidade);
			$datetime2 = date_create($datacriacao);

			$interval = date_diff($datetime2, $datetime1);

			$calculo = (int)$interval->format('%R%a');

			if($calculo < 3){
				$items->status = 'red';
			}
			else if($calculo < 30){
				$items->status = 'yellow';
			}
			else{
				$items->status = 'green';
			}

			$items->dias = $calculo;

		}

		return view('home',[

			'texto'=>$texto

			]);

	}


	public function salvarRegistro(Request $req){
		$texto = new texto();

		$nome = $req->input('nome');
		$categoria = $req->input('categoria');
		$quantidade = $req->input('quantidade');
		$medida = $req->input('medida');
		$codigo = $req->input('codigo');
		$datavalidade = $req->input('datavalidade');
		$datacriacao = date('Y-m-d');

		$data = array(
			'nome'=>$nome,
			'categoria'=>$categoria,
			'quantidade'=>$quantidade,
			'medida'=>$medida,
			'codigo'=>$codigo,
			'datavalidade'=>$datavalidade,
			'datacriacao'=>$datacriacao
			);

		$texto->insert($data);

		$req->session()->flash('success', 'Task was successful!');
		return redirect()->back();
	}

	public function salvarEditarRegistro(Request $req){

		$id = $req->input('id_produto');
		$nome = $req->input('nome');
		$categoria = $req->input('categoria');
		$quantidade = $req->input('quantidade');
		$medida = $req->input('medida');
		$codigo = $req->input('codigo');
		$datavalidade = $req->input('datavalidade');
		$datacriacao = date('Y-m-d');

		$texto = texto::find($id);

		$texto->nome = $nome;
		$texto->categoria = $categoria;
		$texto->quantidade = $quantidade;
		$texto->medida = $medida;
		$texto->codigo = $codigo;
		$texto->datavalidade = $datavalidade;		

		$texto->save();

		$req->session()->flash('success', 'Task was successful!');
		return view('cadastro');
	}

	public function salvarCategorias(Request $req){
		$texto = new categoria();

		$nome = $req->input('nome');

		$data = array(
			'nome_categoria'=>$nome
			);

		$texto->insert($data);

		$req->session()->flash('success', 'Task was successful!');
		return redirect()->back();
	}

	public function retornaRegistroCategorias(){

		$texto = categoria::where('excluido_categoria','=','0')
		->get();

		return view('cadastrocategorias',[

			'texto'=>$texto

			]);
	}

	public function editarProdutos($id){

		$texto = texto::where('id','=',$id)
		->limit(1)
		->get();

		$categorias = categoria::where('excluido_categoria','=','0')
		->get();

		$medidas = medida::where('excluido_medida','=','0')
		->get();

		return view('editarcadastro',[

			'texto'=>$texto,
			'categorias'=>$categorias,
			'medidas'=>$medidas

			]);
	}

	public function cadastro(){

		$categorias = categoria::where('excluido_categoria','=','0')
		->get();

		$medidas = medida::where('excluido_medida','=','0')
		->get();

		return view('cadastro',[
			'categorias'=>$categorias,
			'medidas'=>$medidas

			]);
	}

	public function login(Request $req){
		$usuario = $req->input('user');
		$senha = $req->input('senha');

		$senha = md5($senha);

		$logar = login::where('login','=',$usuario)
		->where('password','=',$senha)
		->get();

		$value = $req->session()->get('login');

		if(count($logar)>0){
			$req->session()->put('login', 'true');
		}

		return $this->retornaRegistro();

	}

	public function logar(){
		return view('login');
	}

	public function deletarRegistro($id, Request $req){

		$texto = texto::find($id);

		$texto->excluido = 1;

		$texto->save();

		$req->session()->flash('deleted', 'Task was successful!');
		return redirect()->back();

	}

	public function deletarCategoria($id, Request $req){

		$texto = categoria::find($id);

		$texto->excluido_categoria = 1;

		$texto->save();

		$req->session()->flash('deleted', 'Task was successful!');
		return redirect()->back();

	}
}
