<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use DB;

class InsumoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getInsumos()
    {
        return \DataTables::of(Insumo::
            select('insumo.id_insumo', 'insumo.id_lote', 'insumo.nombre', 'lab_farmaceuticos_insumos.nombre as laboratorio', 'insumo.existencia')
            ->join('lab_farmaceuticos_insumos', 'lab_farmaceuticos_insumos.id_laboratorio', '=','insumo.id_laboratorio')
            ->get()
        )->make(true);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumo::
            select('insumo.id_insumo', 'insumo.id_lote', 'insumo.nombre', 'lab_farmaceuticos_insumos.nombre as laboratorio', 'insumo.existencia')
            ->join('lab_farmaceuticos_insumos', 'lab_farmaceuticos_insumos.id_laboratorio', '=','insumo.id_laboratorio')
            ->get();
        //$insumos = Insumo::all();
        return view('insumos.index',compact('insumos'));

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
        DB::executeProcedure('paquete_insumo.agregar_insumo', ['ID_LOTE'=>$request->ID_LOTE,'NOMBRE'=>$request->NOMBRE,'ID_LABORATORIO'=>$request->ID_LABORATORIO,'EXISTENCIA'=>$request->EXISTENCIA]);
        return redirect('/insumos/'. Insumo::where('nombre',$request->nombre)->first()->id_insumo);
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
