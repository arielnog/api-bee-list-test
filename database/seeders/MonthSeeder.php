<?php

namespace Database\Seeders;

use App\Models\Month;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $month =
            [
                [
                    'id' => 1,
                    'name' => "Janeiro",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => 2,
                    'name' => "Fevereiro",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => 3,
                    'name' => "Março",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => 4,
                    'name' => "Abril",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => 5,
                    'name' => "Maio",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => 6,
                    'name' => "Junho",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => 7,
                    'name' => "Julho",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => 8,
                    'name' => "Agosto",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => 9,
                    'name' => "Setembro",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => 10,
                    'name' => "Outubro",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => 11,
                    'name' => "Novembro",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => 12,
                    'name' => "Dezembro",
                    'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ];
        Month::insert($month);
    }
}
