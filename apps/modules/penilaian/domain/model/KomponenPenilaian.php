<?php

namespace Siakad\Penilaian\Domain\Model;

use Siakad\Common\Exception\NilaiKomponenMahasiswaException;
use Siakad\Common\Exception\PersentaseKomponenNilaiException;

class KomponenPenilaian{
    private $nama;
    private $bobot;

    /**
     * KomponenPenilaian constructor.
     * @param $nama
     * @param $bobot
     */
    public function __construct($nama, $bobot)
    {
        if($bobot<0) throw new PersentaseKomponenNilaiException("bobot penilaian bernilai negative");
        $this->nama = $nama;
        $this->bobot = $bobot;
    }

    /**
     * @return mixed
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * @return mixed
     */
    public function getBobot()
    {
        return $this->bobot;
    }
    public function setNama($nama){
        $this->nama=$nama;
    }
    public function setBobot($bobot){
        $this->bobot=$bobot;
    }

}