<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Dosen;
use Siakad\Penilaian\Domain\Model\Kelas;

class MelihatKomponenPenilaianKelasRequest{
    public $kelasId;

    # kurang semester
    public function __construct($kelasId){
        $this->kelasId = $kelasId;
    }
}