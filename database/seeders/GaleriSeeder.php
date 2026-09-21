<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['file' => 'galeri-1.jpg', 'caption' => 'Kegiatan MPLS Tahun Ajaran 2026/2027'],
            ['file' => 'galeri-2.jpg', 'caption' => 'Latihan Marching Band Gitamadhuswara'],
            ['file' => 'galeri-3.jpg', 'caption' => 'Pelepasan Siswa PKL'],
            ['file' => 'galeri-4.jpg', 'caption' => 'Uji Kompetensi Keahlian (UKK)'],
            ['file' => 'galeri-5.jpg', 'caption' => 'Juara LKS Tingkat Kabupaten'],
            ['file' => 'galeri-6.jpg', 'caption' => 'Suasana Praktik di Laboratorium'],
        ];

        foreach ($data as $i => $g) {
            Galeri::updateOrCreate(
                ['file' => $g['file']],
                array_merge($g, ['urutan' => $i])
            );
        }
    }
}