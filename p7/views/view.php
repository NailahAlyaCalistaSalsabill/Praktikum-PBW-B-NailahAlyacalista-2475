<h2>Data Mahasiswa</h2>
<table border="1" cellpadding="5">
  <tr>
    <th>NIM</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Prodi</th>
    <th>Angkatan</th>
    <th>IPK</th>
  </tr>
  
<?php while ($mhs = $dataMahasiswa->fetch_assoc()): ?>
  <tr>
    <td><?= e($mhs['nim']) ?></td>
    <td><?= e($mhs['nama']) ?></td>
    <td><?= e($mhs['email']) ?></td>
    <td><?= e($mhs['prodi']) ?></td>
    <td><?= e($mhs['angkatan']) ?></td>
    <td><?= e($mhs['ipk']) ?></td>
  </tr>
  <?php endwhile; ?>
</table>
