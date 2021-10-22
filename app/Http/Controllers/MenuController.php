<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $categorias = Categoria::all();
        $platillos = DB::select("SELECT * FROM `listado_platillos`");
        return view('menu.tableplatos', compact('categorias','platillos'));
    }

    public function menu(){
        $categorias = Categoria::all();
        $platillos = Menu::paginate(8);
        return view('menu.menu', compact('platillos','categorias'));
    }

    public function filtrar(Categoria $categoria)
    {
        $platillos = Menu::where('categoria', $categoria->id);
        return view('menu.pruebas', compact('platillos','categoria'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('menu.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'nombre_platillo' => 'required','descripcion_platillo' => 'required', 'categoria' => 'required', 'referencia' => 'required|image|mimes:jpeg,png,svg|max:1024', 'precio_venta'=> 'required'
       ]);

       $platillo = $request->all();

       if($referencia = $request->file('referencia')){
           $rutaGuardarImg = 'imagen/';
           $imagenProducto = date('YmdHis'). "." . $referencia->getClientOriginalExtension();
           $referencia->move($rutaGuardarImg, $imagenProducto);
           $platillo['referencia'] = "$imagenProducto";
       }

       Menu::create($platillo);
       return redirect('/tableplatos');
    }

    public function addcategoria(Request $request)
    {
        $request->validate(['nombre_categoria'=> 'required']);
        $categoria = $request->all();
        Categoria::create($categoria);
        return redirect('/tableplatos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $platillo = Menu::find($id);
        return response()->json($platillo);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        $platillo = Menu::find($id);
        $categorias = Categoria::all();
        return view('menu.edit', compact('platillo','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $platillo = Menu::find($id);

        $platillo->nombre_platillo = $request->get('nombre_platillo');
        $platillo->descripcion_platillo = $request->get('descripcion_platillo');
        $platillo->categoria = $request->get('categoria');
        $platillo->referencia = $request->get('referencia');
        $platillo->precio_venta = $request->get('precio_venta');

        if($referencia = $request->file('referencia')){
                   $rutaGuardarImg = 'imagen/';
                   $imagenProducto = date('YmdHis'). "." . $referencia->getClientOriginalExtension();
                   $referencia->move($rutaGuardarImg, $imagenProducto);
                   $platillo['referencia'] = "$imagenProducto";
               }else {
                    unset($platillo['referencia']);
               }
        $platillo->save();
        return redirect('/tableplatos');
    }


    public function editCategoria(Request $request,$id)
    {
 
        $categoria = Categoria::find($id);
        $categoria->nombre_categoria = $request->get('editarCategoria');
        $categoria->save();
        return redirect('/tableplatos');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $platillo = Menu::find($id);
        $platillo->delete();
        return redirect('/tableplatos');
    }
}
