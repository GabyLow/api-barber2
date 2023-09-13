<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();
        return response()->json(['clients' => $clients]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'birthday' => 'required|date',
            'phone' => 'required|string',
            'email' => 'required|email|unique:clients,email',
        ]);

        $client = Client::create($data);

        return response()->json(['message' => 'Cliente creado con éxito', 'client' => $client], 201);
    }


    public function show(Client $client)
    {
        return response()->json(['client' => $client]);
    }


    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'name' => 'string',
            'birthday' => 'date',
            'phone' => 'string',
            'email' => 'email|unique:clients,email,' . $client->id,
        ]);

        $client->update($data);

        return response()->json(['message' => 'Cliente actualizado con éxito', 'client' => $client]);
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json(['message' => 'Cliente eliminado con éxito']);
    }
}

