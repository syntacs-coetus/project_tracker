<?php

use Illuminate\Database\Seeder;

class SystemAdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_accounts')->insert(
            [
            'user_name'           => 'AtraXaz',
            'user_email'          => 'syntacs.2019@gmail.com',
            'user_pass'           => make::hash('ShaneTacs2018'),
            'user_administrator'  => 1,
            'user_admin_override' => 1
            ]
        );
    }
}
