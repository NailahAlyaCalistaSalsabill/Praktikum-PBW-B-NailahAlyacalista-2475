#  Laporan Tugas Praktikum Pemrograman Berbasis Web

<div align="center">

**Nama:** Nailah AlyaCalista Salsabill  
**NPM:** 4524210075  
**Program Studi:** Teknik Informatika  
**Mata Kuliah:** Pemrograman Berbasis Web - B  

---

</div>

## Tujuan Tugas

Laporan ini mendokumentasikan pengerjaan latihan pada **Pertemuan 1** dan **Pertemuan 2**, mencakup:
* Pengujian contoh kode awal.
* Rincian modifikasi logika dan antarmuka (UI).
* Penjelasan bagian kode penting (Konsep Dasar & OOP PHP).
* Bukti tangkapan layar (*screenshot*) sebelum dan sesudah modifikasi.
* Analisis *error*, penyebab, serta langkah penanganannya.

---

## Struktur Proyek

| Pertemuan | Kode Awal (Latihan) | Hasil Modifikasi (Tugas) |
| :---: | :--- | :--- |
| **Pertemuan 1** | `p1/Biodata.php`<br>`p1/Kalkulator.php` | `p1/Biodata.modifikasi.php`<br>`p1/Kalkulator.modifikasi.php` |
| **Pertemuan 2** | `p2/Identitas.php`<br>`p2/Hitungan.php` | `p2/Identitas.modifikasi.php`<br>`p2/Hitungan.modifikasi.php` |

---

##  1. Menjalankan Seluruh Contoh

Seluruh file PHP pada folder **p1** dan **p2** telah diperiksa validasi sintaksnya dan dipastikan **bebas dari error sintaks**. Program dapat dijalankan melalui Apache XAMPP dengan mengakses alamat URL berikut:

| Berkas | Jenis | Alamat Localhost |
| :--- | :---: | :--- |
| `Biodata.php` | Awal | `http://localhost/Praktikum-PBW-B-Pertemuan-1-2/p1/Biodata.php` |
| `Kalkulator.php` | Awal | `http://localhost/Praktikum-PBW-B-Pertemuan-1-2/p1/Kalkulator.php` |
| `Biodata.modifikasi.php` | Modifikasi | `http://localhost/Praktikum-PBW-B-Pertemuan-1-2/p1/Biodata.modifikasi.php` |
| `Kalkulator.modifikasi.php` | Modifikasi | `http://localhost/Praktikum-PBW-B-Pertemuan-1-2/p1/Kalkulator.modifikasi.php` |
| `Identitas.php` | Awal | `http://localhost/Praktikum-PBW-B-Pertemuan-1-2/p2/Identitas.php` |
| `Hitungan.php` | Awal | `http://localhost/Praktikum-PBW-B-Pertemuan-1-2/p2/Hitungan.php` |
| `Identitas.modifikasi.php` | Modifikasi | `http://localhost/Praktikum-PBW-B-Pertemuan-1-2/p2/Identitas.modifikasi.php` |
| `Hitungan.modifikasi.php` | Modifikasi | `http://localhost/Praktikum-PBW-B-Pertemuan-1-2/p2/Hitungan.modifikasi.php` |

---

## 2. Modifikasi Bermakna

###  Pertemuan 1
1. **Biodata (`Biodata.modifikasi.php`):**
   * Menambahkan logika fungsi `statusKelulusan()` dengan skala predikat cum laude (*Summa Cum Laude* $\ge$ 3.90, *Magna Cum Laude* $\ge$ 3.70, *Cum Laude* $\ge$ 3.50).
   * Merombak antarmuka visual menggunakan CSS *Card Layout*, efek bayangan (`box-shadow`), serta sudut melengkung (`border-radius`) agar lebih modern.
2. **Kalkulator (`Kalkulator.modifikasi.php`):**
   * Merancang UI antarmuka form interaktif dalam wadah kartu (*card container*) menggunakan CSS Styling.
   * Menambahkan atribut `step="any"` pada input angka agar mendukung kalkulasi angka desimal.
   * Menambahkan pesan validasi penanganan *error* saat pembagian dengan angka nol (`0`).

###  Pertemuan 2
1. **Identitas (`Identitas.modifikasi.php`):**
   * Mengembangkan penanganan form input dan logika kondisi untuk memproses data pengguna secara dinamis.
   * Mengubah penyajian luaran (*output*) teks polos menjadi tampilan komponen kartu profil yang rapi.
