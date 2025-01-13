<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BioIdsSeeder;
use Database\Seeders\CommitteeOfficerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BioIdsSeeder::class,
            SettingsSeeder::class,
            CommitteeOfficerSeeder::class,
        ]);
    }
}
