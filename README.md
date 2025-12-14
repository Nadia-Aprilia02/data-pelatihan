# Laravel Docker Project - Crud Pelatihan

Project Laravel ini **fully containerized** menggunakan Docker & Docker Compose.  
Semua dependencies (PHP, Composer, MySQL) sudah ada di container, jadi temanmu cukup clone project dan jalankan Docker.

---

## **Prasyarat**

- Docker Desktop (Windows) / Docker Engine (Linux / Mac)
- WSL2 aktif (Windows)
- Minimal port 8000 dan 3306 tersedia di komputer host
- Git (untuk clone project)

---

## **Setup Project**

1. **Clone repository**

```bash
git clone <URL_PROJECT_GITHUB>
cd crud-pelatihan
Copy .env.example menjadi .env

bash
Salin kode
cp .env.example .env
Tidak perlu edit .env, karena sudah siap pakai untuk Docker.

Menjalankan Docker
Build & jalankan container:

bash
Salin kode
docker compose up -d --build
Cek container sudah berjalan:

bash
Salin kode
docker compose ps
Seharusnya ada container:

laravel_app → Laravel

laravel_mysql → MySQL

Generate APP_KEY Laravel
Jalankan di container app:

bash
Salin kode
docker compose exec app php artisan key:generate
Migrasi Database
Masih di container app:

bash
Salin kode
docker compose exec app php artisan migrate
Ini akan membuat semua tabel yang ada di migration Laravel.
Bisa juga jalankan seeders kalau ada.

Akses Laravel
Laravel langsung serve otomatis di http://localhost:8000

Tidak perlu lagi php artisan serve manual.

Shutdown Docker
Jika ingin mematikan semua container:

bash
Salin kode
docker compose down
Volume MySQL tetap ada, data tidak hilang.

Untuk menghapus data juga:

bash
Salin kode
docker compose down -v
Tips
Jangan upload .env ke GitHub, cukup .env.example.

Jika port 3306 bentrok dengan MySQL lokal, ubah di docker-compose.yml:

yaml
Salin kode
ports:
  - "3307:3306"
Semua perintah Laravel bisa dijalankan di container app:

bash
Salin kode
docker compose exec app php artisan <command>