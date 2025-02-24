<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run()
    {

        // Ajouter les 3 plans directement
        Plan::create([
            'titre' => 'باقة إقتصادية',
            'start_date' => '2024-02-15',
            'end_date' => '2024-02-15',
            'price' => 145,
            'daysAvailable' => 'الإثنين، الثلاثاء، الأربعاء، الخميس، الجمعة',
        ]);

        Plan::create([
            'titre' => 'باقة متوسطة',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-20',
            'price' => 195,
            'daysAvailable' => 'الإثنين، الثلاثاء، الأربعاء، الخميس، الجمعة',
        ]);

        Plan::create([
            'titre' => 'باقة بريميوم',
            'start_date' => '2024-02-25',
            'end_date' => '2024-02-25',
            'price' => 255,
            'daysAvailable' => 'الإثنين، الثلاثاء، الأربعاء، الخميس، الجمعة',
        ]);
    }
}
