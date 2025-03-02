# Proyek GEMS

Sistem manajemen lembur karyawan berbasis Laravel yang dikembangkan sebagai bagian dari persyaratan lamaran pekerjaan.

## Gambaran Umum

Aplikasi web ini memungkinkan organisasi untuk mengelola permintaan lembur karyawan, persetujuan, dan pelaporan. Sistem ini mendukung berbagai peran pengguna dengan izin dan tingkat akses yang sesuai.

## Persyaratan Sistem

- Minimal PHP 8.0
- Composer
- Minimal MySQL 5.7

## Instalasi

1. Clone repositori:
   ```
   git clone https://github.com/dtrzka/Tes_Gems.git
   cd Tes_Gems
   ```

2. Instal dependensi PHP:
   ```
   composer install
   ```

3. Instal dan kompilasi dependensi frontend:
   ```
   npm install
   npm run dev
   ```

4. Pengaturan Lingkungan:
   - Salin `.env.example` ke `.env`
   ```
   cp .env.example .env
   ```
   - Generate kunci aplikasi
   ```
   php artisan key:generate
   ```
   - Konfigurasi database Anda di file `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_anda
   DB_USERNAME=username_database_anda
   DB_PASSWORD=password_database_anda
   ```

5. Pengaturan Database:
   - Buat database MySQL kosong dengan nama yang sama seperti yang ditentukan di file `.env` Anda
   - Jalankan migrasi dan seed database:
   ```
   php artisan migrate
   php artisan db:seed
   ```

6. Mulai server pengembangan lokal:
   ```
   php artisan serve
   ```

7. Kunjungi `http://localhost:8000` di browser Anda untuk mengakses aplikasi

## Pengguna Default

Sistem ini dilengkapi dengan dua akun pengguna yang telah dikonfigurasi sebelumnya untuk pengujian:

1. Pengguna Karyawan
   - NIP : 01001092001
   - Password: test123
   - Peran: Karyawan (role = 0)

2. Pengguna Manager
   - NIP : 01001091988
   - Password: test123
   - Peran: Manager (role = 1)

Pengguna-pengguna ini dapat ditemukan di file `DatabaseSeeder.php`.

## Fitur

- Pengajuan permintaan lembur oleh karyawan
- Proses persetujuan maupun penolakan oleh manager
- Mengunduh Laporan Rekapan Pengajuan dalam bentuk file excel
- Print dan unduh Surat Perintah Lembur dalam bentuk pdf

## Struktur Proyek

Aplikasi ini mengikuti arsitektur MVC Laravel standar:

- Model: `app/Models/`
- Controller: `app/Http/Controllers/`
- View: `resources/views/`
- Route: `routes/web.php`
- Migrasi: `database/migrations/`
- Seed: `database/seeders/`
