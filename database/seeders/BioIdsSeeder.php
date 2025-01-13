<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BioIdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['code' => '1K3JTWHA05', 'used' => false],
            ['code' => '1PUQV970LA', 'used' => false],
            ['code' => '2BIB99Z54V', 'used' => false],
            ['code' => '2WYIM3QCK9', 'used' => false],
            ['code' => '30MY51J1CJ', 'used' => false],
            ['code' => '340B1EOCMG', 'used' => false],
            ['code' => '49YFTUA96K', 'used' => false],
            ['code' => '4HTOAI9YKO', 'used' => false],
            ['code' => '6EBQ28A62V', 'used' => false],
            ['code' => '6X6I6TSUFG', 'used' => false],
            ['code' => '7DMPYAZAP2', 'used' => false],
            ['code' => '88V3GKIVSF', 'used' => false],
            ['code' => '8OLYIE2FRC', 'used' => false],
            ['code' => '9JSXWO4LGH', 'used' => false],
            ['code' => 'ABQYUQCQS2', 'used' => false],
            ['code' => 'AT66BX2FXM', 'used' => false],
            ['code' => 'BPX8O0YB5L', 'used' => false],
            ['code' => 'BZW5WWDMUY', 'used' => false],
            ['code' => 'C7IFP4VWIL', 'used' => false],
            ['code' => 'CCU1D7QXDT', 'used' => false],
            ['code' => 'CET8NUAE09', 'used' => false],
            ['code' => 'CG1I9SABLL', 'used' => false],
            ['code' => 'D05HPPQNJ4', 'used' => false],
            ['code' => 'DHKFIYHMAZ', 'used' => false],
            ['code' => 'E7D6YUPQ6J', 'used' => false],
            ['code' => 'F3ATSRR5DQ', 'used' => false],
            ['code' => 'FH6260T08H', 'used' => false],
            ['code' => 'FINNMWJY0G', 'used' => false],
            ['code' => 'FPALKDEL5T', 'used' => false],
            ['code' => 'GOYWJVDA8A', 'used' => false],
            ['code' => 'H5C98XCENC', 'used' => false],
            ['code' => 'JHDCXB62SA', 'used' => false],
            ['code' => 'K1YL8VA2HG', 'used' => false],
            ['code' => 'LZK7P0X0LQ', 'used' => false],
            ['code' => 'O0V55ENOT0', 'used' => false],
            ['code' => 'O3WJFGR5WE', 'used' => false],
            ['code' => 'PD6XPNB80J', 'used' => false],
            ['code' => 'PGPVG5RF42', 'used' => false],
            ['code' => 'QJXQOUPTH9', 'used' => false],
            ['code' => 'QTLCWUS8NB', 'used' => false],
            ['code' => 'RYU8VSS4N5', 'used' => false],
            ['code' => 'S22A588D75', 'used' => false],
            ['code' => 'SEIQTS1H16', 'used' => false],
            ['code' => 'TLFDFY7RDG', 'used' => false],
            ['code' => 'TTK74SYYAN', 'used' => false],
            ['code' => 'V2JX0IC633', 'used' => false],
            ['code' => 'V30EPKZQI2', 'used' => false],
            ['code' => 'VQKBGSE3EA', 'used' => false],
            ['code' => 'X16V7LFHR2', 'used' => false],
            ['code' => 'Y4FC3F9ZGS', 'used' => false],
        ];

        DB::table('bio_ids')->insert($data);
    }
}
