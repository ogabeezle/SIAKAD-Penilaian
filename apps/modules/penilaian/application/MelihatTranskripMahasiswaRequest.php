<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Mahasiswa;

class MelihatTranskripMahasiswaRequest{
    public $mahasiswaId;

    public function __construct($mahasiswaId)
    {
        $this->mahasiswaId=new Mahasiswa($mahasiswaId,null);
    }
}