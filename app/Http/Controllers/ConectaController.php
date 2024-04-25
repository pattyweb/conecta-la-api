<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConectaCollection;
use App\Http\Resources\ConectaResource;
use App\Models\Conecta;
use Illuminate\Http\Request;

class ConectaController extends Controller
{
    public function index() {
        return new ConectaCollection(Conecta::all());
    }

    public function show($id) {
        $conecta = Conecta::findOrFail($id);
        return new ConectaResource($conecta);
    }


    public function store(Request $request) {
        $validatedData = $request->validate([
            'users' => 'required|max:255',
            // Add other validation rules as needed
        ], [
            'users.required' => 'The users field is required.',
        ]);

        $conecta = Conecta::create($validatedData);

        return new ConectaResource($conecta);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'users' => 'required|max:255',
            // Add other validation rules as needed
        ]);

        return Conecta::whereId($id)->update($validatedData);
    }

    public function destroy($id)
    {

        Conecta::destroy($id);

    }

}
