<?php
namespace Siakad\Penilaian\Application;

class MelihatKomponenPenilaianKelasRequest{
    public $kelasId;

    public function __construct($kelasId){
        $this->kelasId = $kelasId;
    }
}