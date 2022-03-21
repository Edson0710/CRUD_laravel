<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascotas = Mascota::all();
        return view('catalogos.mascotas.index', [
            'mascotas' => $mascotas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.mascotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mascota = new Mascota();
        $mascota->nombre = $request->nombre;
        $mascota->especie = $request->especie;
        $mascota->edad = $request->edad;
        $mascota->raza = $request->raza;
        $mascota->sexo = $request->sexo;
        try{
            $mascota->save();
            return redirect()->route('mascotas.index')->with('success', 'Mascota creada correctamente');
        }
        catch(\Exception $e){
            return redirect()->route('mascotas.index')->withErrors('Error al crear la mascota');
        }
        
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
    public function edit(Mascota $mascota)
    {
        return view('catalogos.mascotas.edit', [
            'mascota' => $mascota
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mascota $mascota)
    {
        $mascota->nombre = $request->nombre;
        $mascota->especie = $request->especie;
        $mascota->edad = $request->edad;
        $mascota->raza = $request->raza;
        $mascota->sexo = $request->sexo;
        try{
            $mascota->save();
            return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente');
        }
        catch(\Exception $e){
            return redirect()->route('mascotas.index')->withErrors('Error al actualizar la mascota');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        try{
            $mascota->delete();
            return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada correctamente');
        }
        catch(\Exception $e){
            return redirect()->route('mascotas.index')->withErrors('Error al eliminar la mascota');
        }
    }
}
