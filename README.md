<p align="center">
    <a href="https://github.com/mizzcode/kelas-maju">
        <img src="https://github.com/mizzcode/kelas-maju/blob/main/public/assets/img/logo/kelasmaju-white.svg" width="150">
    </a>
</p>
<p align="center">
    <img width="959" alt="image" src="https://github.com/mizzcode/kelas-maju/assets/101040281/6ff67c2f-b003-4a03-a561-c63462fdd2c3">
</p>
<hr>
    <b>KelasMaju</b> Adalah Sistem Manajemen Kelas untuk memberikan solusi inovatif yang mengintegrasikan potensi hebat dari <a href="https://laravel.com">Laravel</a> dan estetika modern dari <a href="https://github.com/stisla/stisla">Stisla</a> untuk mengatasi tantangan kompleks dalam pengelolaan kelas. Proyek ini dirancang untuk memberdayakan pendidik dan staff sekolah dengan alat yang diperlukan untuk mengelola, memonitor, dan memfasilitasi pengalaman belajar yang optimal.
</span>

## Installation

1. Clone repositori
```
git clone https://github.com/mizzcode/kelas-maju.git
```

2. Masuk direktori kelas maju
```
cd kelas-maju
```

3. Install package bawahan laravel
```
composer install
```

4. Rename .env.example ke .env
```
copy .env.example .env
```

5. Generate key
```
php artisan key:generate
```

6. Open .env lalu ubah konfigurasi database sesuai yang ingin dipakai
```
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

7. Jalankan Migration & Seeder
```bash
php artisan migrate --seed
```

8. Jalankan website
```bash
php artisan serve
```

## Admin Account
- Email : mizz@gmail.com
- Password : mizz

## License

The <b>KelasMaju</b> is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
