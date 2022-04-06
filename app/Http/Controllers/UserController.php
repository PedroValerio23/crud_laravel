<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /* Listado de usuarios, paginado
    para obtener el registro de 3 en 3*/
    public function list(){
        $data['users']=Usuario::paginate(3);

        return view('usuarios.listar',$data);

    }


    /* Formulario de usuarios */
    public function userform(){
        return view('usuarios.userformu');
    }

    /* Guardar usuarios, validar campos de usuario y correo*/

    public function save(Request $request){
        $validator=$this->validate($request,[
         'nombre'=>'required|string|max:255',
          'email'=> 'required|string|max:255|email|unique:usuarios']);

        $userdata=request()->except('_token');
        Usuario::insert($userdata);


        return back()->with('usuarioGuardado','Usuario guardado');


    }
}
