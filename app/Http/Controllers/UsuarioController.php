<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = DB::select("SELECT * FROM listado_empleados");
        return view('usuarios.usuarios')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createout(Request $request)
    {
        return view('usuarios.registrar');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json(['response'=>'Respuesta desde el controlador'.$request->get('nombres')]);
        $rules = array(
            'nombres' => 'required|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/i',
            'puesto' => 'required',
            'correo' => 'required|email',
            'password1' => 'required|min:5|regex:/^[a-zA-Z0-9 ]+$/i',
            'password2' => 'required'
        );
        $messages = array(
            'nombres.required' => 'Debe ingresar el nombre del usuario.',
            'nombres.regex' => 'El nombre del usuario solo debe contener letras o numeros',
            'puesto.required' => 'Debe asignar un perfil para el usuario.',
            'correo.required' => 'Debe ingresar el email del usuario.',
            'correo.email' => 'El email ingresado no es valido.',
            'password1.required' => 'Debe ingresar una contraseña.',
            'password1.min' => 'La contraseña debe tener como minimo 5 caracteres.',
            'password1.regex' => 'La contraseña solo debe contener letras o numeros.',
            'password2.required' => 'Debe confirmar la contraseña.'
        );
        $data = Validator::make($request->all(),$rules, $messages);
        if ($data->passes()) {
            if ($request->get('password1') != $request->get('password2')) {
                return response()->json(['response'=>'Las contraseñas no son equivalentes']);
            }else {
                $email = User::where('email',$request->get('correo'))->count();
                if ($email > 0) {
                    return response()->json(['response'=>'El usuario ya esta registrado']);
                } else {
                    $empleado = Empleado::create([
                        'nombre_empleado' => $request->get('nombres'),
                        'apellido_empleado' => $request->get('apellidos'),
                        'telefono' => $request->get('telefono'),
                        'id_puesto' => $request->get('puesto'),
                  
                    ]);
                    $usuarioid = $empleado['id'];
                    $usuario = new User();
                    $usuario -> email = $request->get('correo');
                    $usuario -> id_empleado = $usuarioid;
                    $usuario -> password = Hash::make($request->get('password2'));
                    return response()->json(['response'=>$usuario->save()]);
                }
            }
        }else {
            return response()->json(['response'=>$data->errors()->first()]);
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
