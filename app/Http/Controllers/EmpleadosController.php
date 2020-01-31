<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpleado;
use App\Models\Empleado;

use Ixudra\Curl\Facades\Curl;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Empleado::all();
        return view('empleados.index')
            ->with('employes', $employes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleado $request)
    {
        $token = env('BMX_TOKEN');
        $today = now()->format('Y-m-d');
        $path = "https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/$today/$today";
        $resp = Curl::to($path)
            ->withHeader("Bmx-Token: $token")
            ->asJson()
            ->get();
        if (!isset($resp->bmx->series[0]->datos[0]->dato) || true) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['Servicio de conversion de divisas no disponible.']);
        }
        $rate = $resp->bmx->series[0]->datos[0]->dato;
        $data = $request->all();
        $data['salarioPesos'] = $data['salarioDolares'] * $rate;
        $employe = Empleado::create($data);

        return redirect()->route('empleados.show', $employe->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $employe)
    {
        return view('empleados.show')
            ->with('employe', $employe);
    }

    public function toggleActivo(Empleado $employe)
    {
        // code...
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
