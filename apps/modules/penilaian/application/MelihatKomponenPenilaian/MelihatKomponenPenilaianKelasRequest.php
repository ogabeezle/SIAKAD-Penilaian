<?php
namespace Siakad\Penilaian\Application;

class MelihatKomponenPenilaianKelasRequest{
    private $dosen;
    private $kelas;
    public function __construct($dosen, $kelas){
        $this->dosen = $dosen;
        $this->kelas = $kelas;
    }
}