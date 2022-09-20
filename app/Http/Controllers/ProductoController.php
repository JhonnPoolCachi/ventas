<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Auth;

class ProductoController extends Controller
{
    public function index()
    {
    	$categorias = Categoria::where('baja','0')->get();
    	return view('productos.index',compact('categorias'));
    }

    public function create()
    {
    	$pagination_rows = request('pagination_rows'??10);
        $produ_nombre = request('produ_nombre')??'';
        $conditions = [];       
        if($produ_nombre != '')
        {
            array_push($conditions,array('produ_nombre','ilike',"%{$produ_nombre}%"));
        }
       
        $productos = Producto::with('categoria')->where($conditions)
                    ->where('baja','0')
                    ->paginate($pagination_rows);
        return response()->json($productos->toArray());
    }

    public function store(Request $request)
    {
        if($request->has("produ_cod")){
            $producto = Producto::where("produ_cod",$request->produ_cod)->first();
            $producto->fecha_mod = Date("d-m-Y");
            //$producto->usua_mod = Auth::user()->id;
        }else{
            $producto = new Producto;
            //$producto->usua_reg = Auth::user()->id;
            $producto->fecha_reg = Date("d-m-Y");
            $producto->baja = '0';
        }
    	$producto->produ_nombre = $request->produ_nombre;
    	$producto->cat_cod = $request->cat_cod;        
    	$producto->save();
    	return $producto;
    }

    public function show($cod)
    {
        $producto = Producto::where("produ_cod",$cod)->first();
        return response()->json(compact('producto'));
    }

    public function destroy($cod)
    {
        $producto = Producto::where("produ_cod",$cod)->first();
        $producto->fecha_baja = Date("d-m-Y");
        //$producto->usua_baja = Auth::user()->id;
        $producto->baja = '1';
        $producto->save();
        return $producto;
    }
}
