# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS WEB

**Identitas Mahasiswa:**
* **Nama:** Nailah AlyaCalista Salsabill
* **NPM:** 4524210075
* **Kelas:** B
* **Mata Kuliah:** Praktikum Pemrograman Berbasis Web
* **Program Studi:** Teknik Informatika - Universitas Pancasila

---

# PERTEMUAN 3: DASAR DATABASE, DDL, KEYS & CONSTRAINTS

## 1. Eksekusi Kode Contoh (Output Tanpa Error Kritis)
Seluruh query DDL dan pembuatan tabel dari materi Pertemuan 3 telah berhasil dijalankan pada DBMS MariaDB / MySQL melalui phpMyAdmin di basis data `akademik1`.

```sql
-- Membuat Database akademik1
CREATE DATABASE IF NOT EXISTS akademik1 
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE akademik1;

-- Membuat Tabel Mahasiswa dengan Constraints
CREATE TABLE mahasiswa (
    nim VARCHAR(15) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    prodi VARCHAR(80) NOT NULL,
    angkatan YEAR NOT NULL,
    ipk DECIMAL(3,2) DEFAULT 0.00,
    CHECK (ipk BETWEEN 0.00 AND 4.00)
) ENGINE=InnoDB;

-- Membuat Tabel Dosen
CREATE TABLE dosen (
    nidn VARCHAR(20) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(120) UNIQUE
) ENGINE=InnoDB;

-- Membuat Tabel Mata Kuliah dengan Foreign Key
CREATE TABLE mata_kuliah (
    kode_mk VARCHAR(12) PRIMARY KEY,
    nama_mk VARCHAR(100) NOT NULL,
    sks TINYINT UNSIGNED NOT NULL,
    nidn VARCHAR(20),
    CONSTRAINT fk_mk_dosen FOREIGN KEY (nidn) 
        REFERENCES dosen(nidn) 
        ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB;

-- Membuat Tabel KRS dengan Composite Unique & Multiple Foreign Keys
CREATE TABLE krs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(15) NOT NULL,
    kode_mk VARCHAR(12) NOT NULL,
    semester TINYINT UNSIGNED NOT NULL,
    tahun_ajaran VARCHAR(9) NOT NULL,
    nilai_huruf CHAR(2) NULL,
    CONSTRAINT uq_krs UNIQUE (nim, kode_mk, semester, tahun_ajaran),
    CONSTRAINT fk_krs_mahasiswa FOREIGN KEY (nim) 
        REFERENCES mahasiswa(nim) 
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_krs_mk FOREIGN KEY (kode_mk) 
        REFERENCES mata_kuliah(kode_mk) 
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;
```

---

## 2. Modifikasi Bermakna (Minimal 2 Modifikasi)

### Modifikasi 1: Penambahan Field `no_hp` dan Validasi Panjang Minimal Nomor Telepon
Menambahkan kolom `no_hp` pada tabel `mahasiswa` disertai constraint `CHECK` untuk memastikan nomor HP yang diinput memiliki panjang minimal 10 digit.
```sql
ALTER TABLE `mahasiswa` 
ADD COLUMN `no_hp` VARCHAR(15) AFTER `email`,
ADD CONSTRAINT `chk_no_hp` CHECK (LENGTH(`no_hp`) >= 10);
```

### Modifikasi 2: Penambahan Field `status_aktif` (ENUM) dan Validasi Batasan SKS Mata Kuliah
Menambahkan kolom `status_aktif` ber-tipe `ENUM` pada tabel `mahasiswa` serta menambahkan constraint `CHECK` pada tabel `mata_kuliah` agar jumlah SKS berada dalam rentang valid (1 - 6 SKS).
```sql
-- Modifikasi A: Tambah kolom status_aktif pada mahasiswa
ALTER TABLE `mahasiswa` 
ADD COLUMN `status_aktif` ENUM('Aktif', 'Cuti', 'Lulus', 'DO') DEFAULT 'Aktif' AFTER `prodi`;

-- Modifikasi B: Tambah constraint check SKS pada mata_kuliah
ALTER TABLE `mata_kuliah` 
ADD CONSTRAINT `chk_sks` CHECK (`sks` BETWEEN 1 AND 6);
```

---

## 3. Penjelasan 5 Bagian Kode Paling Penting (Pertemuan 3)

1. **`PRIMARY KEY`**:
   * *Kode:* `nim VARCHAR(15) PRIMARY KEY`
   * *Penjelasan:* Menentukan `nim` sebagai entitas unik utama yang mengidentifikasi setiap baris data mahasiswa secara spesifik tanpa boleh ada nilai yang sama atau `NULL`.

2. **`UNIQUE` Constraint pada Email**:
   * *Kode:* `email VARCHAR(120) NOT NULL UNIQUE`
   * *Penjelasan:* Menjamin bahwa alamat email tidak boleh sama antar mahasiswa/dosen, menjaga agar satu email hanya terdaftar untuk satu akun.

