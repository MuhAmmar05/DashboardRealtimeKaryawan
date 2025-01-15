<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EssMsJabatanSeeder extends Seeder
{
    public function run()
    {
        DB::table('ess_msjabatan')->insert([
            [
                'jab_desc' => 'Staff',
                'jab_status' => 'Aktif',
                'jab_created_by' => 'yosep.setiawan',
                'jab_created_date' => '2017-01-17 13:43:38.270',
                'jab_modif_by' => null,
                'jab_modif_date' => null,
                'jab_order' => 1
            ],
            [
                'jab_desc' => 'Kepala Seksi',
                'jab_status' => 'Aktif',
                'jab_created_by' => 'yosep.setiawan',
                'jab_created_date' => '2017-01-17 13:43:38.270',
                'jab_modif_by' => null,
                'jab_modif_date' => null,
                'jab_order' => 2
            ],
            [
                'jab_desc' => 'Kepala Departemen',
                'jab_status' => 'Aktif',
                'jab_created_by' => 'yosep.setiawan',
                'jab_created_date' => '2017-01-17 13:43:38.270',
                'jab_modif_by' => null,
                'jab_modif_date' => null,
                'jab_order' => 3
            ],
            [
                'jab_desc' => 'Wakil Direktur',
                'jab_status' => 'Aktif',
                'jab_created_by' => 'yosep.setiawan',
                'jab_created_date' => '2017-01-17 13:43:38.270',
                'jab_modif_by' => null,
                'jab_modif_date' => null,
                'jab_order' => 4
            ],
            [
                'jab_desc' => 'Direktur',
                'jab_status' => 'Aktif',
                'jab_created_by' => 'yosep.setiawan',
                'jab_created_date' => '2017-01-17 13:43:38.270',
                'jab_modif_by' => null,
                'jab_modif_date' => null,
                'jab_order' => 5
            ],
            [
                'jab_desc' => 'Sekretaris Prodi',
                'jab_status' => 'Aktif',
                'jab_created_by' => 'yosep.setiawan',
                'jab_created_date' => '2017-01-17 13:43:38.270',
                'jab_modif_by' => null,
                'jab_modif_date' => null,
                'jab_order' => 6
            ]
        ]);
    }
}
