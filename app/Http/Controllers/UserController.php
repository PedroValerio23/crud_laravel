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

    /* Para eliminar usuarios
    OBS: Delete Non-static method Illuminate\Database\Eloquent\Model::delete() should not be called statically*/
    public function destroy($id){
        Usuario::destroy($id);

        return back()->with('usuarioEliminado','Usuario eliminado');
    }

/* FOrmulario para editar usuario */

public function editform($id){
    $usuario=Usuario::findOrFail($id);
    return view('usuarios.editform',compact('usuario'));
}

/* Edicion de usuarios */
public function edit(Request $request, $id){
    $datosUsuario=request()->except((['_token','_method']));
    Usuario::where('id','=',$id)->update($datosUsuario);

    return back()->with('usuarioModificado',' Usuario modificado2');
}


}
