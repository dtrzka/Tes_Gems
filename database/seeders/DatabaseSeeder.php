<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Spl_req;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nip' => '01001092001',
            'role' => 0, //karyawan
            'password' => bcrypt('test123'),
        ]);

        User::create([
            'nip' => '01001091988',
            'role' => 1, //manager
            'password' => bcrypt('test123'),
        ]);

        Spl_req::create([
            'id' => 'SPL001',
            'nama' => 'Daniel Andrian',
            'manager' => 'Budi Erwandi',
            'tanggal_lembur' => '2024-08-25',
            'jam_mulai' => '08:00',
            'jam_selesai' => '17:00',
            'durasi' => '9',
            'pekerjaan' => 'Supervisi pengerjaan piping',
            'posisi' => 'Junior Piping Engineer',
            'status' => 'Menunggu Persetujuan'
        ]);

    }
}
