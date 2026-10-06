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
Seluruh query DDL dan struktur database `akademik1` telah berhasil dieksekusi berdasarkan dump file SQL asli milik mahasiswa.

```sql
-- Membuat Database
CREATE DATABASE IF NOT EXISTS akademik1;
USE akademik1;

-- Table structure for table `dosen`
CREATE TABLE `dosen` (
  `nidn` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`nidn`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `mahasiswa`
CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `prodi` varchar(80) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `ipk` decimal(3,2) DEFAULT 0.00,
  PRIMARY KEY (`nim`),
  UNIQUE KEY `email` (`email`),
  CONSTRAINT `chk_ipk` CHECK (`ipk` BETWEEN 0.00 AND 4.00)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `mata_kuliah`
CREATE TABLE `mata_kuliah` (
  `kode_mk` varchar(12) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `sks` tinyint(3) UNSIGNED NOT NULL,
  `nidn` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kode_mk`),
  KEY `fk_mk_dosen` (`nidn`),
  CONSTRAINT `fk_mk_dosen` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `krs`
CREATE TABLE `krs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) NOT NULL,
  `kode_mk` varchar(12) NOT NULL,
  `semester` tinyint(3) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `nilai_huruf` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_krs` (`nim`,`kode_mk`,`semester`,`tahun_ajaran`),
  KEY `fk_krs_mk` (`kode_mk`),
  CONSTRAINT `fk_krs_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_krs_mk` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data awal untuk `mahasiswa`
INSERT INTO `mahasiswa` (`nim`, `nama`, `email`, `prodi`, `angkatan`, `ipk`) VALUES
('24210028', 'Dina Camelia Putri', 'dina@kampus.ac.id', 'Teknik Informatika', '2024', 3.99),
('24210075', 'Nailah AlyaCalista Salsabill', 'nailah@kampus.ac.id', 'Teknik Informatika', '2024', 4.00);
```

---

## 2. Modifikasi Bermakna (Minimal 2 Modifikasi)

### Modifikasi 1: Penambahan Field `no_hp` dan Constraint Validasi Panjang Minimal Nomor HP
Menambahkan field `no_hp` pada tabel `mahasiswa` disertai constraint `CHECK` untuk memastikan nomor HP yang diinput memiliki panjang minimal 10 digit.
```sql
ALTER TABLE `mahasiswa` 
ADD COLUMN `no_hp` VARCHAR(15) AFTER `email`,
ADD CONSTRAINT `chk_no_hp` CHECK (LENGTH(`no_hp`) >= 10);
```

### Modifikasi 2: Penambahan Field `status_aktif` (ENUM) dan Modifikasi Constraint `sks` pada `mata_kuliah`
Menambahkan status mahasiswa (`Aktif`, `Cuti`, `Lulus`, `DO`) serta menambahkan constraint `CHECK` pada tabel `mata_kuliah` agar jumlah SKS berada dalam rentang valid (1 - 6 SKS).
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

1. **`PRIMARY KEY` pada Tabel `mahasiswa`**:
   * *Kode:* `PRIMARY KEY ('nim')`
   * *Penjelasan:* Menentukan kolom `nim` sebagai pengenal unik utama untuk setiap mahasiswa. Mencegah adanya NIM ganda dan memastikan tidak ada nilai `NULL` di kolom ini.

2. **`UNIQUE KEY` pada Email**:
   * *Kode:* `UNIQUE KEY 'email' ('email')`
   * *Penjelasan:* Menjamin bahwa alamat email bersifat unik di seluruh tabel `mahasiswa` maupun `dosen`, sehingga satu email tidak dapat dipakai oleh dua entitas berbeda.

3. **`FOREIGN KEY ... ON DELETE CASCADE ON UPDATE CASCADE`**:
   * *Kode:* `CONSTRAINT 'fk_krs_mahasiswa' FOREIGN KEY ('nim') REFERENCES 'mahasiswa' ('nim') ON DELETE CASCADE ON UPDATE CASCADE`
   * *Penjelasan:* Menghubungkan tabel `krs` ke tabel `mahasiswa`. Jika NIM mahasiswa diubah atau dihapus di tabel induk, maka data KRS mahasiswa terkait akan otomatis diperbarui atau dihapus secara kasat mata (integritas referensial).

4. **`UNIQUE KEY uq_krs` (Composite Unique)**:
   * *Kode:* `UNIQUE KEY 'uq_krs' ('nim', 'kode_mk', 'semester', 'tahun_ajaran')`
   * *Penjelasan:* Mencegah seorang mahasiswa mengambil kode mata kuliah yang sama lebih dari satu kali dalam semester dan tahun ajaran yang sama pada tabel KRS.

5. **`AUTO_INCREMENT PRIMARY KEY` pada Tabel `krs`**:
   * *Kode:* `'id' bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT`
   * *Penjelasan:* Membuat primary key bertipe integer yang nilainya bertambah secara otomatis setiap kali ada record transaksi KRS baru dimasukkan.

---

## 4. Screenshot Sebelum dan Sesudah Modifikasi (Pertemuan 3)

### Sebelum Modifikasi:
* **Query DDL Pembuatan Database `akademik1`:**
  ![Screenshot Query Sebelum Modifikasi P3](screenshots/p3_query_before.png)
* **Output Struktur Tabel phpMyAdmin (Tabel `mahasiswa` Asli):**
  ![Screenshot Output Sebelum Modifikasi P3](screenshots/p3_output_before.png)

### Sesudah Modifikasi:
* **Query Alter Table & Constraints Baru:**
  ![Screenshot Query Sesudah Modifikasi P3](screenshots/p3_query_after.png)
* **Output Struktur Tabel Baru (dengan field `no_hp` & `status_aktif`):**
  ![Screenshot Output Sesudah Modifikasi P3](screenshots/p3_output_after.png)

---

## 5. Error yang Pernah Muncul, Penyebab, dan Langkah Perbaikannya (Pertemuan 3)

* **Pesan Error:**
  `ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails ('akademik1'.'krs', CONSTRAINT 'fk_krs_mahasiswa' FOREIGN KEY ('nim') REFERENCES 'mahasiswa' ('nim') ON DELETE CASCADE ON UPDATE CASCADE)`
* **Penyebab:**
  Terjadi saat memasukkan data ke dalam tabel `krs` dengan NIM `'24210099'`, namun NIM tersebut belum di-insert/terdaftar di dalam tabel `mahasiswa`.
* **Langkah Perbaikan:**
  Melakukan eksekusi `INSERT` data mahasiswa baru (`24210099`) terlebih dahulu ke tabel `mahasiswa` sebelum memasukkan record KRS-nya di tabel `krs`.

---
---

# PERTEMUAN 4: SQL QUERY DASAR (DML, WHERE, ORDER BY, GROUP BY, LIMIT)

## 1. Eksekusi Kode Contoh (Output Tanpa Error Kritis)
Menjalankan perintah DML lengkap memanfaatkan data asli milik Nailah AlyaCalista Salsabill (`4524210075`) dan Dina Camelia Putri (`24210028`).

```sql
USE akademik1;

