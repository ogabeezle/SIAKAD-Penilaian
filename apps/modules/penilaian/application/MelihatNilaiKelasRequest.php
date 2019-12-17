<?php

namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Kelas;

class MelihatNilaiKelasRequest{
    public $kelas;

    public function __construct($kelasId)
    {
        $this->kelas=new Kelas($kelasId,null,null,null);
    }
}