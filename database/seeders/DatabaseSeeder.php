<?php 
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call([
            MealSeeder::class,
            PlanSeeder::class, 
            ClientsTableSeeder::class, // Insérer les clients d'abord
            OrdersTableSeeder::class,  // Puis générer les commandes et les associer
        ]);
    }
}
