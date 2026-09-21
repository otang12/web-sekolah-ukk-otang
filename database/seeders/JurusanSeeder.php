<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'slug' => 'rpl', 'logo' => 'logo-rpl.png',
                'nama' => 'Rekayasa Perangkat Lunak', 'singkatan' => 'RPL',
                'deskripsi' => 'Membekali siswa dengan keahlian pemrograman, pengembangan aplikasi web dan mobile, serta basis data.',
                'deskripsi_panjang' => 'Rekayasa Perangkat Lunak (RPL) merupakan program keahlian yang membekali siswa dengan kompetensi di bidang pengembangan perangkat lunak dan teknologi informasi. Program ini dirancang untuk menghasilkan lulusan yang memiliki kemampuan berpikir logis, analitis, serta mampu mengembangkan solusi berbasis teknologi sesuai kebutuhan dunia industri. Siswa akan mempelajari pemrograman dasar dan lanjutan, pengembangan aplikasi berbasis web dan mobile, serta pengelolaan basis data.',
                'kepala_nama' => 'Nama Kepala Jurusan, S.Kom.', 'kepala_foto' => 'kepala.jpg',
                'guru' => [
                    ['nama' => 'Nama Guru 1, S.Kom.', 'foto' => 'guru-1.jpg'],
                    ['nama' => 'Nama Guru 2, S.T.', 'foto' => 'guru-2.jpg'],
                ],
                'foto_kegiatan' => ['foto-1.jpg', 'foto-2.jpg', 'foto-3.jpg', 'foto-4.jpg'],
            ],
            [
                'slug' => 'bdp', 'logo' => 'logo-bdp.png',
                'nama' => 'Bisnis Daring dan Pemasaran', 'singkatan' => 'BDP',
                'deskripsi' => 'Melatih keterampilan pemasaran digital, strategi bisnis online, dan pengelolaan usaha e-commerce.',
                'deskripsi_panjang' => 'Bisnis Daring dan Pemasaran (BDP) membekali siswa dengan kompetensi di bidang pemasaran digital dan pengelolaan bisnis online. Program ini melatih siswa memahami strategi pemasaran, manajemen usaha, serta penggunaan platform e-commerce untuk mendukung kegiatan bisnis modern.',
                'kepala_nama' => 'Nama Kepala Jurusan, S.E.', 'kepala_foto' => 'kepala.jpg',
                'guru' => [
                    ['nama' => 'Nama Guru 1, S.E.', 'foto' => 'guru-1.jpg'],
                    ['nama' => 'Nama Guru 2, S.Pd.', 'foto' => 'guru-2.jpg'],
                ],
                'foto_kegiatan' => ['foto-1.jpg', 'foto-2.jpg', 'foto-3.jpg', 'foto-4.jpg'],
            ],
            [
                'slug' => 'tkr', 'logo' => 'logo-tkr.png',
                'nama' => 'Teknik Kendaraan Ringan', 'singkatan' => 'TKR',
                'deskripsi' => 'Membekali siswa dengan keahlian perawatan, perbaikan, dan diagnosis kerusakan kendaraan bermotor roda empat.',
                'deskripsi_panjang' => 'Teknik Kendaraan Ringan (TKR) membekali siswa dengan kompetensi perawatan, perbaikan, dan diagnosis kerusakan kendaraan bermotor roda empat. Siswa dilatih langsung menggunakan peralatan bengkel standar industri agar siap terjun ke dunia kerja otomotif.',
                'kepala_nama' => 'Nama Kepala Jurusan, S.T.', 'kepala_foto' => 'kepala.jpg',
                'guru' => [
                    ['nama' => 'Nama Guru 1, S.T.', 'foto' => 'guru-1.jpg'],
                    ['nama' => 'Nama Guru 2, S.Pd.', 'foto' => 'guru-2.jpg'],
                ],
                'foto_kegiatan' => ['foto-1.jpg', 'foto-2.jpg', 'foto-3.jpg', 'foto-4.jpg'],
            ],
            [
                'slug' => 'aphp', 'logo' => 'logo-aphp.png',
                'nama' => 'Agribisnis Pengolahan Hasil Pertanian', 'singkatan' => 'APHP',
                'deskripsi' => 'Membekali siswa dengan keahlian pengolahan, pengawetan, dan pengemasan hasil pertanian menjadi produk bernilai jual.',
                'deskripsi_panjang' => 'Agribisnis Pengolahan Hasil Pertanian (APHP) membekali siswa dengan kompetensi pengolahan, pengawetan, dan pengemasan hasil pertanian menjadi produk bernilai jual. Program ini menekankan praktik langsung di lahan dan ruang pengolahan agar siswa siap berwirausaha maupun bekerja di industri pengolahan pangan.',
                'kepala_nama' => 'Nama Kepala Jurusan, S.P.', 'kepala_foto' => 'kepala.jpg',
                'guru' => [
                    ['nama' => 'Nama Guru 1, S.P.', 'foto' => 'guru-1.jpg'],
                    ['nama' => 'Nama Guru 2, S.TP.', 'foto' => 'guru-2.jpg'],
                ],
                'foto_kegiatan' => ['foto-1.jpg', 'foto-2.jpg', 'foto-3.jpg', 'foto-4.jpg'],
            ],
        ];

        foreach ($data as $item) {
            $guru = $item['guru'];
            $foto = $item['foto_kegiatan'];
            unset($item['guru'], $item['foto_kegiatan']);

            $jurusan = Jurusan::updateOrCreate(['slug' => $item['slug']], $item);

            $jurusan->guru()->delete();
            foreach ($guru as $i => $g) {
                $jurusan->guru()->create(['nama' => $g['nama'], 'foto' => $g['foto'], 'urutan' => $i]);
            }

            $jurusan->fotos()->delete();
            foreach ($foto as $i => $f) {
                $jurusan->fotos()->create(['file' => $f, 'urutan' => $i]);
            }
        }
    }
}