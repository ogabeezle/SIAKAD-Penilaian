<?php
namespace Siakad\Penilaian\Domain\Model;

interface NilaiEvaluasiPembelajaranRepository{
    public function save(NilaiEvaluasiPembelajaran $nilaiEvaluasiPembelajaran);
}