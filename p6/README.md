# Laporan Praktikum Pemrograman Berbasis Web
**Materi:** Kompleksitas Operasi CRUD, Interaksi PHP-MySQL, & Validasi Formulir  
**Nama Mahasiswa:** Nailah AlyaCalista Salsabill  
**NPM:** 4524210075  
**Kelas:** Praktikum Pemrograman Berbasis Web (Kelas B)

---

## 1. Daftar File Program (10 File Proyek)

Proyek sistem pengelolaan data mahasiswa ini terdiri dari 10 file utama dengan fungsi spesifik masing-masing:
1. **`Koneksi.php`**: Menghubungkan skrip PHP ke database MySQL (`akademik`) menggunakan parameter host, user, password, dan port[cite: 25].
2. **`Form.php`**: Templat formulir dasar HTML untuk input data mahasiswa secara polos/base code[cite: 33, 34].
3. **`Create.php`**: Antarmuka form tambah data mahasiswa yang dirancang modern menggunakan kerangka Tailwind CSS[cite: 16, 17, 18, 19].
4. **`Simpan.php`**: Skrip pemrosesan awal (base code) untuk memasukkan data dari form ke dalam database[cite: 35, 36].
5. **`Store.php`**: Skrip pemrosesan penyimpanan data (metode POST) yang dilengkapi alert interaktif, validasi, dan prepared statements[cite: 37, 38, 45, 46, 47].
6. **`Data.php`**: Skrip pengujian pengambilan dan penampilan data mentah dari tabel database[cite: 25].
7. **`Index.php`**: Halaman utama dashboard yang menampilkan tabel data mahasiswa lengkap dengan fitur pencarian, badge IPK, dan styling Tailwind CSS[cite: 39, 40, 41, 42, 43, 44].
8. **`Edit.php`**: Antarmuka form untuk mengubah data mahasiswa berdasarkan parameter NIM yang dipilih[cite: 27, 28, 29].
9. **`Update.php`**: Skrip pemrosesan untuk menyimpan perubahan data mahasiswa yang telah diedit ke database[cite: 31, 32].
10. **`Delete.php`**: Skrip fungsional untuk menghapus data mahasiswa dari database berdasarkan NIM[cite: 33, 34].

---

## 2. Perbandingan Sebelum dan Sesudah Modifikasi

| Komponen / Fitur | Sebelum Modifikasi (Base Code) | Sesudah Modifikasi (Updated Code) |
| :--- | :--- | :--- |
| **Antarmuka UI** | HTML Polos tanpa styling (`Form.php`, `Data.php`)[cite: 25, 33, 34] | Responsif & Modern menggunakan **Tailwind CSS** (`Create.php`, `Index.php`, `Edit.php`)[cite: 16, 30, 40, 41, 44] |
| **Fitur Pencarian** | Tidak ada fitur pencarian data | Fitur **Search Bar** interaktif berdasarkan Nama atau NIM (`Index.php`)[cite: 39, 40, 44] |
| **Visualisasi Data** | Menampilkan teks angka IPK polos | Fitur **Badge Predikat IPK** (Cum laude, Sangat Baik, Baik)[cite: 42, 44] |
| **Keamanan & Validasi** | Kueri langsung rentan SQL Injection (`Simpan.php`)[cite: 35, 36] | Validasi Server-Side & Prepared Statements (`Store.php`, `Update.php`)[cite: 31, 45, 46, 47] |

---

## 3. Bukti Tangkapan Layar (Screenshot Lengkap 1 - 36)

### A. TAHAP SETUP, KONEKSI, & DATA MENTAH
1. **Pengujian File Koneksi Database (`Koneksi.php`)** $\rightarrow$ `ss1.png`[cite: 25]
2. **Struktur Kode Form Tambah Bagian 1 (`Create.php`)** $\rightarrow$ `ss2.jpg`[cite: 16]
3. **Struktur Kode Form Tambah Bagian 2 (`Create.php`)** $\rightarrow$ `ss3.jpg`[cite: 17]
4. **Struktur Kode Form Tambah Bagian 3 (`Create.php`)** $\rightarrow$ `ss4.jpg`[cite: 18]
5. **Tampilan Form Tambah Mahasiswa di Browser** $\rightarrow$ `ss5.png`[cite: 19]
6. **Struktur Kode Halaman Utama Bagian 1 (`Index.php`)** $\rightarrow$ `ss6.jpg`[cite: 20]
7. **Struktur Kode Halaman Utama Bagian 2 (`Index.php`)** $\rightarrow$ `ss7.jpg`[cite: 21]
8. **Struktur Kode Halaman Utama Bagian 3 (`Index.php`)** $\rightarrow$ `ss8.jpg`[cite: 22]
9. **Struktur Kode Halaman Utama Bagian 4 (`Index.php`)** $\rightarrow$ `ss9.jpg`[cite: 23]
10. **Tampilan Dashboard Utama di Browser (`Index.php`)** $\rightarrow$ `ss10.png`[cite: 24]
11. **Pengujian Skrip Data Mentah (`Data.php`)** $\rightarrow$ `ss11.png`[cite: 25]
12. **Verifikasi Database di phpMyAdmin** $\rightarrow$ `ss12.jpg`[cite: 26]

---

