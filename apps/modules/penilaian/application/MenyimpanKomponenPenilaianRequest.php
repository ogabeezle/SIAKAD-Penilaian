<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\EvaluasiPembelajaran;

class MenyimpanKomponenPenilaianRequest{
    public $komponenEvaluasi;
    public function __construct(EvaluasiPembelajaran $komponenEvaluasi){
        $this->komponenEvaluasi=$komponenEvaluasi;
    }

}