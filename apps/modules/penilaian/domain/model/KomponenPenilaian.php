<?php

namespace Siakad\Penilaian\Domain\Model;

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