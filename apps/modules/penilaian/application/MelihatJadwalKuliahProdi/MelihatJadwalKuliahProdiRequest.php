<?php

namespace Siakad\scheduling\application;

class MelihatJadwalKuliahProdiRequest
{
    public $periodeKuliahTahun;
    public $periodeKuliahTipe;

    public function __construct($tipe, $tahun)
    {
        $this->periodeKuliahTahun = $tahun;
        $this->periodeKuliahTipe = $tipe;
    }
}