-- 1. INSERT Data Dosen & Mata Kuliah
INSERT INTO `dosen` (`nidn`, `nama`, `email`) VALUES
('00112233', 'Ari Wibowo, S.Kom., M.Kom.', 'ari.wibowo@univpancasila.ac.id'),
('00112234', 'Dr. Eng. Supriyanto', 'supri@univpancasila.ac.id');

INSERT INTO `mata_kuliah` (`kode_mk`, `nama_mk`, `sks`, `nidn`) VALUES
('IF123', 'Pemrograman Berbasis Web', 3, '00112233'),
('IF124', 'Basis Data', 3, '00112233'),
('IF125', 'Algoritma Pemrograman', 4, '00112234');

-- 2. INSERT Data KRS
INSERT INTO `krs` (`nim`, `kode_mk`, `semester`, `tahun_ajaran`, `nilai_huruf`) VALUES
('24210075', 'IF123', 3, '2026/2027', 'A'),
('24210075', 'IF124', 3, '2026/2027', 'A'),
('24210028', 'IF123', 3, '2026/2027', 'A');

-- 3. SELECT dengan Filter WHERE & ORDER BY
SELECT nim, nama, email, prodi, ipk 
FROM mahasiswa 
WHERE ipk >= 3.90 
ORDER BY ipk DESC, nama ASC;

-- 4. UPDATE Data
UPDATE mahasiswa 
SET email = 'nailah.salsabill@kampus.ac.id' 
WHERE nim = '24210075';

-- 5. GROUP BY & Aggregation (Menghitung Total Mahasiswa & Rata-Rata IPK per Prodi)
SELECT prodi, COUNT(*) AS total_mahasiswa, ROUND(AVG(ipk), 2) AS rata_ipk 
FROM mahasiswa 
GROUP BY prodi;

-- 6. DELETE Data
DELETE FROM krs WHERE id = 1;
```

---

## 2. Modifikasi Bermakna (Minimal 2 Modifikasi)

### Modifikasi 1: Query Join Lanjutan (INNER JOIN) untuk Menampilkan KRS Lengkap Mahasiswa
Menghubungkan 3 tabel sekaligus (`mahasiswa`, `krs`, `mata_kuliah`) untuk menampilkan data KSR lengkap milik mahasiswa.
```sql
SELECT 
    m.nim, 
    m.nama AS nama_mahasiswa, 
    mk.kode_mk, 
    mk.nama_mk, 
    mk.sks, 
    k.semester, 
    k.tahun_ajaran, 
    k.nilai_huruf
