<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Camp;
use Str;

class CampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camps = [
            [
                'title' => 'Gila Belajar',
                'slug' => Str::slug('Gila Belajar'),
                'price' => 280,
                // 'created_at' => date('Y-m-dd H:i:s', time()),
                // 'updated_at' => date('Y-m-dd H:i:s', time()),
            ],
            [
                'title' => 'Baru Mulai',
                'slug' => Str::slug('Baru Mulai'),
                'price' => 140,
                // 'created_at' => date('Y-m-dd H:i:s', time()),
                // 'updated_at' => date('Y-m-dd H:i:s', time()),
            ],
        ];

        foreach ($camps as $camp){
            Camp::create($camp);
        }
    }
}
