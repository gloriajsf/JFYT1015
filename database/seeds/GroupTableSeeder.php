<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
        	[
	            'id' => 1,
	            'name' => 'admin',
	            'created_at' => Carbon::now()->toDateTimeString(),
	            'updated_at' => Carbon::now()->toDateTimeString()
        	],
	        [
	            'id' => 2,
	            'name' => 'user',
	            'created_at' => Carbon::now()->toDateTimeString(),
	            'updated_at' => Carbon::now()->toDateTimeString(),
	        ]
        ]);
    }
}
