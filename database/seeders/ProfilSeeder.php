<?php

namespace Database\Seeders;

use App\Models\profil;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        $profils = [
            [
                'nama_menu' => 'sambutan',
                'judul' => 'Sambutan Kepala Sekolah',
                'konten' => "Assalamu'alaikum Warahmatullahi Wabarakatuh,

Puji syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa, karena atas rahmat dan karunia-Nya, kita semua masih diberikan kesehatan dan kesempatan untuk terus berkarya dalam dunia pendidikan.

Selamat datang di website resmi SMK-Ucup. Website ini kami hadirkan sebagai media informasi dan komunikasi antara sekolah, siswa, orang tua, dan masyarakat luas.

Kami berharap dengan adanya website ini, informasi mengenai kegiatan dan perkembangan sekolah dapat diakses dengan mudah dan transparan. Kami berkomitmen untuk terus meningkatkan kualitas pendidikan dan pelayanan kepada siswa.

Akhir kata, kami mengucapkan terima kasih atas kepercayaan masyarakat kepada SMK-Ucup. Kritik dan saran yang membangun selalu kami nantikan untuk kemajuan sekolah kita tercinta.

Wassalamu'alaikum Warahmatullahi Wabarakatuh.",
                'gambar' => 'udin.png',
                'urutan' => 1,
                'status' => true,
            ],
            [
                'nama_menu' => 'visi-misi',
                'judul' => 'Visi & Misi',
                'konten' => "VISI:
Menjadi sekolah menengah kejuruan yang menghasilkan lulusannya cerdas, kompeten, dan berkarakter Islami, serta mampu bersaing di tingkat nasional maupun internasional.

MISI:
1. Menyediakan pendidikan berkualitas yang relevan dengan kebutuhan dunia kerja.
2. Mengembangkan kompetensi keahlian sesuai standar industri.
3. Membentuk karakter Islami yang kuat pada setiap peserta didik.
4. Meningkatkan prestasi akademik dan non-akademik secara berkelanjutan.
5. Membangun kerja sama dengan dunia industri dan dunia kerja (DUDI).
6. Mengembangkan sumber daya manusia yang profesional dan berakhlakul karimah.
7. Menerapkan teknologi informasi dan komunikasi dalam proses pembelajaran.

TUJUAN:
- Menghasilkan lulusan yang kompeten di bidang keahliannya.
- Menciptakan peserta didik yang berakhlak mulia dan berintegritas.
- Meningkatkan daya saing lulusan di pasar kerja.
- Mengembangkan budaya sekolah yang kondusif untuk pembelajaran.
- Memperkuat linkage dengan industri dan dunia kerja.

MOTTO:
BERIMAN, BERILMU, BERAKHLAK",
                'gambar' => null,
                'urutan' => 2,
                'status' => true,
            ],
            [
                'nama_menu' => 'struktur-organisasi',
                'judul' => 'Struktur Organisasi',
                'konten' => "Struktur Organisasi SMK-Ucup

Kepala Sekolah: Drs. Budi Santoso
Waka Kurikulum: Siti Aminah, S.Pd
Waka Kesiswaan: Ahmad Fauzi, M.Pd
Waka Sarana: Hendra Wijaya, S.T
Sekretaris: Dewi Lestari, S.Pd
Bendahara: Rina Susilowati, S.E

Komite Sekolah:
Ketua: H. Muhammad Tahir
Sekretaris: Hj. Fatimah
Bendahara: H. Ahmad Siddiq",
                'gambar' => null,
                'urutan' => 3,
                'status' => true,
            ],
            [
                'nama_menu' => 'sejarah',
                'judul' => 'Sejarah Sekolah',
                'konten' => "SMK-Ucup merupakan institusi pendidikan yang berkomitmen untuk menyediakan pendidikan berkualitas tinggi. Berdiri sejak tahun 2000, sekolah ini telah mengalami berbagai perkembangan signifikan dalam upaya meningkatkan mutu pendidikan.

Dengan dukungan tenaga pendidik yang profesional dan fasilitas yang memadai, SMK-Ucup terus berupaya mencetak lulusan yang cerdas, berkarakter, dan mampu bersaing di dunia kerja.",
                'gambar' => null,
                'urutan' => 4,
                'status' => true,
            ],
        ];

        foreach ($profils as $profil) {
            profil::create($profil);
        }
    }
}
