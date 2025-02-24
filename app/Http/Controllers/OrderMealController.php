<?php

namespace App\Http\Controllers;

use App\Models\OrderMeal;
use Illuminate\Http\Request;

class OrderMealController extends Controller
{
    // Afficher les repas d'une commande spécifique
    public function index($orderId)
    {
        $orderMeals = OrderMeal::where('order_id', $orderId)->get();
        return response()->json($orderMeals);
    }

    // Ajouter un repas à une commande
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'meal_id' => 'required|exists:meals,id',
            'meal_date' => 'required|date',
        ]);

        $orderMeal = OrderMeal::create($request->all());
        return response()->json($orderMeal, 201);
    }

    // Supprimer un repas d'une commande
    public function destroy($id)
    {
        $orderMeal = OrderMeal::findOrFail($id);
        $orderMeal->delete();
        return response()->json(['message' => 'Repas supprimé de la commande']);
    }
}
