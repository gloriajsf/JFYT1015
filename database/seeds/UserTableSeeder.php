<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
	            'name' => 'yashi',
	            'email' => 'yashi@gmail.com',
	            'password' => bcrypt('secret'),
	            'group_id' => 1,
	            'created_at' => Carbon::now()->toDateTimeString(),
	            'updated_at' => Carbon::now()->toDateTimeString(),
	        ],
	        [
	            'name' => 'js',
	            'email' => 'js@gmail.com',
	            'password' => bcrypt('fang'),
	            'group_id' => 2,
	            'created_at' => Carbon::now()->toDateTimeString(),
	            'updated_at' => Carbon::now()->toDateTimeString(),
	        ]
        ]);
    }
}
