<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\NilaiEvaluasiPembelajaran;

class MenyimpanNilaiEvaluasiRequest{
    public $nilaiEvaluasi;
    public function __construct($nilaiEvaluasi){
        $this->nilaiEvaluasi=$nilaiEvaluasi;
    }
}