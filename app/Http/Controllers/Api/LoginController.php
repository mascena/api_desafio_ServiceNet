<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    /**
     * Tentativa de criar um login, porém os testes do
     * endpoints autenticados no postman não deram certo,
     * farei um teste futuro quando tiver um front e mais
     * tempo para faz com calma
     * */
/*     public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken($user->email, ['*'], Carbon::now()->addHours(9))->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ["message" => "Senha Invalida"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'Esse usuário não existe!'];
            return response($response, 422);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'Voce foi deslogado com sucesso!'];
        return response($response, 200);
    } */
}
