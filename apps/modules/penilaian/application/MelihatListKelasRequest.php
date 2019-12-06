<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Dosen;
use Siakad\Penilaian\Domain\Model\Semester;

class MelihatListKelasRequest{
    public $dosen;
    public $semester;

    public function __construct(Dosen $dosen,Semester $semester)
    {
        $this->dosen = $dosen;
        $this->semester = $semester;
    }


}