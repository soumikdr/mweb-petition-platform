<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommitteeOfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                'name' => 'John Doe',
                'email' => 'admin@petition.parliament.sr',
                'password' => bcrypt('2025%shangrila'),
                'user_type' => 'OFFICER',
            ]
        );
    }
}
