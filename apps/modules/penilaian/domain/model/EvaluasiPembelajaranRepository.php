<?php
namespace Siakad\Penilaian\Domain\Model;

interface EvaluasiPembelajaranRepository{
    public function save(EvaluasiPembelajaran $evaluasiPembelajaran);
}