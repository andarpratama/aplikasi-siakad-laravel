<?php

namespace Database\Seeders;

use App\Models\Identitas;
use App\Models\User;
use App\Models\UserAdmin;
use App\Models\UserStudents;
use App\Models\UserTeacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'superadmin',
        ]);

        User::create([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'teacher',
        ]);

        User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'tata usaha',
            'email' => 'tata_usaha@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'administrator',
        ]);

        UserStudents::create([
            'user_id' => 3,
            'nis' => 1,
            'tempat_lahir' => 'tangerang',
            'tanggal_lahir' => '2022-05-06',
            'asal_sekolah' => 'sdn susi',
            'nama_ayah' => 'ayah1',
            'nama_ibu' => 'ibu1',
            'kelas_id' => 1,
            'ruangan_id' => 1
        ]);

        UserTeacher::create([
            'user_id' => 2,
            'nip' => 1,
            'gelar' => 'S1',
            'pendidikan' => 'strata 1',
            'alamat' => 'tangerang',
            'no_telp' => '08123234934',
            'kelas_id' => 1
        ]);

        UserAdmin::create([
            'user_id' => 4,
            'nitp' => '0938930930',
            'alamat' => 'tangerang',
            'no_telp' => '08129043093'
        ]);

        Identitas::create([
            'nama' => 'SMP Susi',
            'npsn' => '9030303013',
            'nss' => '39030303',
            'alamat' => 'tangerang',
            'kode_pos' => '19349',
            'no_telp' => '08129499030',
            'kelurahan' => 'pasar kemis',
            'kecamatan' => 'pasar kemis',
            'kota' => 'tangerang',
            'provinsi' => 'banten',
            'website' => 'smpsusi.com',
            'email' => 'smpsusi@gmail.com'
        ]);
    }
}
