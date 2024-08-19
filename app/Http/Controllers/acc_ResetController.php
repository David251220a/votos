<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class acc_ResetController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }

    public function index(Request $request){

        $id_user = auth()->id();        

        $user = DB::table('users')   
        ->where('id','=',$id_user)
        ->first();

        if($request){

            return view('acceso.reset.index',["user"=>$user]);

        }

    }

    
    public function update(User $usuario, Request $request){
        $usuario->password = bcrypt($request->get('contraseña'));
        $usuario->api_token=Str::random(60);
        $usuario->update();            
        return redirect('acceso/reset')->with('msj', 'Se cambio correctamente la constraseña.!!');;
    }
    
}
