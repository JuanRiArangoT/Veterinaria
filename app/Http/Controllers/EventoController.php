<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Carbon;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Evento $evento)
    {
        //

        $start  = $request->input('dateStart');
        $hour  = $request->input('hourStart');
        $dateStart = $start. ' ' .$hour;
        //$validacion = DB::select('SELECT * FROM pruebaveterinaria.eventos where start = "'.$start.'" AND end = "'.$hour.'"');
        $validacion = DB::select('SELECT * FROM yywxxwryst.eventos where start = "'.$dateStart.'"');
        $collection = collect($validacion);
        $prueba = $collection->count();

        if($prueba == 0){
            $evento->id= $request->input('id');
            $evento->nombres = $request->input('nombres');
            $evento->apellidos = $request->input('apellidos');
            $evento->title = $request->input('title');
            $evento->start = $dateStart;
            $evento->end = $dateStart;
            $evento->fecha = $start;
            $evento->hora = $hour;
            $evento->save();
        }else{
            request()->validate(Evento::$rules);
            $evento=Evento::create($request->all());
        }

        //Probar id con Documento aparte para la busqueda

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
        $evento= Evento::all();
        return response()->json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $evento = Evento::find($id);
        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //

        $start  = $request->input('dateStart');
        $hour  = $request->input('hourStart');
        $dateStart = $start. ' ' .$hour;

        $evento->id= $request->input('id');
        $evento->nombres = $request->input('nombres');
        $evento->apellidos = $request->input('apellidos');
        $evento->title = $request->input('title');
        $evento->start = $dateStart;
        $evento->end = $dateStart;
        $evento->fecha = $start;
        $evento->hora = $hour;
        $evento->update();
        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $evento = Evento::find($id)->delete();
        return response()->json($evento);
    }
}
