<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SsoMsUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('sso_msuser')->insert([
            [
                'usr_id' => 'ammar.muzz',
                'rol_id' => 'ROL01',
                'app_id' => 'APP01',
                'usr_password' => 'admin123',
                'usr_status' => 'Aktif',
                'usr_created_by' => 'yosep.setiawan',
                'usr_created_date' => '2024-06-13 09:06:00.000',
                'usr_modif_by' => null,
                'usr_modif_date' => null
            ],
            [
                'usr_id' => 'putri.nur',
                'rol_id' => 'ROL02',
                'app_id' => 'APP01',
                'usr_password' => 'manajemen123',
                'usr_status' => 'Aktif',
                'usr_created_by' => 'yosep.setiawan',
                'usr_created_date' => '2024-06-13 09:06:00.000',
                'usr_modif_by' => null,
                'usr_modif_date' => null
            ],
        ]);
    }
}
