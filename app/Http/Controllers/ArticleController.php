<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Menyiapkan data artikel (sementara).
     */
    private function getArticles()
    {
        $articles = [
            [
                'title' => '“Sakit Perut Setelah Makan?” Waspadai Diare Akibat Infeksi',
                'image' => '/images/article_1.png',
                'body' => '
                    <p class="mb-4">Merasa perut melilit dan harus bolak-balik ke kamar mandi setelah makan memang sangat mengganggu. Meskipun sering dianggap sepele, kondisi ini bisa menjadi tanda adanya infeksi pada saluran pencernaan Anda. Mari kita kenali lebih dalam.</p>
                    <h3 class="text-xl font-bold mt-6 mb-2">Apa Penyebab Diare Akibat Infeksi?</h3>
                    <p class="mb-4">Diare setelah makan, atau yang sering disebut keracunan makanan, umumnya disebabkan oleh kuman yang masuk ke tubuh melalui makanan atau minuman yang terkontaminasi. Pelaku utamanya bisa berupa:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li><strong>Bakteri:</strong> Seperti E. coli, Salmonella, atau Shigella. Sering ditemukan pada daging yang kurang matang, telur mentah, atau sayuran yang tidak dicuci bersih.</li>
                        <li><strong>Virus:</strong> Seperti Norovirus atau Rotavirus, yang sangat mudah menular dari orang ke orang atau melalui permukaan yang terkontaminasi.</li>
                        <li><strong>Parasit:</strong> Seperti Giardia lamblia, yang bisa ditemukan di air yang tidak higienis.</li>
                    </ul>
                    <h3 class="text-xl font-bold mt-6 mb-2">Gejala yang Harus Diperhatikan:</h3>
                    <p class="mb-4">Selain sakit perut dan diare (buang air besar cair lebih dari 3 kali sehari), gejala lain yang bisa menyertai adalah:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Mual dan muntah</li>
                        <li>Kram atau mulas yang hebat</li>
                        <li>Perut kembung</li>
                        <li>Terkadang disertai demam ringan dan sakit kepala</li>
                    </ul>
                '
            ],
            [
                'title' => '“Sering Pusing dan Lelah?” Bisa Jadi Hipertensi Tanpa Disadari',
                'image' => '/images/article_2.png',
                'body' => '
                    <p class="mb-4">Merasa pusing, mudah lelah, atau sakit kepala yang tak kunjung hilang seringkali dianggap sebagai akibat dari kesibukan sehari-hari atau kurang tidur. Namun, jangan sepelekan gejala ini. Bisa jadi, tubuh Anda sedang memberikan sinyal adanya Hipertensi atau tekanan darah tinggi, sebuah kondisi berbahaya yang seringkali datang tanpa disadari.</p>
                    <h3 class="text-xl font-bold mt-6 mb-2">Gejala yang Perlu Diwaspadai</h3>
                    <p class="mb-4">Meskipun sering tanpa gejala, pada beberapa kasus hipertensi berat dapat menimbulkan keluhan seperti:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Sakit kepala, terutama di bagian belakang kepala.</li>
                        <li>Pusing atau sensasi berputar (vertigo).</li>
                        <li>Kelelahan kronis yang tidak bisa dijelaskan.</li>
                    </ul>
                    <h3 class="text-xl font-bold mt-6 mb-2">Kapan Harus ke Dokter?</h3>
                    <p class="mb-4">Segera konsultasikan dengan dokter jika:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Hasil pengukuran tekanan darah Anda secara konsisten menunjukkan angka di atas 130/80 mmHg.</li>
                        <li>Anda mengalami gejala berat seperti nyeri dada, sesak napas, sakit kepala hebat, atau kelemahan pada satu sisi tubuh.</li>
                    </ul>
                '
            ],
            [
                'title' => '“Demam Tinggi Mendadak?” Jangan Anggap Sepele, Bisa Jadi DBD',
                'image' => '/images/article_3.png', // Menggunakan gambar yang sesuai
                'body' => '
                    <p class="mb-4">Saat anak atau anggota keluarga mengalami demam tinggi yang datang tiba-tiba, wajar jika kita berpikir itu hanyalah flu biasa. Namun, di negara tropis seperti Indonesia, kita harus selalu waspada terhadap kemungkinan Demam Berdarah Dengue (DBD), penyakit yang bisa berakibat fatal jika terlambat ditangani.</p>
                    <h3 class="text-xl font-bold mt-6 mb-2">Mengenal Pola Demam Khas DBD: Siklus Pelana Kuda</h3>
                    <p class="mb-4">Terdapat tiga fase khas dalam perjalanan demam DBD yang perlu diwaspadai:</p>
                    <ul class="list-disc list-inside space-y-3">
                        <li><strong>Fase Demam (Hari 1–3):</strong> Demam tinggi mendadak hingga 40°C, disertai nyeri hebat pada kepala, belakang mata, serta otot dan sendi.</li>
                        <li><strong>Fase Kritis (Hari 4–6):</strong> Suhu tubuh turun drastis, yang seringkali menipu seolah sudah sembuh. Ini adalah fase paling berbahaya karena risiko perdarahan dan syok akibat kebocoran plasma berada di puncaknya.</li>
                        <li><strong>Fase Penyembuhan (Hari 6–7):</strong> Kondisi tubuh mulai pulih secara bertahap. Nafsu makan kembali dan kadar trombosit perlahan naik menuju angka normal.</li>
                    </ul>
                    <h3 class="text-xl font-bold mt-6 mb-2">Gejala Penyerta yang Wajib Diwaspadai</h3>
                    <p class="mb-4">Selain pola demam, perhatikan gejala-gejala penyerta yang menjadi ciri khas DBD:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li><strong>Bintik Merah:</strong> Munculnya bintik-bintik merah di kulit (petechiae) yang tidak hilang saat kulit ditekan.</li>
                        <li><strong>Tanda Perdarahan:</strong> Mimisan, gusi mudah berdarah saat sikat gigi, atau muncul lebam-lebam di kulit.</li>
                        <li><strong>Nyeri Perut Hebat:</strong> Rasa sakit yang luar biasa di area ulu hati.</li>
                    </ul>
                '
            ],
            [
                'title' => '“Gatal Terus di Lipatan Kulit?” Bisa Jadi Infeksi Jamur Kulit!',
                'image' => '/images/article_4.png',
                'body' => '
                    <p class="mb-4">Rasa gatal yang tak kunjung henti di area lipatan tubuh seperti selangkangan, ketiak, atau bawah payudara tentu sangat tidak nyaman dan mengganggu kepercayaan diri. Penyebabnya seringkali bukan karena kebersihan yang buruk, melainkan infeksi jamur kulit.</p>
                    <h3 class="text-xl font-bold mt-6 mb-2">Mengapa Jamur Suka di Area Lipatan?</h3>
                    <p class="mb-4">Jamur mikroskopis secara alami ada di kulit kita. Namun, mereka akan berkembang biak dengan cepat di area yang hangat, lembap, dan gelap. Inilah mengapa area lipatan tubuh menjadi tempat favorit bagi jamur untuk tumbuh dan menyebabkan infeksi. Iklim Indonesia yang tropis dan lembap juga turut menjadi faktor pemicu.</p>
                    <h3 class="text-xl font-bold mt-6 mb-2">Jenis Infeksi Jamur yang Umum:</h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li><strong>Tinea Cruris (Jock Itch):</strong> Infeksi jamur di area selangkangan, paha bagian dalam, dan bokong.</li>
                        <li><strong>Tinea Corporis (Kurap):</strong> Ruam berbentuk cincin kemerahan yang bisa muncul di bagian tubuh mana saja.</li>
                        <li><strong>Panu (Tinea Versicolor):</strong> Bercak-bercak putih atau coklat muda yang biasanya muncul di punggung dan dada.</li>
                    </ul>
                    <h3 class="text-xl font-bold mt-6 mb-2">Gejala yang Harus Diperhatikan:</h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Gatal yang sangat mengganggu, biasanya memburuk saat berkeringat</li>
                        <li>Ruam kemerahan dengan tepi yang terlihat lebih jelas dan aktif.</li>
                        <li>Kulit di area tersebut bisa menjadi bersisik, mengelupas, atau pecah-pecah.</li>
                    </ul>
                '
            ],
            [
                'title' => '“Batuk Tak Kunjung Sembuh Lebih dari 2 Minggu?” Jangan Diabaikan, Kenali Tanda Bahaya TBC dan Bronkitis',
                'image' => '/images/article_5.png',
                'body' => '
                    <p class="mb-4">Batuk adalah mekanisme pertahanan tubuh, namun jika tidak kunjung berhenti setelah dua atau tiga minggu, ini adalah sinyal bahwa ada masalah lain yang perlu diselidiki. Mengabaikan batuk yang membandel bisa menunda penanganan kondisi serius seperti Bronkitis atau bahkan Tuberkulosis (TBC).</p>
                    <h3 class="text-xl font-bold mt-6 mb-2">Apa Saja Kemungkinan Penyebabnya?</h3>
                    <p class="mb-4">Batuk kronis bisa menjadi gejala dari beberapa penyakit yang berbeda. Penting untuk mengenali tanda-tanda penyertanya:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li><strong>Bronkitis:</strong> Peradangan pada saluran udara paru-paru. Gejalanya meliputi batuk yang menghasilkan dahak kental (bisa bening, kuning, atau hijau), sesak napas, dan sering merasa lelah.</li>
                        <li><strong>TBC (Tuberkulosis):</strong> Infeksi bakteri serius ini menular dan menyerang paru-paru. Waspadai jika batuk Anda disertai gejala khas seperti dahak bercampur darah, demam dan keringat di malam hari, serta penurunan berat badan drastis.</li>
                        <li><strong>GERD (Penyakit Asam Lambung):</strong> Batuk juga bisa dipicu oleh naiknya asam lambung ke kerongkongan.</li>
                    </ul>
                    <h3 class="text-xl font-bold mt-6 mb-2">Kapan Harus Segera ke Dokter?</h3>
                    <p class="mb-4">Jangan tunda konsultasi jika batuk Anda:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Berlangsung lebih dari 3 minggu tanpa ada perbaikan.</li>
                        <li>Disertai darah, sekecil apapun.</li>
                        <li>Menyebabkan sesak napas, mengi (napas berbunyi), atau nyeri dada.</li>
                    </ul>
                '
            ],
            [
                'title' => '“Sendi Lutut atau Jari Sering Kaku dan Nyeri?” Bisa Jadi Gejala Asam Urat atau Rematik. Ini Bedanya!',
                'image' => '/images/article_6.png',
                'body' => '
                    <p class="mb-4">Nyeri dan kaku pada sendi sering dianggap sebagai bagian tak terhindarkan dari penuaan. Namun, ini adalah anggapan yang keliru. Nyeri sendi yang berulang bisa menjadi gejala penyakit spesifik seperti Asam Urat (Gout) atau Rematik (Artritis Reumatoid), yang keduanya memerlukan pendekatan pengobatan yang sangat berbeda.</p>
                    <h3 class="text-xl font-bold mt-6 mb-2">Apa Perbedaan Utama Keduanya?</h3>
                    <p class="mb-4">Meskipun sama-sama menyebabkan nyeri, penting untuk mengetahui perbedaannya:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li><strong>Asam Urat (Gout):</strong> Disebabkan oleh penumpukan kristal asam urat yang tajam di dalam sendi. Karakteristik utamanya adalah serangan nyeri yang mendadak dan sangat hebat, biasanya pada satu sendi seperti jempol kaki atau lutut.</li>
                        <li><strong>Rematik (Artritis Reumatoid):</strong> Ini adalah penyakit autoimun di mana sistem kekebalan tubuh justru menyerang sendi. Gejalanya khas, yaitu nyeri yang simetris (mengenai sendi yang sama di kedua sisi tubuh).</li>
                    </ul>
                    <h3 class="text-xl font-bold mt-6 mb-2">Kapan Harus Segera ke Dokter?</h3>
                    <p class="mb-4">Segera cari pertolongan medis jika:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Nyeri sendi muncul tiba-tiba dengan intensitas yang sangat parah.</li>
                        <li>Sendi menjadi bengkak, merah, panas, dan tidak bisa digerakkan.</li>
                        <li>Nyeri disertai demam atau kondisi tubuh yang menurun drastis.</li>
                    </ul>
                '
            ],
        ];

        // Menambahkan slug secara otomatis untuk setiap artikel
        return array_map(function ($article) {
            $article['slug'] = Str::slug($article['title']);
            if (empty($article['body'])) {
                $article['body'] = '<p>Konten untuk artikel ini akan segera tersedia. Terima kasih telah berkunjung.</p>';
            }
            return $article;
        }, $articles);
    }

    /**
     * Menampilkan halaman daftar artikel kesehatan.
     */
    public function index()
    {
        return view('articles.index', ['articles' => $this->getArticles()]);
    }

    /**
     * Menampilkan satu artikel secara detail.
     */
    public function show($slug)
    {
        $articles = $this->getArticles();
        $article = collect($articles)->firstWhere('slug', $slug);

        if (!$article) {
            abort(404);
        }

        return view('articles.show', compact('article'));
    }
}
