<?php
require_once __DIR__ . '/../models/MahasiswaModel.php';

class MahasiswaController {
  private $model;
  public function __construct($koneksi) {
    $this->model = new MahasiswaModel($koneksi);
  }
  public function index() {
    $dataMahasiswa = $this->model->getAllMahasiswa();
    require __DIR__ . '/../views/mahasiswa/index.php';
  }
}