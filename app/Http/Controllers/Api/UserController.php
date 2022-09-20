<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    var $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function index(Request $request){

        $filtro = $request->input('filtro');

        if($filtro){
            return $this->model->filtro($filtro);
        }else{
            return $this->model->all();
        }
    }

    public function store(StoreUserRequest $request){
        DB::beginTransaction();

        try {
            $user = $this->model;

            $user->fill($request->all());

            $user->password = Hash::make($request->input('password'));
            $user->matricula = getNextMatriculaGeradoPorAno();

            $created = $user->save();

            if ($created) {
                DB::commit();
                return response()->json(['success' => true, 'msg' => 'Usuário cadastrado com sucesso!'],201);
            }

            return response()->json(['success' => false, 'msg' => 'Não foi possível cadastrar o usuário!'],201);

        } catch (\Exception $exc) {
            DB::rollBack();
            return response()->json(['success' => null, 'msg' => 'Erro ao cadastrar usuário: '. $exc->getMessage()], 201);
        }
    }

    public function show($id){
        $user = $this->model->findOrFail($id);

        return $user;
    }

    public function update(UpdateUserRequest $request, $id){
        DB::beginTransaction();

        try {
            $user = $this->model->findOrFail($id);

            $user->fill($request->except('password'));

            if($request->filled('password')){
                $user->password = bcrypt($request->input('password'));
            }

            $update = $user->save();

            if ($update) {
                DB::commit();
                return response()->json(['success' => true, 'msg' => 'Usuário atualizado com sucesso!'], 201);
            }

            return response()->json(['success' => false, 'msg' => 'Não foi possível atualizar o usuário!'], 201);
        } catch (\Exception $exc) {
            DB::rollBack();
            return response()->json(['success' => null, 'msg' => 'Erro ao atualizar usuário: '. $exc->getMessage()],201);
        }
    }

    public function deleteUser($id){
        DB::beginTransaction();

        try {
            $user = $this->model->findOrFail($id);

            $delete = $user->delete();

            if($delete){
                DB::commit();
                return response()->json(['success' => true, 'msg' => 'Usuário deletado com sucesso!'],201);
            }

            return response()->json(['success' => false, 'msg' => 'Não foi possível deletar esse usuário!'],201);
        } catch (\Exception $exc) {
            DB::rollBack();
            return response()->json(['succcess' => null, 'msg' => 'Erro ao deletar usuáro: '. $exc->getMessage()], 201);
        }

    }
}
