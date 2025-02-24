<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    // Afficher tous les repas
    public function index()
    {
        $meals = Meal::all();
        return response()->json($meals);
    }

    // Créer un nouveau repas
    public function store(Request $request)
    {
        $request->validate([
            'meal_img' => 'required|string',
            'meal_title' => 'required|string',
            'meal_description' => 'required|string',
            'meal_categorie' => 'required|string',
        ]);

        $meal = Meal::create($request->all());

        return response()->json($meal, 201);
    }

    // Afficher un repas spécifique
    public function show($id)
    {
        $meal = Meal::findOrFail($id);
        return response()->json($meal);
    }

    // Mettre à jour un repas
    public function update(Request $request, $id)
    {
        $meal = Meal::findOrFail($id);

        $request->validate([
            'meal_img' => 'required|string',
            'meal_title' => 'required|string',
            'meal_description' => 'required|string',
            'meal_categorie' => 'required|string',
        ]);

        $meal->update($request->all());

        return response()->json($meal);
    }

    // Supprimer un repas
    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);
        $meal->delete();

        return response()->json(['message' => 'Repas supprimé avec succès']);
    }
}
