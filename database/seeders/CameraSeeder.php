<?php

namespace Database\Seeders;

use App\Models\Camera;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Camera::truncate();
        Schema::enableForeignKeyConstraints();

        $premiereCamera = [
            [
                'transaction_id' => 121212,
                'camera_name' => 'Canon EOS 4000D',
                'camera_spesification' =>
                'Canon EOS 4000D EOS 4000D merupakan seri terbaru dari deretan seri  EOS milik Canon dan merupakan salah satu kamera DSLR terbaik. DSLR ini bisa dibilang menggantikan posisi Canon EOS 1300D yang kini sudah discontinued. Kamera ini sangat cocok bagi para pemula yang sekiranya memiliki budget terbatas. Canon EOS 4000D ini juga kompatibel dengan berbagai jenis lensa sehingga sangat fleksibel.',
                'camera_price' => 4000000,
                'foto_camera' => 'Canon EOS 4000D.jpg',
                'user_id' => 2,
            ],
            [
                'transaction_id' => 131313,
                'camera_name' => 'Canon EOS 1300D',
                'camera_spesification' =>
                'merupakan pilihan tepat untuk pemula, dengan berbagai fitur untuk memuaskan hasrat Anda dalam mengabadikan momen istimewa. Dimensi yang tidak terlalu besar, ditambah dengan lensa kit 18-55mm, kamera dslr ini cukup nyaman untuk digunakan dan dibawa kemana saja. Canon EOS 1300D dibekali dengan layar LCD 3 inch dengan ketajaman yang tidak perlu dipertanyakan.',
                'camera_price' => 4500000,
                'foto_camera' => 'Canon EOS 1300D.jpg',
                'user_id' => 2,
            ],
            [
                'transaction_id' => 141414,
                'camera_name' => 'Canon EOS 77D',
                'camera_spesification' =>
                'Kamera yang satu ini diperuntukkan bagi mereka yang sudah mulai serius dalam menekuni fotografi. Canon EOS 77D ini mungkin memiliki banyak fitur internal yang sama dengan  EOS 800D, tetapi Canon telah memilih desain yang lebih khas dan sedikit lebih besar untuk 77D untuk membedakan kedua model tersebut.',
                'camera_price' => 4700000,
                'foto_camera' => 'Canon EOS 77D.jpg',
                'user_id' => 2,
            ],
            [
                'transaction_id' => 151515,
                'camera_name' => 'Canon 80D',
                'camera_spesification' =>
                ' Canon EOS 80D dibekali dengan sensor APS-C dengan ukuran 24MP terintegrasi prosesor DIGIC 6 dan 45 titik autofokus Hybrid serta rentang ISO 100-16000 yang bisa ditingkatkan ke 25600. Beralih ke Live View dan sistem autofokus pada video, 80D menggunakan teknologi Dual Pixel CMOS AF seperti 70D, yang berarti memiliki titik deteksi fase pada sensor gambar itu sendiri. Sistem AF mode Live View dan Video yang dimiliki Canon EOS 80D cukup bagus dan cepat untuk memotret subjek bergerak dalam beberapa situasi. Sementara itu, sistem pemrosesan DIGIC 6 yang dimiliki kamera ini juga membantu memproses gambar yang lebih tajam serta minim noise.',
                'camera_price' => 5000000,
                'foto_camera' => 'Canon 80D.jpg',
                'user_id' => 2,
            ],
            [
                'transaction_id' => 161616,
                'camera_name' => 'Canon 77D',
                'camera_spesification' =>
                'Kelebihan kamera ini adalah kualitas gambar yang dihasilkan sangat luar biasa, sistem autofokus 45 titik, performa AF Live View yang luar biasa, dan interface layar sentuh yang menjadikan Canon EOS 77D sebagai salah satu kamera DSLR terbaik.',
                'camera_price' => 4900000,
                'foto_camera' => 'Canon 77D.jpg',
                'user_id' => 2,
            ],
            [
                'transaction_id' => 171717,
                'camera_name' => 'Canon Infinix 68D',
                'camera_spesification' =>
                'Kelebihan kamera ini adalah kualitas gambar yang dihasilkan sangat luar biasa, sistem autofokus 45 titik, performa AF Live View yang luar biasa, dan interface layar sentuh yang menjadikan Canon Infinix 68D sebagai salah satu kamera DSLR terbaik.',
                'camera_price' => 4500000,
                'foto_camera' => 'Canon Infinix 68D.jpg',
                'user_id' => 2,
            ],
        ];

        foreach ($premiereCamera as $data) {
            Camera::insert([
                'transaction_id' => $data['transaction_id'],
                'camera_name' => $data['camera_name'],
                'camera_spesification' => $data['camera_spesification'],
                'camera_price' => $data['camera_price'],
                'foto_camera' => $data['foto_camera'],
                'user_id' => $data['user_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
