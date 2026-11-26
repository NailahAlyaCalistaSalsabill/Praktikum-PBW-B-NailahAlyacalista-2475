<?php

interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;
    private string $prodi;
    private int $semester;
    private float $ipk;

    public function __construct(
        string $nim,
        string $nama,
        string $prodi,
        int $semester,
        float $ipk
    ) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->semester = $semester;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException(
                'IPK harus berada antara 0 sampai 4.'
            );
        }

        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function getNim(): string
    {
        return $this->nim;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getProdi(): string
    {
        return $this->prodi;
    }

    public function getSemester(): int
    {
        return $this->semester;
    }

    public function predikat(): string
    {
        if ($this->ipk >= 3.50) {
            return 'Sangat Memuaskan';
        }

        if ($this->ipk >= 3.00) {
            return 'Memuaskan';
        }

        return 'Perlu Peningkatan';
    }

    public function ringkasan(): string
    {
        return $this->nim
            . ' - '
            . $this->nama
            . ' - IPK: '
            . number_format($this->ipk, 2);
    }
}

$mhs = new Mahasiswa(
    '4524210075',
    'Nailah AlyaCalista Salsabill',
    'Teknik Informatika',
    5,
    4.00
);

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">

    <title>Identitas Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 40px;
        }

        .card {
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

        .data {
            background-color: #eeeeee;
            padding: 12px;
            margin-top: 10px;
            border-radius: 8px;
        }

        .predikat {
            margin-top: 20px;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            border-radius: 8px;
            background-color: #e8e8e8;
        }
    </style>
</head>

<body>

<div class="card">

    <h1>Identitas Mahasiswa</h1>

    <div class="data">
        <strong>Nama:</strong>
        <?= htmlspecialchars($mhs->getNama()) ?>
    </div>

    <div class="data">
        <strong>NIM:</strong>
        <?= htmlspecialchars($mhs->getNim()) ?>
    </div>

    <div class="data">
        <strong>Program Studi:</strong>
        <?= htmlspecialchars($mhs->getProdi()) ?>
    </div>

    <div class="data">
        <strong>Semester:</strong>
        <?= $mhs->getSemester() ?>
    </div>

    <div class="data">
        <strong>IPK:</strong>
        <?= number_format($mhs->getIpk(), 2) ?>
    </div>

    <div class="predikat">
        Predikat:
        <?= htmlspecialchars($mhs->predikat()) ?>
    </div>

</div>

</body>

</html>