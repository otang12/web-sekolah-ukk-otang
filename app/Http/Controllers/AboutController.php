<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Halaman profil singkat sekolah & program keahlian.
     */
    public function index(): View
    {
        $sambutan = [
            'nama' => 'A. Rahmat Dimyati, S.Pd., M.Pd.',
            'jabatan' => 'Kepala SMK Negeri 1 Cijati',
            'foto' => 'kepala-sekolah.jpeg',
            'kutipan' => 'Kami berkomitmen membekali setiap siswa dengan kompetensi, karakter, dan kesiapan menghadapi dunia kerja maupun dunia usaha dan industri, sehingga lulusan SMK Negeri 1 Cijati mampu bersaing dan berkontribusi bagi masyarakat.',
        ];

        $keunggulan = [
            ['icon' => '&#129309;', 'judul' => 'Kerja Sama Industri', 'teks' => 'Kemitraan aktif dengan DUDI untuk PKL dan penyerapan lulusan.'],
            ['icon' => '&#127891;', 'judul' => 'Tenaga Pengajar Kompeten', 'teks' => 'Guru bersertifikasi dan berpengalaman di bidangnya masing-masing.'],
            ['icon' => '&#128295;', 'judul' => 'Praktik Berbasis Kompetensi', 'teks' => 'Fokus pembelajaran praktik agar siswa siap kerja sejak lulus.'],
        ];

        $misi = [
            'Menyelenggarakan pendidikan kejuruan berbasis kompetensi dan berorientasi pada dunia kerja.',
            'Membangun kerja sama aktif dengan dunia usaha dan dunia industri (DUDI).',
            'Menanamkan sikap disiplin, jujur, dan bertanggung jawab pada setiap peserta didik.',
            'Mengembangkan potensi siswa melalui kegiatan akademik dan non-akademik yang seimbang.',
        ];

        // Eager load relasi fotos supaya kolase foto di kartu jurusan tidak query berulang (N+1).
        $jurusan = Jurusan::with('fotos')->orderBy('id')->get();

        $fasilitas = [
            'Laboratorium RPL',
            'Laboratorium BDP',
            'Laboratorium APHP',
            'Ruang Praktik Sekolah TKR',
            'Perpustakaan',
            'Lapangan Olahraga',
            'UKS ',
        ];

        $moto = 'KEREND, Kompeten, Energik, Religius, Nasionalis, Dinamis';

        $sejarah = 'SMK Negeri 1 Cijati berdiri untuk menjawab kebutuhan tenaga kerja terampil di wilayah Cijati dan sekitarnya. Sejak awal berdiri, sekolah terus berkembang baik dari sisi jumlah program keahlian, sarana praktik, maupun kemitraan dengan dunia usaha dan dunia industri, demi mencetak lulusan yang siap kerja, siap kuliah, dan siap berwirausaha.';

        $strukturOrganisasi = [
            ['jabatan' => 'Kepala Sekolah', 'nama' => 'A. Rahmat Dimyati, S.Pd., M.Pd.'],
            ['jabatan' => 'Wakasek Kurikulum', 'nama' => 'Nuraeni, S.Pd.'],
            ['jabatan' => 'Wakasek Kesiswaan', 'nama' => 'Jaya Nur Setiawandi, S.Pd.'],
            ['jabatan' => 'Wakasek Sarana Prasarana', 'nama' => 'Nama Wakasek Sarpras'],
            ['jabatan' => 'Wakasek Humas & Hubin', 'nama' => 'Nama Wakasek Humas'],
        ];

        return view('about', compact('sambutan', 'keunggulan', 'misi', 'jurusan', 'fasilitas', 'moto', 'sejarah', 'strukturOrganisasi'));
    }

    /**
     * Halaman daftar Jurusan (dipisah dari halaman Profil).
     */
    public function jurusan(): View
    {
        // Eager load relasi fotos supaya kolase foto di kartu jurusan tidak query berulang (N+1).
        $jurusan = Jurusan::with('fotos')->orderBy('id')->get();

        $fasilitas = [
            'Laboratorium RPL',
            'Laboratorium BDP',
            'Laboratorium APHP',
            'Ruang Praktik Sekolah TKR',
            'Perpustakaan',
            'Lapangan Olahraga',
            'UKS ',
        ];

        return view('jurusan', compact('jurusan', 'fasilitas'));
    }

    /**
     * Halaman detail satu program keahlian.
     */
    public function show(string $slug): View
    {
        $jurusan = Jurusan::where('slug', $slug)->with(['guru', 'fotos'])->firstOrFail();

        // Daftar semua jurusan, dipakai untuk kotak "Menu Navigasi" di halaman detail.
        $semuaJurusan = Jurusan::orderBy('id')->get(['nama', 'singkatan', 'slug']);

        // Kalau kolom mata_pelajaran di database masih kosong (belum diisi lewat
        // dashboard admin), pakai data contoh berikut supaya halaman tetap tampil
        // lengkap. Begitu kamu isi lewat admin, data dari database yang dipakai.
        $mataPelajaranDefault = [
            'rekayasa-perangkat-lunak' => [
                ['nama' => 'Pemrograman Dasar', 'deskripsi' => 'Memahami konsep dasar pemrograman dan logika algoritma.'],
                ['nama' => 'Pemrograman Berorientasi Objek', 'deskripsi' => 'Mempelajari konsep OOP (Object-Oriented Programming) dengan bahasa pemrograman modern seperti Java atau Python.'],
                ['nama' => 'Basis Data', 'deskripsi' => 'Dasar-dasar sistem basis data, pengelolaan data, dan penerapan SQL.'],
                ['nama' => 'Pemrograman Web', 'deskripsi' => 'Pengenalan HTML, CSS, JavaScript, dan dasar-dasar pengembangan aplikasi web.'],
                ['nama' => 'Rekayasa Perangkat Lunak', 'deskripsi' => 'Siklus pengembangan perangkat lunak dan analisis kebutuhan.'],
                ['nama' => 'Mobile Application Development', 'deskripsi' => 'Pengembangan aplikasi mobile untuk platform Android.'],
            ],
        ];

        $mataPelajaran = !empty($jurusan->mata_pelajaran)
            ? $jurusan->mata_pelajaran
            : ($mataPelajaranDefault[$slug] ?? []);

        return view('jurusan-detail', [
            'slug' => $jurusan->slug,
            'nama' => $jurusan->nama,
            'singkatan' => $jurusan->singkatan,
            'deskripsi' => $jurusan->deskripsi_panjang,
            'kepala' => ['nama' => $jurusan->kepala_nama, 'foto' => $jurusan->kepala_foto],
            'guru' => $jurusan->guru,
            'foto_kegiatan' => $jurusan->fotos,
            'semua_jurusan' => $semuaJurusan,
            'mata_pelajaran' => $mataPelajaran,
        ]);
    }
}