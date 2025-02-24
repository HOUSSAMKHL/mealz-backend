<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        // Récupérer tous les clients existants
        $clients = DB::table('clients')->pluck('id');

        if ($clients->isEmpty()) {
            return; // Éviter les erreurs si aucun client n'existe
        }

        // Récupérer tous les repas existants
        $meals = DB::table('meals')->pluck('id');

        foreach ($clients as $clientId) {
            // Insérer une commande et récupérer l'ID
            $orderId = DB::table('orders')->insertGetId([
                'order_day' => now()->addDays(rand(1, 30)),
                'order_date' => now(),
                'order_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Associer la commande au client
            DB::table('clients')->where('id', $clientId)->update(['order_id' => $orderId]);

            // Assigner 5 repas aléatoires à cette commande
            $assignedMeals = $meals->random(min(5, $meals->count()));

            foreach ($assignedMeals as $mealId) {
                DB::table('order_meal')->insert([
                    'order_id' => $orderId,
                    'meal_id' => $mealId,
                    'meal_date' => now()->addDays(rand(1, 30)),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
