<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;

class SucursalController extends Controller
{
    public function index() {
        $sucursales = Sucursal::all();
        return $sucursales;
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nombre'=> ['string', 'required', 'max:50'],
            'direccion'=> ['string', 'required', 'max:50'],
            'telefono'=> ['string', 'required', 'max:20'],
        ]);

        $obj = Sucursal::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
        ]);

        return $obj;
    }

    public function show(Sucursal $sucursal) {
        return $sucursal;
    }

    public function update(Sucursal $sucursal, Request $request) {
        $validated = $request->validate([
            'nombre'=> ['string', 'sometimes', 'max:50'],
            'direccion'=> ['string', 'sometimes', 'max:50'],
            'telefono'=> ['string', 'sometimes', 'max:20'],
        ]);

        $sucursal->update($request->all());
        return $sucursal;
    }

    public function destroy(Sucursal $sucursal) {
        $sucursal->delete();
        return 'SUCURSAL ELIMINADA.';
    }
}
