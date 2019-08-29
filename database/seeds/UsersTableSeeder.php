<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ефременко Алексей Васильевич',
            'email' => 'alexeyefr@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'type' => 'ind',
            'role' => 'admin',
            'created_at' => now(),
        ]);
        $user_id = DB::table('users')->get()->last()->id;
        DB::table('user_details')->insert([
            'user_id' => $user_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        factory(User::class, 10)->create()->each(function ($u) {
            $u->details()->create();
        });
    }
}
