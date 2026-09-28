# MELORA MART — Mini Project Product Manager

Aplikasi web **PHP + MySQL** untuk tugas akhir Product Manager. Fitur dan pengamanan dibuat mengikuti seluruh perintah pada materi tugas:

## Fitur wajib yang dipenuhi
- **Create:** nama, kategori, harga, stok.
- **Read:** daftar produk menggunakan **card responsif**.
- **Update:** edit berdasarkan **ID**.
- **Delete:** hanya menerima **POST + CSRF**.
- Validasi server-side: **nama minimal 3 karakter, harga > 0, stok >= 0**.
- **Nama produk unik**.
- Semua query database menggunakan **PDO prepared statement** untuk INSERT, SELECT berdasarkan ID, UPDATE, dan DELETE.
- Output nama/kategori memakai `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')` sehingga input seperti `<b>Promo</b>` tampil sebagai teks dan tidak menjadi HTML.
- Setelah create/update/delete dilakukan redirect kembali ke daftar sehingga **refresh tidak membuat data ganda**.
- Layout responsif, termasuk saat layar sempit.

## Cara menjalankan di XAMPP
1. Extract folder `MeloraMart` ke `C:\xampp\htdocs\`.
2. Jalankan **Apache** dan **MySQL** di XAMPP.
3. Buka `http://localhost/phpmyadmin`.
4. Import file `database/toko_amanah.sql`.
5. Buka `http://localhost/MeloraMart/`.

Konfigurasi database ada di `config.php` dan menggunakan default XAMPP: user `root`, password kosong.

## Uji demo checklist
1. Tambah produk valid → produk muncul di daftar.
2. Isi nama kurang dari 3 karakter → ditolak, tidak tersimpan.
3. Isi harga negatif atau stok negatif → ditolak dengan pesan jelas.
4. Setelah tambah produk, tekan refresh → tidak ada duplikasi.
5. Masukkan nama `<b>Promo</b>` → ditampilkan sebagai teks literal, bukan teks tebal/HTML.
6. Kecilkan lebar browser/HP → card membungkus dengan rapi.
7. Coba membuka `delete.php` lewat GET → tidak menghapus data; penghapusan hanya POST + CSRF.

## Refleksi tugas
**Bagian yang paling rentan:** input pengguna dan alur request karena data berasal dari form dan dapat dimanipulasi.

**Kontrol keamanan yang diterapkan:**
- Validasi server-side untuk panjang nama, harga, dan stok.
- Prepared statement PDO untuk mencegah SQL Injection.
- Constraint `UNIQUE` pada nama produk untuk mencegah data nama ganda.
- CSRF token untuk operasi Delete dan form Create/Update.
- `htmlspecialchars()` untuk output agar input HTML/script tidak dieksekusi.
- Delete menggunakan POST, bukan GET.
