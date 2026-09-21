<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['foto' => 'guru-1.jpeg', 'nama' => 'A. Rahmat Dimyati, S.Pd., M.Pd.', 'jabatan' => 'Kepala Sekolah'],
            ['foto' => 'guru-2.jpeg', 'nama' => 'Sima Kristina, S.Kom', 'jabatan' => 'Guru RPL'],
            ['foto' => 'guru-3.jpeg', 'nama' => 'Wahyudin, S.Tr. Kom.', 'jabatan' => 'Guru RPL'],
            ['foto' => 'guru-4.jpeg', 'nama' => 'Rahmat Setiawan, S.T.', 'jabatan' => 'Guru RPL'],
            ['foto' => 'guru-5.jpeg', 'nama' => 'Silvi Danu Respita, S.T.', 'jabatan' => 'Guru RPL'],
            ['foto' => 'guru-6.jpeg', 'nama' => 'Bani Fudoly, S.ST.', 'jabatan' => 'Guru RPL'],
            ['foto' => 'guru-7.jpeg', 'nama' => 'Didi Mei Somantri, S.Kom.', 'jabatan' => 'Guru RPL'],
            ['foto' => 'guru-8.jpeg', 'nama' => 'Mega Nurunnisa, S.Pd.', 'jabatan' => 'Guru B.Indonesia'],
            ['foto' => 'guru-9.jpeg', 'nama' => 'Nuraeni, S.Pd.', 'jabatan' => 'Guru Matematika'],
            ['foto' => 'guru-10.jpeg', 'nama' => 'Yani Cahyani, S.Pd.', 'jabatan' => 'Guru B.Inggris'],
            ['foto' => 'guru-11.jpeg', 'nama' => 'Siti Rahmawati, S.Pd.I.', 'jabatan' => 'Guru PAI & BP'],
            ['foto' => 'guru-12.jpeg', 'nama' => 'Nopi Yanti, S.Pd.', 'jabatan' => 'Guru Pendidikan Pancasila'],
            ['foto' => 'guru-13.jpeg', 'nama' => 'Moch  Yoga Agung Nugraha, S.Pd., M.Pd.', 'jabatan' => 'Guru B.Sunda'],
            ['foto' => 'guru-14.jpeg', 'nama' => 'Budiana Hermawan, S.TP.', 'jabatan' => 'Guru APHP'],
            ['foto' => 'guru-15.jpeg', 'nama' => 'Edeh Kurniasih, S.Pd.', 'jabatan' => 'Guru Bahasa Indonesia'],
            ['foto' => 'guru-16.jpeg', 'nama' => 'Romi Darmayadi, S.Pd., S.T.', 'jabatan' => 'Guru Teknik Otomotif'],
            ['foto' => 'guru-17.jpeg', 'nama' => 'Eli Maryamah, S.Pd.', 'jabatan' => 'Guru Pemasaran'],
            ['foto' => 'guru-18.jpeg', 'nama' => 'Nanang Suryana, S.E., M.M.', 'jabatan' => 'Guru Pemasaran'],
            ['foto' => 'guru-19.jpeg', 'nama' => 'Indra Priatna, S.Pd.', 'jabatan' => 'Guru Pendidikan Pancasila & Informatika'],
            ['foto' => 'guru-20.jpeg', 'nama' => 'Indra Murgianto, S.Pd.', 'jabatan' => 'Guru Pemasaran'],
            ['foto' => 'guru-21.jpeg', 'nama' => 'Dedi Sukardi, S.Pd.', 'jabatan' => 'Guru PJOK'],
            ['foto' => 'guru-22.jpeg', 'nama' => 'Ela Haryati, S.Pd.', 'jabatan' => 'Guru Pendidikan Pancasila & PKK'],
            ['foto' => 'guru-23.jpeg', 'nama' => 'Habib Suhandar, S.Pd.', 'jabatan' => 'Guru Pendidikan Pancasila & Sejarah'],
            ['foto' => 'guru-24.jpeg', 'nama' => 'Jaya Nur Setiawandi, S.Pd.', 'jabatan' => 'Guru PJOK & Bahasa Sunda'],
            ['foto' => 'guru-25.jpeg', 'nama' => 'Setiawan, S.E.', 'jabatan' => 'Guru Pemasaran'],
            ['foto' => 'guru-26.jpeg', 'nama' => 'Dini Andriani, S.E.', 'jabatan' => 'Guru Pemasaran'],
            ['foto' => 'guru-27.jpeg', 'nama' => 'Emi Resmiyati, S.Pd.', 'jabatan' => 'Guru Projek Ilmu Pengetahuan Alam dan Sosial'],
            ['foto' => 'guru-28.jpeg', 'nama' => 'Rina Susana, S.Pd.', 'jabatan' => 'Guru Bahasa Inggris'],
            ['foto' => 'guru-29.jpeg', 'nama' => 'Jajang Ridwan, S.T.', 'jabatan' => 'Guru Teknik Otomotif'],
            ['foto' => 'guru-30.jpeg', 'nama' => 'Mia Rusmiati, S.Pd.', 'jabatan' => 'Guru Matematika & Bahasa Inggris'],
            ['foto' => 'guru-31.jpeg', 'nama' => 'Ai Nurhasanah, S.Pd.', 'jabatan' => 'Guru Matematika & Informatika'],
            ['foto' => 'guru-32.jpeg', 'nama' => 'Isnan Wiranursyeha, S.Pd.', 'jabatan' => 'Guru Bahasa Indonesia'],
            ['foto' => 'guru-33.jpeg', 'nama' => 'Asep Muhlis Sulaeman, S.Pd.I.', 'jabatan' => 'Guru PAI & BP'],
            ['foto' => 'guru-34.jpeg', 'nama' => 'Yayup Hindriyani, S.Pd.', 'jabatan' => 'Guru Matematika & Informatika'],
            ['foto' => 'guru-35.jpeg', 'nama' => 'Kamalia, S.E.', 'jabatan' => 'Guru Pemasaran'],
            ['foto' => 'guru-36.jpeg', 'nama' => 'Andri Muhoir, S.T.', 'jabatan' => 'Guru Teknik Otomotif'],
            ['foto' => 'guru-37.jpeg', 'nama' => 'Ende Iskandar, S.TP.', 'jabatan' => 'Guru APHP'],
            ['foto' => 'guru-38.jpeg', 'nama' => 'Nurdiansah, S.IP.', 'jabatan' => 'Administrasi Persuratan, Kesiswaan & Kurikulum'],
            ['foto' => 'guru-39.jpeg', 'nama' => 'Sakti Alamsyah, S.E.', 'jabatan' => 'Administrasi Sarpras'],
            ['foto' => 'guru-40.jpeg', 'nama' => 'Ayi Suryati, A.MA.Pust.', 'jabatan' => 'Administrasi Perpustakaan'],
            ['foto' => 'guru-41.jpeg', 'nama' => 'Nurah Alwaini, A.MA.Pust.', 'jabatan' => 'Administrasi Perpustakaan'],
            ['foto' => 'guru-42.jpeg', 'nama' => 'Ramdan Bastaman', 'jabatan' => 'Administrasi Sarpras'],
            ['foto' => 'guru-43.jpeg', 'nama' => 'Saripul Basar', 'jabatan' => 'Laboran APHP'],
            ['foto' => 'guru-44.jpeg', 'nama' => 'Asep Purnama', 'jabatan' => 'Laboran Teknik Otomotif'],
            ['foto' => 'guru-45.jpeg', 'nama' => 'Santi Mustika', 'jabatan' => 'Laboran Pemasaran'],
            ['foto' => 'guru-46.jpeg', 'nama' => 'Moch Najib', 'jabatan' => 'Laboran PPLG'],
            ['foto' => 'guru-47.jpeg', 'nama' => 'Ahmad Suhendra', 'jabatan' => 'Kebersihan & Keindahan Sekolah'],
            ['foto' => 'guru-48.jpeg', 'nama' => 'D Jamaludin', 'jabatan' => 'Kebersihan & Keindahan Sekolah'],
            ['foto' => 'guru-49.jpeg', 'nama' => 'Apendi', 'jabatan' => 'Kebersihan & Keindahan Sekolah'],
            ['foto' => 'guru-50.jpeg', 'nama' => 'Tatang Rustandi', 'jabatan' => 'Kebersihan & Keindahan Sekolah'],
            ['foto' => 'guru-51.jpeg', 'nama' => 'Muldiansah', 'jabatan' => 'Keamanan & Ketertiban Sekolah'],
            ['foto' => 'guru-52.jpeg', 'nama' => 'Yogi Saputra', 'jabatan' => 'Keamanan & Ketertiban Sekolah'],
        ];

        foreach ($data as $i => $g) {
            Guru::updateOrCreate(
                ['nama' => $g['nama']],
                array_merge($g, ['urutan' => $i])
            );
        }
    }
}