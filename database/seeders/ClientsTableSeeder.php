<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        // Créer des clients fictifs sans `order_id`
        $clients = [
            [
                'full_name' => 'John Doe',
                'phone' => '0123456789',
                'adresse' => '123 Main St, Cityville',
                'plan_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'full_name' => 'Jane Smith',
                'phone' => '0987654321',
                'adresse' => '456 Side St, Townsville',
                'plan_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'full_name' => 'Alice Johnson',
                'phone' => '111222333',
                'adresse' => '789 Another St, Villageville',
                'plan_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insérer les clients et récupérer leurs IDs
        foreach ($clients as &$client) {
            $client['id'] = DB::table('clients')->insertGetId($client);
        }

        // Mettre à jour les clients avec leur ID
        $this->command->info('Clients insérés avec succès.');
    }
}
