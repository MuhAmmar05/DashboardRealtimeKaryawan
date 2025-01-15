<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SsoMsRoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('sso_msrole')->insert([
            [
                'rol_id' => 'ROL01',
                'rol_deskripsi' => 'DSD',
                'rol_status' => 'Aktif',
                'rol_created_by' => 'yosep.setiawan',
                'rol_created_date' => '2017-04-21 00:00:00.000',
                'rol_modif_by' => null,
                'rol_modif_date' => null
            ],
            [
                'rol_id' => 'ROL02',
                'rol_deskripsi' => 'MANAJEMEN',
                'rol_status' => 'Aktif',
                'rol_created_by' => 'yosep.setiawan',
                'rol_created_date' => '2017-04-21 00:00:00.000',
                'rol_modif_by' => null,
                'rol_modif_date' => null
            ]
        ]);
    }
}
