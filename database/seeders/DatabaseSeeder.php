<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EventModel;
use App\Models\User;
use Illuminate\Console\Scheduling\Event;
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
            
        EventModel::factory()->create([
            'name'=>'','description'=>'','images'=>'','spaces'=>'','location'=>'','date'=>'',
        ]);
        

        User::factory()->create(['name'=>'admin','email'=>'admin@festiland.com','isAdmin'=>true]);
        User::factory()->create(['name'=>'fran','email'=>'fran@festiland.com','isAdmin'=>false]);
        User::factory()->create(['name'=>'inma','email'=>'inma@festiland.com','isAdmin'=>false]);
    }
}
