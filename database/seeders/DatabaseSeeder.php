<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\User;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            
        Event::factory()->create([
            'name' => 'Nirvana', 'description' => '“Nor is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but occasionally circumstance',
            'image' => 'https://i.etsystatic.com/22453392/r/il/4e3db8/3178301500/il_570xN.3178301500_b8lb.jpg',
            'spaces' => '30', 'location' => 'Gent/Belgica',
            'date' => '2022-10-01'
        ]);
        Event::factory()->create([
            'name' => 'OTRO PARA PROBAR', 'description' => '“Nor is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but occasionally circumstance',
            'image' => 'https://i.etsystatic.com/22453392/r/il/4e3db8/3178301500/il_570xN.3178301500_b8lb.jpg',
            'spaces' => '30', 'location' => 'Gent/Belgica',
            'date' => '2022-10-01'
        ]);
        

        User::factory()->create(['name'=>'admin','email'=>'admin@festiland.com','isAdmin'=>true]);
        User::factory()->create(['name'=>'fran','email'=>'fran@festiland.com','isAdmin'=>false]);
        User::factory()->create(['name'=>'inma','email'=>'inma@festiland.com','isAdmin'=>false]);
    }
}
