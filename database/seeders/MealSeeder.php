<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    public function run()
    {
      meal::query()->delete(); // Supprimer toutes les entrées sans troncature

        // Données des repas pour chaque catégorie
        $mealsData = [
            'promotions' => [
                ["img" => "http://localhost:8000/storage/chicken1.jpeg", "titre" => "Chicken Meal 1", "description" => "Delicious chicken..."],
                ["img" => "http://localhost:8000/storage/chicken2.jpeg", "titre" => "Chicken Meal 2", "description" => "Another great chicken option..."],
                ["img" => "http://localhost:8000/storage/chicken3.jpeg", "titre" => "Spicy Chicken", "description" => "For those who like it hot!"],
                ["img" => "http://localhost:8000/storage/chicken4.jpeg", "titre" => "Classic Chicken", "description" => "A timeless favorite."],
                ["img" => "http://localhost:8000/storage/chicken5.jpeg", "titre" => "Chicken Delight", "description" => "A delightful chicken experience."],
                ["img" => "http://localhost:8000/storage/chicken6.jpeg", "titre" => "Supreme Chicken", "description" => "The ultimate chicken indulgence."],
            ],
            'topVentes' => [
                ["img" => "http://localhost:8000/storage/top1.jpeg", "titre" => "Top Seller 1", "description" => "Best selling item 1"],
                ["img" => "http://localhost:8000/storage/top2.jpeg", "titre" => "Top Seller 2", "description" => "Best selling item 2"],
                ["img" => "http://localhost:8000/storage/top3.jpeg", "titre" => "Top Seller 3", "description" => "Best selling item 3"],
                ["img" => "http://localhost:8000/storage/top4.jpeg", "titre" => "Top Seller 4", "description" => "Best selling item 4"],
                ["img" => "http://localhost:8000/storage/top5.jpeg", "titre" => "Top Seller 5", "description" => "Best selling item 5"],
                ["img" => "http://localhost:8000/storage/top6.jpeg", "titre" => "Top Seller 6", "description" => "Best selling item 6"],
            ],
            'combos' => [
                ["img" => "http://localhost:8000/storage/combo1.jpeg", "titre" => "Combo 1", "description" => "Combo meal 1"],
                ["img" => "http://localhost:8000/storage/combo2.jpeg", "titre" => "Combo 2", "description" => "Combo meal 2"],
                ["img" => "http://localhost:8000/storage/combo3.jpeg", "titre" => "Combo 3", "description" => "Combo meal 3"],
                ["img" => "http://localhost:8000/storage/combo4.jpeg", "titre" => "Combo 4", "description" => "Combo meal 4"],
                ["img" => "http://localhost:8000/storage/combo5.jpeg", "titre" => "Combo 5", "description" => "Combo meal 5"],
                ["img" => "http://localhost:8000/storage/combo6.jpeg", "titre" => "Combo 6", "description" => "Combo meal 6"],
            ],
            'plats' => [
                ["img" => "http://localhost:8000/storage/plat1.jpeg", "titre" => "Plat 1", "description" => "Delicious plat 1"],
                ["img" => "http://localhost:8000/storage/plat2.jpeg", "titre" => "Plat 2", "description" => "Delicious plat 2"],
                ["img" => "http://localhost:8000/storage/plat3.jpeg", "titre" => "Plat 3", "description" => "Delicious plat 3"],
                ["img" => "http://localhost:8000/storage/plat4.jpeg", "titre" => "Plat 4", "description" => "Delicious plat 4"],
                ["img" => "http://localhost:8000/storage/plat5.jpeg", "titre" => "Plat 5", "description" => "Delicious plat 5"],
                ["img" => "http://localhost:8000/storage/plat6.jpeg", "titre" => "Plat 6", "description" => "Delicious plat 6"],
            ],
            'fullBox' => [
                ["img" => "http://localhost:8000/storage/full1.jpeg", "titre" => "Full Box 1", "description" => "Complete meal in a box 1"],
                ["img" => "http://localhost:8000/storage/full2.jpeg", "titre" => "Full Box 2", "description" => "Complete meal in a box 2"],
                ["img" => "http://localhost:8000/storage/full3.jpeg", "titre" => "Full Box 3", "description" => "Complete meal in a box 3"],
                ["img" => "http://localhost:8000/storage/full4.jpeg", "titre" => "Full Box 4", "description" => "Complete meal in a box 4"],
                ["img" => "http://localhost:8000/storage/full5.jpeg", "titre" => "Full Box 5", "description" => "Complete meal in a box 5"],
                ["img" => "http://localhost:8000/storage/full6.jpeg", "titre" => "Full Box 6", "description" => "Complete meal in a box 6"],
            ],
            'boissons' => [
                ["img" => "http://localhost:8000/storage/Boisson1.jpeg", "titre" => "Boisson-Cola Deal 1", "description" => "Refreshing Boisson-Cola with meal 1"],
                ["img" => "http://localhost:8000/storage/Boisson2.jpeg", "titre" => "Boisson-Cola Deal 2", "description" => "Refreshing Boisson-Cola with meal 2"],
                ["img" => "http://localhost:8000/storage/Boisson3.jpeg", "titre" => "Boisson-Cola Deal 3", "description" => "Refreshing Boisson-Cola with meal 3"],
                ["img" => "http://localhost:8000/storage/Boisson4.jpeg", "titre" => "Boisson-Cola Deal 4", "description" => "Refreshing Boisson-Cola with meal 4"],
                ["img" => "http://localhost:8000/storage/Boisson5.jpeg", "titre" => "Boisson-Cola Deal 5", "description" => "Refreshing Boisson-Cola with meal 5"],
                ["img" => "http://localhost:8000/storage/Boisson6.jpeg", "titre" => "Boisson-Cola Deal 6", "description" => "Refreshing Boisson-Cola with meal 6"],
            ],
        ];

        // Insertion des repas dans la table `meals`
        foreach ($mealsData as $category => $meals) {
            foreach ($meals as $meal) {
                Meal::create([
                    'meal_img' => $meal['img'],
                    'meal_title' => $meal['titre'],
                    'meal_description' => $meal['description'],
                    'meal_categorie' => $category, // Associer chaque repas à la catégorie
                ]);
            }
        }
    }
}

