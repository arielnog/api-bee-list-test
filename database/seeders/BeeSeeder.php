<?php

namespace Database\Seeders;

use App\Models\Bee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bee =
            [
                [
                    'name' => "Uruçu",
                    'scientific_name' => "Melipona scutellaris",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => "Uruçu-Amarela",
                    'scientific_name' => "Melipona rufiventris",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => "Guarupu",
                    'scientific_name' => "Melipona bicolor",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => "Iraí",
                    'scientific_name' => "Nannotrigona testaceicornes",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ];
        Bee::insert($bee);
    }
}
