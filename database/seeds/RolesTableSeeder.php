<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'type' => 'admin',
            'name' => '管理者',
        ]);

        DB::table('roles')->insert([
            'type' => 'staff',
            'name' => 'スタッフ',
        ]);
    }
}
