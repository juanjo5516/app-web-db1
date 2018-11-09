<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use DB;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \DataTables::of(Insumo::
            select('insumo.id_insumo', 'insumo.id_lote', 'insumo.nombre', 'insumo.id_laboratorio', 'departamentos.existencia', 'municipios.municipio')
            ->join('departamentos', 'departamentos.id', '=','insumo.departamento_id')
            ->join('municipios', 'municipios.id', '=','insumo.municipio_id')
            ->get()
        )->make(true);
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
        //dump($request);
        DB::executeProcedure('PAQUETE_INSUMO.AGREGAR_INSUMO', ['ID_LOTE'=>$request->ID_LOTE,'NOMBRE'=>$request->NOMBRE,'ID_LABORATORIO'=>$request->ID_LABORATORIO,'EXISTENCIA'=>$request->EXISTENCIA]);
        return redirect('/insumos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        return view('insumos.show', compact('insumo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $insumo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumo $insumo)
    {
        //
    }
}
