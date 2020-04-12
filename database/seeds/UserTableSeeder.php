<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['admin'];
        $email = ['admin@admin.com'];
        $password = [bcrypt('admin')];
        $role = ['admin'];
        for ($i=0; $i < count($name); $i++) { 
        	User::create([
        		'name' => $name[$i],
        		'email' => $email[$i],
        		'password' => $password[$i],
        		'role' => $role[$i]
        	]);
        }
    }
}
