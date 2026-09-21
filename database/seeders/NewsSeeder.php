<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Pelepasan Calon Paskibra SMK Negeri 1 Cijati',
                'category' => 'ekstrakurikuler',
                'excerpt' => 'SMK Negeri 1 Cijati resmi melepas calon anggota Paskibra yang akan bertugas pada upacara HUT Kemerdekaan RI tingkat kecamatan.',
                'body' => 'SMK Negeri 1 Cijati mengadakan acara pelepasan bagi calon anggota Pasukan Pengibar Bendera (Paskibra) yang telah melalui serangkaian seleksi dan pelatihan. Para calon anggota siap bertugas mengibarkan bendera pada upacara peringatan HUT Kemerdekaan RI tingkat kecamatan Cijati. Acara ini turut dihadiri jajaran guru dan pembina ekstrakurikuler sebagai bentuk dukungan dan doa restu bagi para siswa.',
                'image' => 'pelepasan-paskibra.jpeg',
                'author' => 'Admin Kesiswaan',
                'published_at' => '2026-07-20 09:00:00',
            ],
            [
                'title' => 'Dokumentasi Latihan Gitamadhuswara Jelang Pawai 17 Agustus',
                'category' => 'ekstrakurikuler',
                'excerpt' => 'Seluruh anggota Marching Band Gitamadhuswara menjalani latihan intensif setiap sore untuk persiapan pawai kemerdekaan tingkat kecamatan.',
                'body' => 'Suasana lapangan SMK Negeri 1 Cijati riuh oleh dentum drum dan alunan pianika setiap sore pekan ini. Marching Band Gitamadhuswara menggenjot latihan formasi baris-berbaris dan aransemen lagu perjuangan untuk tampil pada pawai kemerdekaan tingkat kecamatan Cijati.',
                'image' => 'gitamadhuswara-latihan.jpeg',
                'author' => 'Admin Kesiswaan',
                'published_at' => '2026-07-25 15:00:00',
            ],
            [
                'title' => 'Senin Berseka (Bersih dan Sehat Ceria) di SMK Negeri 1 Cijati',
                'category' => 'info-pendidikan',
                'excerpt' => 'SMK Negeri 1 Cijati rutin melaksanakan kegiatan Senin Berseka setiap awal pekan untuk menanamkan budaya bersih dan hidup sehat pada siswa.',
                'body' => 'Setiap hari Senin, SMK Negeri 1 Cijati melaksanakan kegiatan rutin bertajuk "Senin Berseka" (Bersih dan Sehat Ceria). Kegiatan ini diisi dengan kerja bakti membersihkan lingkungan kelas dan sekolah, senam pagi bersama, serta pengecekan kebersihan diri siswa. Program ini bertujuan menanamkan kebiasaan hidup bersih dan sehat sejak dini sekaligus mempererat kebersamaan seluruh warga sekolah.',
                'image' => 'senin-berseka.jpeg',
                'author' => 'Admin Kesiswaan',
                'published_at' => '2026-06-10 10:00:00',
            ],
            [
                'title' => 'Pelepasan Siswa Praktik Kerja Lapangan (PKL) Tahun Ajaran 2026/2027',
                'category' => 'info-pendidikan',
                'excerpt' => 'SMK Negeri 1 Cijati resmi melepas ratusan siswa kelas XI untuk memulai Praktik Kerja Lapangan di berbagai industri mitra.',
                'body' => 'Bertempat di lapangan upacara, SMK Negeri 1 Cijati resmi melepas siswa kelas XI dari seluruh program keahlian untuk memulai Praktik Kerja Lapangan (PKL) semester ini. Para siswa akan ditempatkan di berbagai dunia usaha dan dunia industri (DUDI) mitra sekolah sesuai kompetensi keahlian masing-masing.',
                'image' => 'pelepasan-pkl.jpeg',
                'author' => 'Admin Humas',
                'published_at' => '2026-07-01 08:00:00',
            ],
            [
                'title' => 'MPLS SMK Negeri 1 Cijati Tahun Ajaran 2026/2027',
                'category' => 'info-pendidikan',
                'excerpt' => 'Masa Pengenalan Lingkungan Sekolah bagi peserta didik baru resmi dimulai dengan pengenalan tata tertib dan program keahlian.',
                'body' => 'Masa Pengenalan Lingkungan Sekolah (MPLS) bagi peserta didik baru SMK Negeri 1 Cijati resmi dimulai. Selama tiga hari, siswa baru dikenalkan pada tata tertib sekolah, budaya kerja industri, serta seluruh program keahlian dan ekstrakurikuler yang tersedia, termasuk Marching Band Gitamadhuswara.',
                'image' => 'mpls-2026.jpeg',
                'author' => 'Admin Kesiswaan',
                'published_at' => '2026-07-14 08:00:00',
            ],
            [
                'title' => 'Kegiatan Monitoring Kebersihan Lingkungan Sekolah',
                'category' => 'info-pendidikan',
                'excerpt' => 'SMK Negeri 1 Cijati rutin melaksanakan monitoring kebersihan di setiap kelas dan area lingkungan sekolah untuk menjaga kenyamanan belajar.',
                'body' => 'Sebagai upaya menjaga kebersihan dan kenyamanan lingkungan belajar, SMK Negeri 1 Cijati secara rutin melaksanakan kegiatan monitoring kebersihan di setiap kelas dan area sekolah. Kegiatan ini melibatkan tim kesiswaan bersama perwakilan OSIS untuk mengecek kebersihan ruang kelas, area praktik, dan fasilitas umum, sekaligus menanamkan kesadaran hidup bersih pada seluruh warga sekolah.',
                'image' => 'monitoring-kebersihan.jpeg',
                'author' => 'Admin Kesiswaan',
                'published_at' => '2026-05-20 10:00:00',
            ],
            [
                'title' => 'Siswa SMK Negeri 1 Cijati Raih Juara 3 Lomba Photography FLS3N Kabupaten Cianjur',
                'category' => 'prestasi',
                'excerpt' => 'Salah satu siswa SMK Negeri 1 Cijati meraih Juara 3 pada cabang lomba Photography dalam ajang FLS3N tingkat Kabupaten Cianjur.',
                'body' => 'Prestasi membanggakan kembali diraih oleh siswa SMK Negeri 1 Cijati pada ajang Festival dan Lomba Seni Siswa Nasional (FLS3N) tingkat Kabupaten Cianjur. Pada cabang lomba Photography, siswa berhasil meraih Juara 3 setelah bersaing dengan peserta dari berbagai sekolah se-Kabupaten Cianjur, menunjukkan kepekaan estetika dan teknik fotografi yang matang.',
                'image' => 'juara3-photography-fls3n.jpeg',
                'author' => 'Admin Kesiswaan',
                'published_at' => '2026-04-15 09:00:00',
            ],
            [
                'title' => 'Juara 3 Bulutangkis Tunggal Putri O2SN Tingkat Kabupaten Cianjur',
                'category' => 'prestasi',
                'excerpt' => 'Siswi SMK Negeri 1 Cijati meraih Juara 3 cabang bulutangkis tunggal putri pada ajang O2SN tingkat Kabupaten Cianjur.',
                'body' => 'SMK Negeri 1 Cijati kembali menorehkan prestasi membanggakan melalui ajang Olimpiade Olahraga Siswa Nasional (O2SN) tingkat Kabupaten Cianjur. Pada cabang bulutangkis tunggal putri, perwakilan sekolah berhasil meraih Juara 3 setelah melalui pertandingan ketat melawan atlet-atlet dari sekolah lain se-Kabupaten Cianjur.',
                'image' => 'juara3-bulutangkis-putri.jpeg',
                'author' => 'Admin Kesiswaan',
                'published_at' => '2026-04-20 09:00:00',
            ],
            [
                'title' => 'Juara 3 Atletik Putri O2SN Tingkat Kabupaten Cianjur',
                'category' => 'prestasi',
                'excerpt' => 'Siswi SMK Negeri 1 Cijati meraih Juara 3 cabang atletik putri pada ajang O2SN tingkat Kabupaten Cianjur.',
                'body' => 'Prestasi membanggakan lainnya diraih SMK Negeri 1 Cijati pada cabang atletik putri dalam ajang Olimpiade Olahraga Siswa Nasional (O2SN) tingkat Kabupaten Cianjur. Perwakilan sekolah berhasil meraih Juara 3 berkat kerja keras dan latihan rutin yang dijalani bersama pembina olahraga sekolah.',
                'image' => 'juara3-atletik-putri.jpeg',
                'author' => 'Admin Kesiswaan',
                'published_at' => '2026-04-20 10:00:00',
            ],
        ];

        foreach ($items as $item) {
            News::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($item['title'])],
                array_merge($item, ['slug' => \Illuminate\Support\Str::slug($item['title'])])
            );
        }
    }
}