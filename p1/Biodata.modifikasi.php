<?php 
// biodata.php 
 
function statusKelulusan(float $ipk): string 
{ 
    if ($ipk >= 3.90) { 
        return 'Summa Cum Laude'; 
    } 
 
    if ($ipk >= 3.70) { 
        return 'Magna Cum Laude'; 
    } 
 
    if ($ipk >= 3.50) { 
        return 'Cum Laude'; 
    } 
 
    return 'Perlu Peningkatan'; 
} 
 
$mahasiswa = [ 
    'nim' => '4524210075', 
    'nama' => 'Nailah AlyaCalista Salsabill', 
    'prodi' => 'Teknik Informatika', 
    'semester' => 5, 
    'ipk' => 4.00 
]; 
?> 
 
<!doctype html> 
<html lang="id"> 
 
<head> 
    <meta charset="utf-8"> 
 
    <title>Biodata Nailah</title> 
 
    <style> 
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f2f2f2; 
            margin: 0; 
            padding: 50px; 
        } 
 
        .biodata { 
            width: 500px; 
            margin: auto; 
            background-color: white; 
            padding: 30px; 
            border-radius: 15px; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); 
        } 
 
        h1 { 
            text-align: center; 
        } 
 
        ul { 
            list-style: none; 
            padding: 0; 
        } 
 
        li { 
            padding: 12px; 
            margin-bottom: 8px; 
            background-color: #eeeeee; 
            border-radius: 8px; 
        } 
 
        .predikat { 
            margin-top: 20px; 
            padding: 15px; 
            text-align: center; 
            border-radius: 8px; 
            background-color: #e8e8e8; 
        } 
    </style> 
</head> 
 
<body> 
 
    <div class="biodata"> 
 
        <h1>Biodata Mahasiswa</h1> 
 
        <ul> 
 
            <?php foreach ($mahasiswa as $kunci => $nilai): ?> 
 
                <li> 
                    <strong> 
                        <?= ucfirst($kunci) ?> 
                    </strong>: 
 
                    <?= htmlspecialchars((string) $nilai) ?> 
                </li> 
 
            <?php endforeach; ?> 
 
        </ul> 
 
        <div class="predikat"> 
 
            <strong>Predikat IPK:</strong> 
 
            <?= statusKelulusan($mahasiswa['ipk']) ?> 
 
        </div> 
 
    </div> 
 
</body> 
 
</html>