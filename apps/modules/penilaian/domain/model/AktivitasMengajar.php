<?php

namespace Siakad\Scheduling\Domain\Model;

class AktivitasMengajar
{
    private $dosen;
    private $kelas;

    public function __construct(Dosen $dosen, Kelas $kelas)
    {
        $this->dosen = $dosen;
        $this->kelas = $kelas;
    }

    public function getDosen()
    {
        return $this->dosen;
    }

    public function setDosen($dosen)
    {
        $this->dosen = $dosen;
    }

    public function getKelas()
    {
        return $this->kelas;
    }

    public function setKelas($kelas)
    {
        $this->kelas = $kelas;
    }
}