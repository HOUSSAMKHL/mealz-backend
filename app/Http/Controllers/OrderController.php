<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Afficher toutes les commandes
    public function index()
    {
        $orders = Order::with('client')->get();
        return response()->json($orders);
    }

    // Créer une nouvelle commande
    public function store(Request $request)
    {
        $request->validate([
            'order_day' => 'required|date',
            'order_date' => 'required|date',
            'order_status' => 'required|string',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    // Afficher une commande spécifique
    public function show($id)
    {
        $order = Order::with('client')->findOrFail($id);
        return response()->json($order);
    }

    // Mettre à jour une commande
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'order_day' => 'required|date',
            'order_date' => 'required|date',
            'order_status' => 'required|string',
        ]);

        $order->update($request->all());
        return response()->json($order);
    }

    // Supprimer une commande
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(['message' => 'Commande supprimée avec succès']);
    }
}