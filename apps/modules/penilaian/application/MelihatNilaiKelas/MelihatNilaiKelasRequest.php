<?php

namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Kelas;

class MelihatNilaiKelasRequest{
    public $kelas;

    public function __construct(Kelas $kelas)
    {
        $this->kelas=$kelas;
    }
}