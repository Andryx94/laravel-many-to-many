<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 5; $i++) {
        $new_user = new User();
        $new_user->name = $faker->name;
        $new_user->email = $faker->email;
        $new_user->password = Hash::make('password', ['rounds' => 12,]);
        $new_user->save();
      }
    }
}
