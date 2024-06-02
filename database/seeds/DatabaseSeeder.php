<?php

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
         $this->call(UserSeeder::class);
         $this->call(lineSeeder::class);
         $this->call(typeSeeder::class);
         $this->call(sublineSeeder::class);
         $this->call(subline_topicSeeder::class);
<<<<<<< HEAD
    
=======
>>>>>>> 6a68d8b39a244f338ee21e48eeadb6b5b739a18e
    }
    
}
