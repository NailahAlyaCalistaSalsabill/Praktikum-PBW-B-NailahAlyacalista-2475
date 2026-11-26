<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = trim($_POST['nim']);
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $prodi = trim($_POST['prodi']);
    $angkatan = trim($_POST['angkatan']);
    $ipk = trim($_POST['ipk']);

    // Validasi: Cegah jika ada inputan yang kosong
    if (empty($nim) || empty($nama) || empty($email) || empty($prodi) || empty($angkatan) || empty($ipk)) {
        echo "<script>
            alert('Semua kolom wajib diisi!');
            window.history.back();
        </script>";
        exit;
    }

    // Prepared Statement untuk keamanan (mencegah SQL Injection)
    $stmt = mysqli_prepare($koneksi, "INSERT INTO mahasiswa (nim, nama, email, prodi, angkatan, ipk) VALUES (?, ?, ?, ?, ?, ?)");
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssi", $nim, $nama, $email, $prodi, $angkatan, $ipk);
        $execute = mysqli_stmt_execute($stmt);

        if ($execute) {
            echo "<script>
                alert('Data Mahasiswa Berhasil Disimpan');
                window.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Gagal menyimpan data ke database!');
                window.history.back();
            </script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>
            alert('Terjadi kesalahan pada kueri database.');
            window.history.back();
        </script>";
    }
}
?>