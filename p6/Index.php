<?php
include "koneksi.php";

// Fitur Pencarian (Search)
$cari = isset($_GET['cari']) ? mysqli_real_escape_string($koneksi, $_GET['cari']) : '';
if ($cari != '') {
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE (nama LIKE '%$cari%' OR nim LIKE '%$cari%') AND nim != ''");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim != '' AND nim IS NOT NULL");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Data Mahasiswa</title>
</head>
<body class="bg-gray-50 p-6 font-sans text-gray-800">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Data Mahasiswa</h2>
        
        <!-- Bagian Tombol Tambah & Kolom Pencarian -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <a href="create.php"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow transition">
               + Tambah Mahasiswa
            </a>
            
            <form method="GET" action="" class="flex w-full md:w-auto gap-2">
                <input type="text" name="cari" value="<?= htmlspecialchars($cari); ?>" placeholder="Cari nama atau NIM..."
                       class="px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 w-full md:w-64">
                <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded transition">
                    Cari
                </button>
                <?php if ($cari != '') { ?>
                    <a href="index.php" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-3 py-2 rounded transition flex items-center">Reset</a>
                <?php } ?>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-200 p-3 font-semibold">NIM</th>
                        <th class="border border-gray-200 p-3 font-semibold">Nama</th>
                        <th class="border border-gray-200 p-3 font-semibold">Email</th>
                        <th class="border border-gray-200 p-3 font-semibold">Prodi</th>
                        <th class="border border-gray-200 p-3 font-semibold">Angkatan</th>
                        <th class="border border-gray-200 p-3 font-semibold">IPK & Predikat</th>
                        <th class="border border-gray-200 p-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($query) > 0) { ?>
                        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border border-gray-200 p-3"><?= htmlspecialchars($data['nim']); ?></td>
                                <td class="border border-gray-200 p-3 font-medium"><?= htmlspecialchars($data['nama']); ?></td>
                                <td class="border border-gray-200 p-3"><?= htmlspecialchars($data['email']); ?></td>
                                <td class="border border-gray-200 p-3"><?= htmlspecialchars($data['prodi']); ?></td>
                                <td class="border border-gray-200 p-3"><?= htmlspecialchars($data['angkatan']); ?></td>
                                <td class="border border-gray-200 p-3">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold"><?= $data['ipk']; ?></span>
                                        <?php if ($data['ipk'] >= 3.50) { ?>
                                            <span class="bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded font-semibold">Cum laude</span>
                                        <?php } elseif ($data['ipk'] >= 3.00) { ?>
                                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded font-semibold">Sangat Baik</span>
                                        <?php } else { ?>
                                            <span class="bg-gray-100 text-gray-800 text-xs px-2 py-0.5 rounded font-semibold">Baik</span>
                                        <?php } ?>
                                    </div>
                                </td>
                                <td class="border border-gray-200 p-3 text-center">
                                    <a href="edit.php?nim=<?= $data['nim']; ?>"
                                    class="text-blue-600 hover:text-blue-800 font-medium hover:underline">
                                    Edit
                                    </a>
                                    <span class="mx-1 text-gray-300">|</span>
                                    <a href="delete.php?nim=<?= $data['nim']; ?>"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    class="text-red-600 hover:text-red-800 font-medium hover:underline">
                                    Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="7" class="text-center p-4 text-gray-500">Tidak ada data ditemukan.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>