3. **`FOREIGN KEY ... ON UPDATE CASCADE ON DELETE CASCADE`**:
   * *Kode:* `CONSTRAINT fk_krs_mahasiswa FOREIGN KEY (nim) REFERENCES mahasiswa(nim) ON UPDATE CASCADE ON DELETE CASCADE`
   * *Penjelasan:* Membentuk relasi integritas referensial. Jika data `nim` pada tabel `mahasiswa` diubah atau dihapus, maka seluruh record transaksi KRS terkait di tabel `krs` secara otomatis ter-update atau terhapus.

4. **`CHECK (ipk BETWEEN 0.00 AND 4.00)`**:
   * *Kode:* `CHECK (ipk BETWEEN 0.00 AND 4.00)`
   * *Penjelasan:* Constraint batasan data untuk menjamin integritas nilai IPK. Database akan menolak secara otomatis jika input data IPK bernilai negatif atau melebihi 4.00.

5. **`CONSTRAINT uq_krs UNIQUE` (Composite Unique Key)**:
   * *Kode:* `CONSTRAINT uq_krs UNIQUE (nim, kode_mk, semester, tahun_ajaran)`
   * *Penjelasan:* Mencegah duplikasi pengambilan mata kuliah. Seorang mahasiswa tidak dapat mengontrak kode mata kuliah yang sama lebih dari sekali dalam semester dan tahun ajaran yang sama.

---

## 4. Screenshot Sebelum dan Sesudah Modifikasi (Pertemuan 3)

### Pembuatan Database & DDL Latihan Awal:
* **Langkah 1:** Pembuatan Database `akademik`
  ![SS1 - Membuat Database akademik](ss1.png)
* **Langkah 2:** Query DDL Pembuatan Tabel `mahasiswa` & `prodi`
  ![SS2 - Query Create Table awal](ss2.png)
* **Langkah 3:** Output Hasil Eksekusi Pembuatan Tabel awal
  ![SS3 - Output Create Table awal](ss3.png)
* **Langkah 4 & 5:** Query & Output Insert Data `prodi`
  ![SS4 - Query Insert prodi](ss4.png)
  ![SS5 - Output Insert prodi](ss5.png)
* **Langkah 6 & 7:** Query & Output `ALTER TABLE` Foreign Key
  ![SS6 - Query Alter Table FK](ss6.png)
  ![SS7 - Output Alter Table FK](ss7.png)

### Pembuatan Database & DDL `akademik1` (Materi Modul Utama):
* **Langkah 12:** Pembuatan Database `akademik1`
  ![SS12 - Membuat Database akademik1](ss12.png)
* **Langkah 13 & 14:** Query DDL & Executed Result Pembuatan Tabel `mahasiswa` (`akademik1`)
  ![SS13 - Query DDL Mahasiswa akademik1](/ss13.png)
  ![SS14 - Output Sukses DDL Mahasiswa](ss14.png)
* **Langkah 15 & 16:** Query DDL & Executed Result Pembuatan Tabel `dosen` & `mata_kuliah`
  ![SS15 - Query DDL Dosen & MK](ss15.png)
  ![SS16 - Output Sukses DDL Dosen & MK](ss16.png)

### Screenshot Modifikasi Pertemuan 3:
* **Modifikasi 1 (Tambah Kolom `no_hp` & Constraint `chk_no_hp`):**
  * **Query Modifikasi 1:**
    ![SS21 - Query Modifikasi 1 no_hp](ss21.png)
  * **Output Modifikasi 1 (Tabel Mahasiswa dengan kolom `no_hp`):**
    ![SS22 - Output Modifikasi 1 no_hp](ss22.png)

* **Modifikasi 2 (Tambah `status_aktif` & Constraint `chk_sks`):**
  * **Query Modifikasi 2:**
    ![SS23 - Query Modifikasi 2 status_aktif dan chk_sks](ss23.png)
  * **Output Sukses Modifikasi 2:**
    ![SS24 - Output Sukses Modifikasi 2](ss24.png)

---

## 5. Error yang Pernah Muncul, Penyebab, dan Langkah Perbaikannya (Pertemuan 3)

* **Pesan Error:**
  `#4025 - CONSTRAINT 'mahasiswa.ipk' failed for 'akademik'.'mahasiswa'`
* **Bukti Screenshot Error:**
  * **Query Penyebab Error:**
    ![SS8 - Query Input IPK 4.50](ss8.png)
  * **Tampilan Pesan Error phpMyAdmin:**
    ![SS9 - Pesan Error Constraint IPK Failed](ss9.png)
* **Penyebab:**
  Gagal saat mencoba memasukkan data mahasiswa dengan nilai IPK `4.50`. Nilai tersebut melanggar aturan constraint `CHECK (ipk BETWEEN 0.00 AND 4.00)`.
* **Langkah Perbaikan:**
  Mengubah nilai IPK pada query `INSERT` menjadi angka valid dalam rentang `0.00 - 4.00` (misalnya IPK `3.99`).
  * **Query Perbaikan (Sukses Insert - SS11):**
    ![SS11 - Sukses Insert Data Mahasiswa IPK 3.99](ss11.png)

---
---


