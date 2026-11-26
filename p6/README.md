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
1. **Pengujian File Koneksi Database (`Koneksi.php`)**  
   ![ss1](foto/ss1.png)
2. **Struktur Kode Form Tambah Bagian 1 (`Create.php`)**  
   ![ss2](foto/ss2.png)
3. **Struktur Kode Form Tambah Bagian 2 (`Create.php`)**  
   ![ss3](foto/ss3.png)
4. **Struktur Kode Form Tambah Bagian 3 (`Create.php`)**  
   ![ss4](foto/ss4.png)
5. **Tampilan Form Tambah Mahasiswa di Browser**  
   ![ss5](foto/ss5.png)
6. **Struktur Kode Halaman Utama Bagian 1 (`Index.php`)**  
   ![ss6](foto/ss6.png)
7. **Struktur Kode Halaman Utama Bagian 2 (`Index.php`)**  
   ![ss7](foto/ss7.png)
8. **Struktur Kode Halaman Utama Bagian 3 (`Index.php`)**  
   ![ss8](foto/ss8.png)
9. **Struktur Kode Halaman Utama Bagian 4 (`Index.php`)**  
   ![ss9](foto/ss9.png)
10. **Tampilan Dashboard Utama di Browser (`Index.php`)**  
    ![ss10](foto/ss10.png)
11. **Pengujian Skrip Data Mentah (`Data.php`)**  
    ![ss11](foto/ss11.png)
12. **Verifikasi Database di phpMyAdmin**  
    ![ss12](foto/ss12.png)

---

### B. TAHAP EDIT, UPDATE, & HAPUS DATA
13. **Struktur Kode Form Edit Bagian 1 (`Edit.php`)**  
    ![ss13](foto/ss13.png)
14. **Struktur Kode Form Edit Bagian 2 (`Edit.php`)**  
    ![ss14](foto/ss14.png)
15. **Struktur Kode Form Edit Bagian 3 (`Edit.php`)**  
    ![ss15](foto/ss15.png)
16. **Tampilan Form Edit Data di Browser**  
    ![ss16](foto/ss16.png)
17. **Struktur Kode Pemroses Perubahan (`Update.php`) Bagian 1**  
    ![ss17](foto/ss17.png)
18. **Struktur Kode Pemroses Perubahan (`Update.php`) Bagian 2**  
    ![ss18](foto/ss18.png)
19. **Struktur Kode Pemroses Hapus Data (`Delete.php`)**  
    ![ss19](foto/ss19.png)
20. **Tampilan Konfirmasi Hapus via JavaScript di Browser**  
    ![ss20](foto/ss20.png)

---

### C. TAHAP BASE CODE & MODIFIKASI LANJUTAN (`Store.php` & `Index.php`)
21. **Struktur Base Code Formulir Input (`Form.php`) Bagian 1**  
    ![ss21](foto/ss21.png)
22. **Struktur Base Code Formulir Input (`Form.php`) Bagian 2**  
    ![ss22](foto/ss22.png)
23. **Struktur Base Code Pemrosesan Simpan (`Simpan.php`) Bagian 1**  
    ![ss23](foto/ss23.png)
24. **Struktur Base Code Pemrosesan Simpan (`Simpan.php`) Bagian 2**  
    ![ss24](foto/ss24.png)
25. **Struktur Kode Pemrosesan Penyimpanan Lanjutan (`Store.php`) Bagian 1**  
    ![ss25](foto/ss25.png)
26. **Struktur Kode Pemrosesan Penyimpanan Lanjutan (`Store.php`) Bagian 2**  
    ![ss26](foto/ss26.png)
27. **Skrip Modifikasi Halaman Utama (`Index.php`) - Logika Pencarian Data**  
    ![ss27](foto/ss27.png)
28. **Skrip Modifikasi Halaman Utama (`Index.php`) - UI Search Bar & Tailwind**  
    ![ss28](foto/ss28.png)
29. **Skrip Modifikasi Halaman Utama (`Index.php`) - Header Tabel Modifikasi**  
    ![ss29](foto/ss29.png)
30. **Skrip Modifikasi Halaman Utama (`Index.php`) - Penutupan Struktur & Aksi**  
    ![ss30](foto/ss30.png)
31. **Skrip Penutup Kondisi Tabel Kosong (`Index.php`)**  
    ![ss31](foto/ss31.png)
32. **Tampilan Akhir Dashboard Terintegrasi di Browser**  
    ![ss32](foto/ss32.png)
33. **Implementasi Validasi Server-Side pada Skrip Penyimpanan (`Store.php`)**  
    ![ss33](foto/ss33.png)
34. **Implementasi Prepared Statement Eksekusi Data (`Store.php`)**  
    ![ss34](foto/ss34.png)
35. **Penyelesaian Blok Kode Akhir Proses Penyimpanan (`Store.php`)**  
    ![ss35](foto/ss35.png)
36. **Pemeriksaan Akhir Data Bersih di phpMyAdmin (Tanpa Data Kosong)**  
    ![ss36](foto/ss36.png)

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
