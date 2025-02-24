<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    // Afficher tous les plans
    public function index()
    {
        $plans = Plan::all();
        return response()->json($plans);
    }

    // Créer un nouveau plan
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'price' => 'required|numeric|min:0',
        ]);

        $plan = Plan::create([
            'titre' => $request->titre,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
        ]);

        return response()->json($plan, 201);
    }

    // Afficher un plan spécifique
    public function show($id)
    {
        $plan = Plan::findOrFail($id);
        return response()->json($plan);
    }

    // Mettre à jour un plan
    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'price' => 'required|numeric|min:0',
            'daysAvailable' => 'nullable|string|max:500',  // Ajout de la validation pour daysAvailable
        ]);
        
        $plan->update([
            'titre' => $request->titre,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
        ]);

        return response()->json($plan);
    }

    // Supprimer un plan
    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return response()->json(['message' => 'Plan supprimé avec succès']);
    }
}
