<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SsoMsAplikasiSeeder extends Seeder
{
    public function run()
    {
        DB::table('sso_msaplikasi')->insert([
            [
                'app_id' => 'APP01',
                'app_deskripsi' => 'Dashboard Realtime DataKaryawan',
                'app_status' => 'Aktif',
                'app_created_by' => 'yosep.setiawan',
                'app_created_date' => '2024-03-01 00:00:00.000',
                'app_modif_by' => null,
                'app_modif_date' => null
            ]
        ]);
    }
}
