<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Inventario;
use Illuminate\Http\Request;
use DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return \DataTables::of(Producto::
                join('categorias','categorias.id','productos.categoria_id')
                ->select('productos.id', 'productos.producto', 'categorias.categoria', 'productos.precio_compra', 'productos.precio_venta', 'productos.descripcion')
                ->get()
            )->make(true);
        }else{
            return view('configuracion.productos.index');
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
        $producto = Producto::create($request->all());
        Inventario::create([
            'existencia' => $request->existencia,
            'categoria_id' => $producto->categoria_id,
            'producto_id' => $producto->id
        ]);
        return response()->json(DB::table('productos')
            ->join('categorias','categorias.id','productos.categoria_id')
            ->select('productos.id', 'productos.producto', 'categorias.categoria', 'productos.precio_compra', 'productos.precio_venta', 'productos.descripcion')
            ->where('productos.id','=',$producto->id)->first(),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update($producto_id, Request $request)
    {
        $producto = Producto::find($producto_id);
        $producto->update($request->all());
        return response()->json(DB::table('productos')
            ->join('categorias','categorias.id','productos.categoria_id')
            ->select('productos.id', 'productos.producto', 'categorias.categoria', 'productos.precio_compra', 'productos.precio_venta', 'productos.descripcion')
            ->where('productos.id','=',$producto->id)->first(),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($producto_id)
    {
        return response()->json(Producto::find($producto_id)->delete(),200);
    }
}
