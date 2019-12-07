<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Dosen;
use Siakad\Penilaian\Domain\Model\Semester;

class MelihatListKelasRequest{
    public $dosenId;
    public $semesterId;

    public function __construct($dosenId,$semesterId)
    {
        $this->dosenId = $dosenId;
        $this->semesterId = $semesterId;
    }


}