FROM krs k
INNER JOIN mahasiswa m ON k.nim = m.nim
INNER JOIN mata_kuliah mk ON k.kode_mk = mk.kode_mk
WHERE m.nim = '24210075'
ORDER BY mk.nama_mk ASC;
```

### Modifikasi 2: Query Filter Agregasi Menggunakan `GROUP BY` + `HAVING` & Subquery
Menampilkan statistik pengajaran Dosen beserta jumlah SKS yang diampu dengan saringan `HAVING`.
```sql
SELECT 
    d.nidn, 
    d.nama AS nama_dosen, 
    COUNT(mk.kode_mk) AS total_mk, 
    SUM(mk.sks) AS total_sks_diampu
FROM dosen d
LEFT JOIN mata_kuliah mk ON d.nidn = mk.nidn
GROUP BY d.nidn, d.nama
HAVING total_sks_diampu >= 3
ORDER BY total_sks_diampu DESC;
```

---

## 3. Penjelasan 5 Bagian Kode Paling Penting (Pertemuan 4)

1. **`SELECT ... WHERE`**:
   * *Kode:* `SELECT nim, nama FROM mahasiswa WHERE ipk >= 3.90;`
   * *Penjelasan:* Filter baris data spesifik. Hanya menampilkan mahasiswa yang IPK-nya bernilai 3.90 ke atas (`Nailah` dan `Dina`).

2. **`UPDATE ... SET ... WHERE`**:
   * *Kode:* `UPDATE mahasiswa SET email = 'nailah.salsabill@kampus.ac.id' WHERE nim = '24210075';`
   * *Penjelasan:* Mengubah isi data alamat email spesifik untuk mahasiswa ber-NPM `24210075`. Klausa `WHERE` mencegah terjadinya perubahan email secara tidak sengaja pada seluruh baris tabel.

3. **`INNER JOIN ... ON ...`**:
   * *Kode:* `INNER JOIN mahasiswa m ON k.nim = m.nim`
   * *Penjelasan:* Menggabungkan baris data dari dua tabel terpisah (`krs` dan `mahasiswa`) berdasarkan kecocokan relasi nilai kolom `nim`.

4. **`GROUP BY` dan Fungsi Agregasi (`COUNT`, `SUM`, `AVG`)**:
   * *Kode:* `GROUP BY d.nidn, d.nama`
   * *Penjelasan:* Mengelompokkan baris data berdasarkan dosen pengampu, lalu secara otomatis menghitung akumulasi total SKS (`SUM`) dan jumlah mata kuliah (`COUNT`).

5. **`HAVING` Clause**:
   * *Kode:* `HAVING total_sks_diampu >= 3`
   * *Penjelasan:* Menyaring hasil ringkasan fungsi agregasi. Berbeda dengan `WHERE`, `HAVING` digunakan khusus untuk memfilter data *setelah* dikelompokkan oleh `GROUP BY`.

---

## 4. Screenshot Sebelum dan Sesudah Modifikasi (Pertemuan 4)

### Sebelum Modifikasi:
* **Query DML Dasar (INSERT, SELECT, UPDATE):**
  ![Screenshot Query Sebelum Modifikasi P4](screenshots/p4_query_before.png)
* **Output Tabel Data Mahasiswa:**
  ![Screenshot Output Sebelum Modifikasi P4](screenshots/p4_output_before.png)

### Sesudah Modifikasi:
* **Query DML Modifikasi (INNER JOIN 3 Tabel & HAVING):**
  ![Screenshot Query Sesudah Modifikasi P4](screenshots/p4_query_after.png)
* **Output Relasi KRS & Rekap SKS Dosen:**
  ![Screenshot Output Sesudah Modifikasi P4](screenshots/p4_output_after.png)

---

## 5. Error yang Pernah Muncul, Penyebab, dan Langkah Perbaikannya (Pertemuan 4)

* **Pesan Error:**
  `ERROR 1052 (23000): Column 'email' in field list is ambiguous`
* **Penyebab:**
  Terjadi saat menjalankan query `JOIN` yang melibatkan tabel `mahasiswa` dan `dosen`. Kedua tabel sama-sama memiliki kolom bernama `email`, sehingga database bingung menentukan kolom `email` milik tabel mana yang ingin ditampilkan.
* **Langkah Perbaikan:**
  Memberikan alias/prefix nama tabel secara eksplisit pada nama kolom di bagian klausa `SELECT`, misalnya: `SELECT m.email AS email_mahasiswa, d.email AS email_dosen FROM ...`.
