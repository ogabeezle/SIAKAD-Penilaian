<?php

namespace Siakad\Penilaian\Domain\Model;

class SkalaNilaiRoot {
    private $skalaNilaiArray;

    public function __construct($skalaNilaiArray) {
        $this->skalaNilaiArray = $skalaNilaiArray;
    }

    /**
     * @return mixed
     */
    public function getSkalaNilaiArray()
    {
        return $this->skalaNilaiArray;
    }

    public function validate() {
        for ($i = 0; $i<sizeof($this->skalaNilaiArray); $i++) {
            $skalaNilaiA = $this->skalaNilaiArray[$i];
            for ($j = $i+1; $j<sizeof($this->skalaNilaiArray); $j++) {
                $skalaNilaiA->compare($this->skalaNilaiArray[$j]);
            }
        }
    }
}
