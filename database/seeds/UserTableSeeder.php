<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 30)->create();
        $user = \App\User::find(1);
        $user->name = 'Mrs Gao';
        $user->email = '15163640385';
        $user->password = bcrypt('gaobin');
        $user->is_admin = true;
        $user->save();
//        DB::table('users')->insert(
//            [
//                'name' => str_random(10),
//                'email' => str_random(10) . '@gmail.com',
//                'password' => bcrypt('secret'),
//            ]);
    }
}
