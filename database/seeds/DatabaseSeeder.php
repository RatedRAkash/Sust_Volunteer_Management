<?php

use Illuminate\Database\Seeder;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory('App\User',20)->create();
        factory('App\Organization',20)->create();
        factory('App\Events',20)->create();

        $catagories=[
            'Science Fest', 'Concert', 'Conference', 'Carnival', 'Reunion', 'Convocation','Others'
        ];
        foreach ($catagories as $catagory){
            Category::create(['name'=>$catagory]);
        }
    }
}
