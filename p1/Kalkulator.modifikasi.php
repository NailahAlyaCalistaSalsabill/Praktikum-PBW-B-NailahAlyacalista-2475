<?php
// kalkulator.php

$hasil = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '+';

    switch ($operator) {

        case '+':
            $hasil = $a + $b;
            break;

        case '-':
            $hasil = $a - $b;
            break;

        case '*':
            $hasil = $a * $b;
            break;

        case '/':
            if ($b == 0) {
                $pesan = 'Error: Pembagian dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a / $b;
            }
            break;

        default:
            $pesan = 'Operator tidak valid.';
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Kalkulator Nailah</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 50px;
        }

        .kalkulator {
            width: 400px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        button {
            cursor: pointer;
        }

        .hasil {
            margin-top: 20px;
            padding: 15px;
            background-color: #eeeeee;
            border-radius: 8px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="kalkulator">

        <h1>Kalkulator Sederhana</h1>

        <form method="post">

            <input
                type="number"
                step="any"
                name="a"
                placeholder="Masukkan angka pertama"
                required
            >

            <select name="operator">
                <option value="+">Penjumlahan (+)</option>
                <option value="-">Pengurangan (-)</option>
                <option value="*">Perkalian (*)</option>
                <option value="/">Pembagian (/)</option>
            </select>

            <input
                type="number"
                step="any"
                name="b"
                placeholder="Masukkan angka kedua"
                required
            >

            <button type="submit">Hitung</button>

        </form>

        <?php if ($pesan): ?>

            <div class="hasil">
                <?= htmlspecialchars($pesan) ?>
            </div>

        <?php elseif ($hasil !== null): ?>

            <div class="hasil">
                <strong>Hasil Perhitungan:</strong>
                <br>
                <?= htmlspecialchars((string) $hasil) ?>
            </div>

        <?php endif; ?>

    </div>

</body>

</html>