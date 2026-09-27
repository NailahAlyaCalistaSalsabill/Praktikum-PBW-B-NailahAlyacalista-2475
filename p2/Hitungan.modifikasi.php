<?php

interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    protected string $nama;
    protected float $harga;
    protected int $jumlah;

    public function __construct(
        string $nama,
        float $harga,
        int $jumlah = 1
    ) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->jumlah = $jumlah;
    }

    public function hargaAkhir(): float
    {
        return $this->harga * $this->jumlah;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getJumlah(): int
    {
        return $this->jumlah;
    }
}

class ProdukDiskon extends Produk
{
    private float $diskon;

    public function __construct(
        string $nama,
        float $harga,
        int $jumlah,
        float $diskon
    ) {
        parent::__construct($nama, $harga, $jumlah);
        $this->diskon = $diskon;
    }

    public function hargaAkhir(): float
    {
        $total = $this->harga * $this->jumlah;

        return $total * (1 - $this->diskon / 100);
    }
}

$daftar = [
    new Produk('Keyboard', 250000, 2),
    new ProdukDiskon('Mouse', 150000, 3, 10)
];

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">

    <title>Perhitungan Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 40px;
        }

        .container {
            width: 600px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
        }

        .produk {
            background-color: #eeeeee;
            padding: 15px;
            margin-top: 15px;
            border-radius: 10px;
        }

        .harga {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Perhitungan Harga Produk</h1>

    <?php foreach ($daftar as $produk): ?>

        <div class="produk">

            <h3><?= htmlspecialchars($produk->getNama()) ?></h3>

            <p>
                Jumlah:
                <?= $produk->getJumlah() ?>
            </p>

            <p class="harga">
                Total Harga:
                Rp <?= number_format(
                    $produk->hargaAkhir(),
                    0,
                    ',',
                    '.'
                ) ?>
            </p>

        </div>

    <?php endforeach; ?>

</div>

</body>

</html>