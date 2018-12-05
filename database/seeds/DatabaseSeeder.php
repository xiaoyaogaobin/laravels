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
//         $this->call(UsersTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(GategoriesTablSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(RoleTableSeeder::class);
    }
}
