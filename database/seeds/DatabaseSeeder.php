<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call('UserTableSeeder');
		\App\Models\User::create([
			'email' => 'admin@cxsir.com',
			'password' => \Illuminate\Support\Facades\Hash::make('123456')
		]);
    }
}
