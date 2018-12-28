<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return \DataTables::of(Categoria::
                select('categorias.id', 'categorias.categoria')
                ->get()
            )->make(true);
        }else{
            return view('configuracion.categorias.index');
        }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = Categoria::create($request->all());
        return response()->json(DB::table('categorias')
            ->select('categorias.id', 'categorias.categoria')
            ->where('categorias.id','=',$categoria->id)->first(),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update($categoria_id, Request $request)
    {
        $categoria = Categoria::find($categoria_id);
        $categoria->update($request->all());
        return response()->json(DB::table('categorias')
            ->select('categorias.id', 'categorias.categoria')
            ->where('categorias.id','=',$categoria->id)->first(),200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoria_id)
    {
        return response()->json(Categoria::find($categoria_id)->delete(),200);
    }
}
