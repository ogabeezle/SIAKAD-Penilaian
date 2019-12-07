<?php

namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Kelas;

class MelihatNilaiKelasRequest{
    public $kelasId;

    public function __construct($kelasId)
    {
        $this->kelasId=$kelasId;
    }
}