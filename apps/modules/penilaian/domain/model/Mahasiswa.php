<?php

namespace Siakad\Penilaian\Domain\Model;

class Mahasiswa
{
    private $nrp;
    private $nama;

    public function __construct($nrp, $nama)
    {
        $this->nrp = $nrp;
        $this->nama = $nama;
    }

    public function getNRP()
    {
        return $this->nrp;
    }

    public function setNRP($nrp)
    {
        $this->nrp = $nrp;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }



}