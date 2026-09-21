<?php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Seeder;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['slug' => 'gitamadhuswara', 'nama' => 'Marching Band Gitamadhuswara', 'logo' => 'logo-gitamadhuswara.jpeg', 'deskripsi' => 'Marching Band Gitamadhuswara aktif tampil dalam berbagai acara sekolah maupun kegiatan kemasyarakatan seperti pawai HUT Kemerdekaan RI.', 'foto' => ['gita-1.jpg', 'gita-2.jpg', 'gita-3.jpg']],
            ['slug' => 'pramuka', 'nama' => 'Pramuka', 'logo' => 'logo-pramuka.jpeg', 'deskripsi' => 'Ekstrakurikuler wajib yang melatih kedisiplinan, kemandirian, dan jiwa kepemimpinan siswa melalui kegiatan kepramukaan.', 'foto' => ['pramuka-1.jpg', 'pramuka-2.jpg', 'pramuka-3.jpg']],
            ['slug' => 'paskibra', 'nama' => 'Paskibra', 'logo' => 'logo-paskibra.jpeg', 'deskripsi' => 'Melatih siswa dalam baris-berbaris dan tata upacara, dipersiapkan untuk bertugas sebagai pengibar bendera pada upacara sekolah maupun tingkat kecamatan/kabupaten.', 'foto' => ['paskibra-1.jpg', 'paskibra-2.jpg', 'paskibra-3.jpg']],
            ['slug' => 'pmr', 'nama' => 'PMR (Palang Merah Remaja)', 'logo' => 'logo-pmr.jpeg', 'deskripsi' => 'Membekali siswa dengan pengetahuan pertolongan pertama dan kepedulian sosial di lingkungan sekolah.', 'foto' => ['pmr-1.jpg', 'pmr-2.jpg', 'pmr-3.jpg']],
            ['slug' => 'rohis', 'nama' => 'Rohis', 'logo' => 'logo-rohis.jpeg', 'deskripsi' => 'Wadah pembinaan keagamaan siswa melalui kajian rutin dan kegiatan keislaman di lingkungan sekolah.', 'foto' => ['rohis-1.jpg', 'rohis-2.jpg', 'rohis-3.jpg']],
            ['slug' => 'voli', 'nama' => 'Bola Voli', 'logo' => 'logo-voli.jpeg', 'deskripsi' => 'Melatih kekompakan tim dan kebugaran fisik siswa melalui latihan rutin bola voli, aktif mengikuti pertandingan antar sekolah.', 'foto' => ['voli-1.jpg', 'voli-2.jpg', 'voli-3.jpg']],
            ['slug' => 'futsal', 'nama' => 'Futsal', 'logo' => 'logo-futsal.jpeg', 'deskripsi' => 'Mengasah kemampuan dan sportivitas siswa dalam olahraga futsal melalui latihan rutin dan kompetisi antar kelas maupun sekolah lain.', 'foto' => ['futsal-1.jpg', 'futsal-2.jpg', 'futsal-3.jpg']],
            ['slug' => 'sinematografi', 'nama' => 'Sinematografi', 'logo' => 'logo-cinemak.jpeg', 'deskripsi' => 'Wadah bagi siswa yang berminat di bidang fotografi, videografi, dan pembuatan film pendek, sekaligus mendokumentasikan kegiatan sekolah.', 'foto' => ['sinematografi-1.jpg', 'sinematografi-2.jpg', 'sinematografi-3.jpg']],
        ];

        foreach ($data as $i => $item) {
            $foto = $item['foto'];
            unset($item['foto']);

            $ekskul = Ekstrakurikuler::updateOrCreate(
                ['slug' => $item['slug']],
                array_merge($item, ['urutan' => $i])
            );

            $ekskul->fotos()->delete();
            foreach ($foto as $j => $f) {
                $ekskul->fotos()->create(['file' => $f, 'urutan' => $j]);
            }
        }
    }
}