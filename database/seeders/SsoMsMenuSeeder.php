<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SsoMsMenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('sso_msmenu')->insert([
            [
                'app_id' => 'APP01',
                'rol_id' => 'ROL01',
                'men_nama' => 'Dashboard',
                'men_link' => '#',
                'men_status' => 'Aktif',
                'men_created_by' => 'yosep.setiawan',
                'men_created_date' => '2024-06-13 09:06:00.000',
                'men_modif_by' => null,
                'men_modif_date' => null
            ],
            [
                'app_id' => 'APP01',
                'rol_id' => 'ROL01',
                'men_nama' => 'Pencarian',
                'men_link' => 'pencarian',
                'men_status' => 'Aktif',
                'men_created_by' => 'yosep.setiawan',
                'men_created_date' => '2024-06-13 09:06:00.000',
                'men_modif_by' => null,
                'men_modif_date' => null
            ],
            [
                'app_id' => 'APP01',
                'rol_id' => 'ROL01',
                'men_nama' => 'Upload Excel',
                'men_link' => 'upload_excel',
                'men_status' => 'Aktif',
                'men_created_by' => 'yosep.setiawan',
                'men_created_date' => '2024-06-13 09:06:00.000',
                'men_modif_by' => null,
                'men_modif_date' => null
            ],
            [
                'app_id' => 'APP01',
                'rol_id' => 'ROL02',
                'men_nama' => 'Dashboard',
                'men_link' => '#',
                'men_status' => 'Aktif',
                'men_created_by' => 'yosep.setiawan',
                'men_created_date' => '2024-06-13 09:06:00.000',
                'men_modif_by' => null,
                'men_modif_date' => null
            ]
        ]);
    }
}
