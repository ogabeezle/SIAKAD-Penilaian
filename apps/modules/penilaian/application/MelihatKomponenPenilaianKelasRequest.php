<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Kelas;

class MelihatKomponenPenilaianKelasRequest{
    public $kelas;

    # kurang semester
    public function __construct(Dosen $dosen,Kelas $kelas){
        $this->kelas = $kelas;
    }
}