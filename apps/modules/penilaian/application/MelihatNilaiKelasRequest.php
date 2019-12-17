<?php

namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Kelas;
use Siakad\Penilaian\Domain\Model\MataKuliah;
use Siakad\Penilaian\Domain\Model\Semester;

class MelihatNilaiKelasRequest{
    public $kelas;

    public function __construct($kelasId)
    {
        $this->kelasId=new Kelas($kelasId,new Semester(null,null,null),new MataKuliah(null,null,null,null),null);
    }
}