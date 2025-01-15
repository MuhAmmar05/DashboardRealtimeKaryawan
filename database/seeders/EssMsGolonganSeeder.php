<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EssMsGolonganSeeder extends Seeder
{
    public function run()
    {
        DB::table('ess_msgolongan')->insert([
            [
                'gol_desc' => 'I',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'agnes.k',
                'gol_created_date' => '2017-01-17 13:41:10.630',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
            [
                'gol_desc' => 'II',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'agnes.k',
                'gol_created_date' => '2017-01-17 13:41:10.630',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
            [
                'gol_desc' => 'III',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'agnes.k',
                'gol_created_date' => '2017-01-17 13:41:10.630',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
            [
                'gol_desc' => 'IV',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'agnes.k',
                'gol_created_date' => '2017-01-17 13:41:10.630',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
            [
                'gol_desc' => 'V',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'agnes.k',
                'gol_created_date' => '2017-01-17 13:41:10.630',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
            [
                'gol_desc' => 'VI',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'agnes.k',
                'gol_created_date' => '2017-01-17 13:41:10.630',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
            [
                'gol_desc' => 'VII',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'agnes.k',
                'gol_created_date' => '2017-01-17 13:41:10.630',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
            [
                'gol_desc' => '[Unknown]',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'yosep.setiawan',
                'gol_created_date' => '2017-02-01 09:50:46.017',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
            [             
                'gol_desc' => '[ABS/Outsourcing]',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'yosep.setiawan',
                'gol_created_date' => '2017-06-06 00:00:00.000',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
            [
                'gol_desc' => '[DOSEN LUAR]',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'yosep.setiawan',
                'gol_created_date' => '2017-09-02 00:00:00.000',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
            [
                'gol_desc' => '[ATALIAN]',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'yosep.setiawan',
                'gol_created_date' => '2019-10-01 15:15:00.000',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
            [
                'gol_desc' => '[MAGANG]',
                'gol_status' => 'Aktif',
                'gol_created_by' => 'yosep.setiawan',
                'gol_created_date' => '2021-01-15 16:40:00.000',
                'gol_modif_by' => null,
                'gol_modif_date' => null
            ],
        ]);
    }
}
