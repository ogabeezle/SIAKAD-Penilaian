<?php

namespace Siakad\Penilaian\Domain\Model;

use Siakad\Common\Exception\SkalaNilaiException;
use Siakad\Penilaian\Domain\Model\SkalaNilai as SkalaNilai;

class SkalaNilaiRoot {
    private $skalaNilaiArray;

    public function __construct($skalaNilaiArray) {
        $this->skalaNilaiArray = $skalaNilaiArray;
    }

    public function getSkalaNilaiArray()
    {
        return $this->skalaNilaiArray;
    }

    public function validityCheck() {
        for ($i = 0; $i<sizeof($this->skalaNilaiArray); $i++) {
            $skalaNilaiA = $this->skalaNilaiArray[$i];
            for ($j = $i; $j<sizeof($this->skalaNilaiArray); $j++) {
                try {
                    $skalaNilaiA.compare($this->skalaNilaiArray[$j]);
                } catch (SkalaNilaiException $e) {
                    throw new SkalaNilaiException($e->getMessage());
                }
            }
        }
    }
}