2. **Hitungan (`Hitungan.modifikasi.php`):**
   * Menambahkan kalkulasi perhitungan matematika lanjutan dan validasi input.
   * Mengatur struktur tata letak hasil luaran ke dalam format yang lebih bersih dan mudah dibaca.

---

## 3. Lima Bagian Kode Penting

1. **Fungsi Logika `statusKelulusan()` (Percabangan)**  
   Mengevaluasi nilai IPK mahasiswa dan mengembalikan string predikat kelulusan secara terpisah dari lapisan HTML.
2. **Array Associative & Loop `foreach`**  
   Menyimpan data biodata mahasiswa (`nim`, `nama`, `prodi`, `semester`, `ipk`) secara terstruktur lalu menampilkan daftar pasangan *key-value* secara otomatis.
3. **Pengamanan `htmlspecialchars()`**  
   Mengompresi dan mensterilkan string sebelum ditampilkan ke browser untuk mencegah celah keamanan *Cross-Site Scripting* (XSS).
4. **Kondisional `switch-case` pada Kalkulator**  
   Mengeksekusi operasi matematika yang dipilih pengguna (`+`, `-`, `*`, `/`) serta menerapkan guard condition terhadap pembagian dengan angka nol.
5. **Form Handling `$_SERVER['REQUEST_METHOD'] === 'POST'`**  
   Memastikan pemrosesan skrip PHP hanya berjalan saat pengguna mengirimkan form input melalui metode `POST`.

---

##  4. Tangkapan Layar (Screenshot) Program

###  Pertemuan 1

#### A. Sebelum Modifikasi
* **`Biodata.php` & `Kalkulator.php`:**  
  *<img width="960" height="540" alt="Screenshot 2026-09-27 224149" src="https://github.com/user-attachments/assets/4812a3ac-eb39-49f5-8bbe-45b4c5982181" /> <img width="960" height="540" alt="Screenshot 2026-09-27 215353" src="https://github.com/user-attachments/assets/5631cfd5-3bbf-4d25-ac3d-5d7147313c25" /> *

---

#### B. Sesudah Modifikasi
* **`Biodata.modifikasi.php` & `Kalkulator.modifikasi.php`:**  
  *<img width="960" height="540" alt="Screenshot 2026-09-27 224704" src="https://github.com/user-attachments/assets/749b4ee7-85ff-4c0b-9749-532c5ae27c68" /> <img width="960" height="540" alt="Screenshot 2026-09-27 224505" src="https://github.com/user-attachments/assets/303d06a4-7df9-4190-99bf-96e2ba78ebba" />
 /> *

---

###  Pertemuan 2

#### A. Sebelum Modifikasi
* **`Identitas.php` & `Hitungan.php`:**  
  *<img width="960" height="540" alt="Screenshot 2026-09-27 225351" src="https://github.com/user-attachments/assets/087365d3-970a-4d12-be94-2c4411bc0294" /> <img width="960" height="540" alt="Screenshot 2026-09-27 225246" src="https://github.com/user-attachments/assets/17f7b806-6cbe-42c2-8cf5-eb961e60b7b4" /> *

---

#### B. Sesudah Modifikasi
* **`Identitas.modifikasi.php` & `Hitungan.modifikasi.php`:**  
  *<img width="960" height="540" alt="Screenshot 2026-09-28 004936" src="https://github.com/user-attachments/assets/91142998-7cf6-406c-adee-4266c54f2d02" /> <img width="960" height="540" alt="Screenshot 2026-09-27 225254" src="https://github.com/user-attachments/assets/5e71ed47-641a-46ab-8641-2eef1a6b9d8c" /> *

---

##  5. Error, Penyebab, dan Perbaikan

| Komponen | Detail |
| :--- | :--- |
| **Pesan Error** | `Author identity unknown` / `fatal: unable to auto-detect email address` saat menjalankan perintah `git commit`. |
| **Penyebab** | Git belum mendeteksi konfigurasi profil identitas pengguna (`user.email` dan `user.name`) pada lingkungan lokal laptop. |
| **Langkah Perbaikan** | Menjalankan perintah `git config --global user.email "email@gmail.com"` dan `git config --global user.name "NailahAlyaCalistaSalsabill"` melalui terminal sebelum mengulangi proses commit. |

---

##  Kesimpulan

Seluruh tugas praktikum pada **Pertemuan 1** dan **Pertemuan 2** telah berhasil diimplementasikan dan diuji tanpa kendala *error*. Modifikasi yang dilakukan mencakup perbaikan logika bisnis, pengamanan data input, serta perombakan antarmuka pengguna (UI) agar tampilan web menjadi lebih profesional dan responsif.