### B. TAHAP EDIT, UPDATE, & HAPUS DATA
13. **Struktur Kode Form Edit Bagian 1 (`Edit.php`)** $\rightarrow$ `ss13.jpg`[cite: 27]
14. **Struktur Kode Form Edit Bagian 2 (`Edit.php`)** $\rightarrow$ `ss14.jpg`[cite: 28]
15. **Struktur Kode Form Edit Bagian 3 (`Edit.php`)** $\rightarrow$ `ss15.jpg`[cite: 29]
16. **Tampilan Form Edit Data di Browser** $\rightarrow$ `ss16.png`[cite: 30]
17. **Struktur Kode Pemroses Perubahan (`Update.php`) Bagian 1** $\rightarrow$ `ss17.jpg`[cite: 31]
18. **Struktur Kode Pemroses Perubahan (`Update.php`) Bagian 2** $\rightarrow$ `ss18.jpg`[cite: 32]
19. **Struktur Kode Pemroses Hapus Data (`Delete.php`)** $\rightarrow$ `ss19.jpg`[cite: 33]
20. **Tampilan Konfirmasi Hapus via JavaScript di Browser** $\rightarrow$ `ss20.png`[cite: 34]

---

### C. TAHAP BASE CODE & MODIFIKASI LANJUTAN (`Store.php` & `Index.php`)
21. **Struktur Base Code Formulir Input (`Form.php`) Bagian 1** $\rightarrow$ `ss21.png`[cite: 33]
22. **Struktur Base Code Formulir Input (`Form.php`) Bagian 2** $\rightarrow$ `ss22.png`[cite: 34]
23. **Struktur Base Code Pemrosesan Simpan (`Simpan.php`) Bagian 1** $\rightarrow$ `ss23.png`[cite: 35]
24. **Struktur Base Code Pemrosesan Simpan (`Simpan.php`) Bagian 2** $\rightarrow$ `ss24.png`[cite: 36]
25. **Struktur Kode Pemrosesan Penyimpanan Lanjutan (`Store.php`) Bagian 1** $\rightarrow$ `ss25.png`[cite: 37]
26. **Struktur Kode Pemrosesan Penyimpanan Lanjutan (`Store.php`) Bagian 2** $\rightarrow$ `ss26.png`[cite: 38]
27. **Skrip Modifikasi Halaman Utama (`Index.php`) - Logika Pencarian Data** $\rightarrow$ `ss27.jpg`[cite: 39]
28. **Skrip Modifikasi Halaman Utama (`Index.php`) - UI Search Bar & Tailwind** $\rightarrow$ `ss28.jpg`[cite: 40]
29. **Skrip Modifikasi Halaman Utama (`Index.php`) - Header Tabel Modifikasi** $\rightarrow$ `ss29.jpg`[cite: 41]
30. **Skrip Modifikasi Halaman Utama (`Index.php`) - Penutupan Struktur & Aksi** $\rightarrow$ `ss30.jpg`[cite: 42]
31. **Skrip Penutup Kondisi Tabel Kosong (`Index.php`)** $\rightarrow$ `ss31.jpg`[cite: 43]
32. **Tampilan Akhir Dashboard Terintegrasi di Browser** $\rightarrow$ `ss32.png`[cite: 44]
33. **Implementasi Validasi Server-Side pada Skrip Penyimpanan (`Store.php`)** $\rightarrow$ `ss33.jpg`[cite: 45]
34. **Implementasi Prepared Statement Eksekusi Data (`Store.php`)** $\rightarrow$ `ss34.jpg`[cite: 46]
35. **Penyelesaian Blok Kode Akhir Proses Penyimpanan (`Store.php`)** $\rightarrow$ `ss35.png`[cite: 47]
36. **Pemeriksaan Akhir Data Bersih di phpMyAdmin (Tanpa Data Kosong)** $\rightarrow$ `ss36.png`

---

## 4. Penjelasan 5 Bagian Kode Paling Penting

1. **`$koneksi = mysqli_connect($host, $user, $password, $dbname, $port);`** (`Koneksi.php`)  
   Membangun jembatan komunikasi antara skrip PHP dan database MySQL lokal[cite: 25].
2. **`$cari = isset($_GET['cari']) ? mysqli_real_escape_string($koneksi, $_GET['cari']) : '';`** (`Index.php`)  
   Mengamankan string kata kunci pencarian yang dimasukkan oleh pengguna untuk mencegah celah keamanan[cite: 39].
3. **`SELECT * FROM mahasiswa WHERE (nama LIKE '%$cari%' OR nim LIKE '%$cari%')`** (`Index.php`)  
   Mencari record mahasiswa secara fleksibel berdasarkan kemiripan nama atau NIM[cite: 39].
4. **`if ($data['ipk'] >= 3.50) { ... }`** (`Index.php`)  
   Logika pengondisian untuk menentukan warna dan label badge predikat akademik mahasiswa secara otomatis[cite: 42].
5. **`if (empty($nim) || empty($nama) || ...)`** (`Store.php`)  
   Validasi server-side untuk memastikan tidak ada inputan kosong yang lolos masuk ke dalam database[cite: 45].

---

## 5. Penanganan Error yang Pernah Terjadi

* **Error:** Peringatan `Undefined array key` saat file diakses langsung tanpa parameter POST atau GET[cite: 27, 39].
* **Penyebab:** Variabel parameter HTTP tidak terdefinisi di dalam URL/form jika halaman dipanggil tanpa melalui submit atau tautan navigasi[cite: 27, 39].
* **Solusi:** Menggunakan fungsi `isset()` dan `empty()` untuk mengecek keberadaan variabel sebelum diproses di dalam kode PHP[cite: 39, 45].