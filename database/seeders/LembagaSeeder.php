<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengurus;

class LembagaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // --- PENANGGUNG JAWAB (INTI) ---
            ['kategori' => 'Lembaga', 'bidang' => null, 'jabatan' => 'Penanggungjawab', 'nama' => 'Rachisatul Wachidah, S.Pd', 'position' => 1],

            // --- 1. IAF NU ---
            ['kategori' => 'Lembaga', 'bidang' => 'Ikatan Alumni Fatayat Nahdlatul Ulama (IAF NU)', 'jabatan' => 'Koordinator', 'nama' => 'Hj. Siti Fadhilah, SE, S.Pd.', 'position' => 2],
            ['kategori' => 'Lembaga', 'bidang' => 'Ikatan Alumni Fatayat Nahdlatul Ulama (IAF NU)', 'jabatan' => 'Anggota', 'nama' => 'Hidayatul Ismiyah', 'position' => 3],
            ['kategori' => 'Lembaga', 'bidang' => 'Ikatan Alumni Fatayat Nahdlatul Ulama (IAF NU)', 'jabatan' => 'Anggota', 'nama' => 'Muntianah', 'position' => 4],

            // --- 2. FORDAF ---
            ['kategori' => 'Lembaga', 'bidang' => 'Forum Da’iyah Fatayat Nahdlatul Ulama (FORDAF)', 'jabatan' => 'Koordinator', 'nama' => 'Siti Hidayati', 'position' => 5],
            ['kategori' => 'Lembaga', 'bidang' => 'Forum Da’iyah Fatayat Nahdlatul Ulama (FORDAF)', 'jabatan' => 'Anggota', 'nama' => 'Siti Mastukah', 'position' => 6],
            ['kategori' => 'Lembaga', 'bidang' => 'Forum Da’iyah Fatayat Nahdlatul Ulama (FORDAF)', 'jabatan' => 'Anggota', 'nama' => 'Untsa Nailil Muna, S.Pd.I.', 'position' => 7],

            // --- 3. IHF ---
            ['kategori' => 'Lembaga', 'bidang' => 'Ikatan Hafidhoh Fatayat Nahdlatul Ulama (IHF)', 'jabatan' => 'Koordinator', 'nama' => 'Alfiyah, AH.', 'position' => 8],
            ['kategori' => 'Lembaga', 'bidang' => 'Ikatan Hafidhoh Fatayat Nahdlatul Ulama (IHF)', 'jabatan' => 'Anggota', 'nama' => 'Hj. Istikharatul Lutfiana Junaidi, AH.', 'position' => 9],
            ['kategori' => 'Lembaga', 'bidang' => 'Ikatan Hafidhoh Fatayat Nahdlatul Ulama (IHF)', 'jabatan' => 'Anggota', 'nama' => 'Siti Rofiatul Hanik, S.Pd., AH.', 'position' => 10],

            // --- 4. KOPERASI ---
            ['kategori' => 'Lembaga', 'bidang' => 'Koperasi', 'jabatan' => 'Koordinator', 'nama' => 'Sofiatun, S.Pd.I, M.Pd', 'position' => 11],
            ['kategori' => 'Lembaga', 'bidang' => 'Koperasi', 'jabatan' => 'Anggota', 'nama' => 'Wiwit Silviyani, S.Ak', 'position' => 12],
            ['kategori' => 'Lembaga', 'bidang' => 'Koperasi', 'jabatan' => 'Anggota', 'nama' => 'Mukhoyyaroh', 'position' => 13],

            // --- 5. LKP3A ---
            ['kategori' => 'Lembaga', 'bidang' => 'Lembaga Konsultasi Pemberdayaan Perempuan dan Perlindungan Anak (LKP3A)', 'jabatan' => 'Koordinator', 'nama' => 'Nur Eva Nisfianti, S.Pd', 'position' => 14],
            ['kategori' => 'Lembaga', 'bidang' => 'Lembaga Konsultasi Pemberdayaan Perempuan dan Perlindungan Anak (LKP3A)', 'jabatan' => 'Anggota', 'nama' => 'Nur Azizah, S.Pd.I, S.Pd.', 'position' => 15],
            ['kategori' => 'Lembaga', 'bidang' => 'Lembaga Konsultasi Pemberdayaan Perempuan dan Perlindungan Anak (LKP3A)', 'jabatan' => 'Anggota', 'nama' => 'Susianik', 'position' => 16],

            // --- 6. GARFA ---
            ['kategori' => 'Lembaga', 'bidang' => 'Garda Fatayat (GARFA)', 'jabatan' => 'Komandan', 'nama' => 'Sa\'diyah', 'position' => 17],
            ['kategori' => 'Lembaga', 'bidang' => 'Garda Fatayat (GARFA)', 'jabatan' => 'Wakil Komandan', 'nama' => 'Fitriyatus Sholikah', 'position' => 18],
            ['kategori' => 'Lembaga', 'bidang' => 'Garda Fatayat (GARFA)', 'jabatan' => 'Anggota', 'nama' => 'Ani Muflihah, S.Pd', 'position' => 19],
            ['kategori' => 'Lembaga', 'bidang' => 'Garda Fatayat (GARFA)', 'jabatan' => 'Anggota', 'nama' => 'Hj. Anik W', 'position' => 20],
        ];

        foreach ($data as $item) {
            Pengurus::create($item);
        }
    }
}