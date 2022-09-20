<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Auth;

class CategoriaController extends Controller
{
    public function index()
    {
    	return view('categorias.index');
    }

    public function create()
    {
    	$pagination_rows = request('pagination_rows'??10);
        $cat_nombre = request('cat_nombre')??'';
        $conditions = [];       
        if($cat_nombre != '')
        {
            array_push($conditions,array('cat_nombre','ilike',"%{$cat_nombre}%"));
        }
       
        $categorias = Categoria::where($conditions)
                    ->where('baja','0')
                    ->paginate($pagination_rows);
        return response()->json($categorias->toArray());
    }

    public function store(Request $request)
    {
        if($request->has("cat_cod")){
            $categoria = Categoria::where("cat_cod",$request->cat_cod)->first();
            $categoria->fecha_mod = Date("d-m-Y");
            //$categoria->usua_mod = Auth::user()->id;
        }else{
            $categoria = new Categoria;
            //$categoria->usua_reg = Auth::user()->id;
            $categoria->fecha_reg = Date("d-m-Y");
            $categoria->baja = '0';
        }
    	$categoria->cat_nombre = $request->cat_nombre;
    	 	        
    	$categoria->save();
    	return $categoria;
    }

    public function show($cod)
    {
        $categoria = Categoria::where("cat_cod",$cod)->first();
        return response()->json(compact('categoria'));
    }

    public function destroy($cod)
    {
        $categoria = Categoria::where("cat_cod",$cod)->first();
        $categoria->fecha_baja = Date("d-m-Y");
        //$categoria->usua_baja = Auth::user()->id;
        $categoria->baja = '1';
        $categoria->save();
        return $categoria;
    }

}
