<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Table;
use App\Models\Comanda;
use App\Models\ComandaItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Product::factory(50)->create();
        Table::factory(10)->create();
        Comanda::factory(10)->create();

        // \App\Models\User::factory(10)->create();

        Product::factory()->create([
            'name'    => 'X-Filé',
            'value'   => 16,
            'tag'     => 'xis', 
            'prepare' => '20'
         ]);

         Product::factory()->create([
            'name'    => 'X-Calabresa',
            'value'   => 14,
            'tag'     => 'xis', 
            'prepare' => '20'
         ]);

         Product::factory()->create([
            'name'    => 'X-Coração',
            'value'   => 19,
            'tag'     => 'Xis', 
            'prepare' => '20'
         ]);

         Product::factory()->create([
            'name'    => 'Refrigerante',
            'value'   => 6,
            'tag'     => 'refri', 
            'prepare' => '0'
         ]);

         Product::factory()->create([
            'name'    => 'Suco de Laranja',
            'value'   => 10,
            'tag'     => 'suco', 
            'prepare' => '5'
         ]);

        ComandaItem::factory(20)->create();

    }
}
