<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Afficher tous les clients
    public function index()
    {
        $clients = Client::with('order')->get();
        return response()->json($clients);
    }

    // Créer un nouveau client
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'phone' => 'required|string',
            'adresse' => 'required|string',
            'plan_id' => 'required|exists:plans,id',
            'order_id' => 'nullable|exists:orders,id',

        ]);

        $client = Client::create($request->all());
        return response()->json($client, 201);
    }

    // Afficher un client spécifique
    public function show($id)
    {
        $client = Client::with('order')->findOrFail($id);
        return response()->json($client);
    }

    // Mettre à jour un client
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'full_name' => 'required|string',
            'phone' => 'required|string',
            'adresse' => 'required|string',
            'order_id' => 'nullable|exists:orders,id',
            'plan_id' => 'required|exists:plans,id',
        ]);

        $client->update($request->all());
        return response()->json($client);
    }

    // Supprimer un client
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response()->json(['message' => 'Client supprimé avec succès']);
    }
}

