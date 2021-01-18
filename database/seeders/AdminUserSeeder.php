<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin1 = new User();
        $admin1->name = "Adams P. Kamanu";
        $admin1->email = "akamanu@hydroiq.com";
        $admin1->password = bcrypt('secret');

        $admin2 = new User();
        $admin2->name = "Eunice N. Ondiek";
        $admin2->email = "eondiek@hydroiq.com";
        $admin2->password = bcrypt('secret');
    }
}
