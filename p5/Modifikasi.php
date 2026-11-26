<?php
// ==========================================
// KONEKSI DATABASE & SETUP OTOMATIS
// ==========================================
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db   = 'perpustakaan';

$koneksi = mysqli_connect($host, $user, $pass);
if (!$koneksi) {
    die("Koneksi ke MySQL gagal: " . mysqli_connect_error());
}

// Buat database dan tabel secara otomatis jika belum tersedia
mysqli_query($koneksi, "CREATE DATABASE IF NOT EXISTS $db");
mysqli_select_db($koneksi, $db);

$sqlTable = "CREATE TABLE IF NOT EXISTS buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(20) NOT NULL UNIQUE,
    judul VARCHAR(150) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    penulis VARCHAR(100) NOT NULL
) ENGINE=InnoDB";
mysqli_query($koneksi, $sqlTable);

// ==========================================
// PROSES PENYIMPANAN DATA DENGAN MODIFIKASI
// ==========================================
$pesan = "";
$tipePesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn     = trim($_POST['isbn']);
    $judul    = trim($_POST['judul']);
    $kategori = trim($_POST['kategori']);
    $stok     = (int)$_POST['stok'];
    $penulis  = trim($_POST['penulis']);

    // MODIFIKASI 2: Validasi server-side (stok tidak boleh bernilai negatif)
    if ($stok < 0) {
        $pesan = "Gagal: Jumlah stok buku tidak boleh bernilai negatif!";
        $tipePesan = "bg-red-100 border-red-400 text-red-700";
    } else {
        // MODIFIKASI 2 (Lanjutan): Menggunakan Prepared Statement untuk keamanan SQL Injection
        $stmt = mysqli_prepare($koneksi, "INSERT INTO buku (isbn, judul, kategori, stok, penulis) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssis", $isbn, $judul, $kategori, $stok, $penulis);

        if (mysqli_stmt_execute($stmt)) {
            $pesan = "Berhasil: Data buku '$judul' berhasil disimpan ke database!";
            $tipePesan = "bg-green-100 border-green-400 text-green-700";
        } else {
            $pesan = "Gagal menyimpan data (Kemungkinan ISBN sudah terdaftar): " . mysqli_error($koneksi);
            $tipePesan = "bg-red-100 border-red-400 text-red-700";
        }
        mysqli_stmt_close($stmt);
    }
}

// Ambil data dari tabel untuk ditampilkan ke tabel HTML
$queryBuku = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Buku Perpustakaan - Tugas PBW</title>
    <!-- MODIFIKASI 1: Styling tampilan menggunakan Tailwind CSS Framework agar modern dan responsif -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-10 font-sans">
    <div class="max-w-6xl mx-auto px-4">
        
        <!-- Header Halaman -->
        <header class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">📚 Manajemen Koleksi Buku Perpustakaan</h1>
            <p class="text-gray-600 mt-1">Tugas Praktikum Pemrograman Berbasis Web - Studi Kasus Baru & Modifikasi</p>
        </header>

        <!-- Kotak Notifikasi Pesan -->
        <?php if (!empty($pesan)): ?>
            <div class="p-4 mb-6 border-l-4 rounded-r shadow-sm <?php echo $tipePesan; ?>">
                <p class="font-medium"><?php echo $pesan; ?></p>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- FORM INPUT DATA BUKU -->
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 md:col-span-1">
                <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Tambah Buku Baru</h2>
                <form action="" method="POST" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor ISBN</label>
                        <input type="text" name="isbn" required placeholder="Contoh: 978-602-xxx" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul Buku</label>
                        <input type="text" name="judul" required placeholder="Judul Buku..." class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select name="kategori" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Teknologi">Teknologi & Komputer</option>
                            <option value="Sains">Sains & Matematika</option>
                            <option value="Sastra">Sastra & Novel</option>
                            <option value="Ekonomi">Ekonomi & Bisnis</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Penulis</label>
                        <input type="text" name="penulis" required placeholder="Penulis..." class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Stok</label>
                        <input type="number" name="stok" min="0" required placeholder="0" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-lg transition duration-200 shadow">
                        Simpan Data Buku
                    </button>
                </form>
            </div>

            <!-- TABEL DAFTAR BUKU -->
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 md:col-span-2">
                <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Daftar Buku Tersedia di Database</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 text-sm">
                                <th class="p-3 border-b">ISBN</th>
                                <th class="p-3 border-b">Judul Buku</th>
                                <th class="p-3 border-b">Kategori</th>
                                <th class="p-3 border-b">Penulis</th>
                                <th class="p-3 border-b text-center">Stok</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y text-sm text-gray-700">
                            <?php if (mysqli_num_rows($queryBuku) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($queryBuku)): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="p-3 font-mono text-xs"><?php echo htmlspecialchars($row['isbn']); ?></td>
                                        <td class="p-3 font-medium"><?php echo htmlspecialchars($row['judul']); ?></td>
                                        <td class="p-3">
                                            <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-xs font-semibold">
                                                <?php echo htmlspecialchars($row['kategori']); ?>
                                            </span>
                                        </td>
                                        <td class="p-3"><?php echo htmlspecialchars($row['penulis']); ?></td>
                                        <td class="p-3 text-center font-bold <?php echo $row['stok'] > 0 ? 'text-green-600' : 'text-red-500'; ?>">
                                            <?php echo $row['stok']; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="p-4 text-center text-gray-400">Belum ada data buku yang tersimpan di database.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
</html>