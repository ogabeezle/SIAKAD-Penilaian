<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Mahasiswa;

class MelihatTranskripMahasiswaRequest{
    public $mahasiswa;

    public function __construct(Mahasiswa $mahasiswa)
    {
        $this->kelas=$mahasiswa;
    }
}