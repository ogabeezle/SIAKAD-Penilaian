<?php
namespace Siakad\Penilaian\Domain\Model;

interface NilaiEvaluasiPembelajaranRepository{
    public function save($nilaiEvaluasiPembelajaran);
    public function byMahasiswa($mahasiswaId);
}