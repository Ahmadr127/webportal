<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Apakah sertifikat pelatihan berlaku untuk perpanjangan STR?',
                'answer' => 'Ya, sertifikat pelatihan dari Amedika Institute dapat digunakan untuk memenuhi persyaratan SKP (Satuan Kredit Profesi) dalam perpanjangan STR (Surat Tanda Registrasi) tenaga kesehatan sesuai dengan ketentuan yang berlaku.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah ada pelatihan dalam format online?',
                'answer' => 'Ya, kami menyediakan pelatihan dalam format online (webinar) dan offline (tatap muka). Anda dapat memilih format yang sesuai dengan kebutuhan dan jadwal Anda.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Berapa lama masa berlaku sertifikat pelatihan?',
                'answer' => 'Sertifikat pelatihan yang kami keluarkan berlaku sesuai dengan standar yang ditetapkan oleh organisasi profesi masing-masing. Untuk pelatihan tertentu seperti BLS/ACLS, sertifikat berlaku selama 2 tahun.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah peserta mendapat sertifikat setelah mengikuti pelatihan?',
                'answer' => 'Ya, setiap peserta yang mengikuti pelatihan hingga selesai dan lulus evaluasi akan mendapatkan sertifikat resmi dari Amedika Institute yang telah terakreditasi.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'Bagaimana cara mendaftar pelatihan?',
                'answer' => 'Anda dapat mendaftar melalui website kami dengan memilih program pelatihan yang diinginkan, mengisi formulir pendaftaran, dan melakukan pembayaran. Tim kami akan menghubungi Anda untuk konfirmasi lebih lanjut.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah tersedia pelatihan in-house untuk institusi kesehatan?',
                'answer' => 'Ya, kami menyediakan program pelatihan in-house yang dapat disesuaikan dengan kebutuhan rumah sakit, klinik, atau institusi kesehatan Anda. Silakan hubungi tim kami untuk informasi lebih lanjut.',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'question' => 'Siapa saja yang bisa mengikuti pelatihan di Amedika Institute?',
                'answer' => 'Pelatihan kami terbuka untuk dokter, perawat, bidan, dan tenaga kesehatan lainnya yang ingin meningkatkan kompetensi dan keahlian profesional mereka sesuai dengan standar industri kesehatan.',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah ada biaya tambahan selain biaya pelatihan?',
                'answer' => 'Biaya pelatihan sudah mencakup materi, sertifikat, konsumsi (untuk pelatihan offline), dan fasilitas pelatihan. Tidak ada biaya tersembunyi. Untuk pelatihan tertentu, mungkin ada biaya tambahan untuk modul khusus yang akan diinformasikan di awal.',
                'order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
