<?php
namespace Siakad\Penilaian\Application;

class MelihatKomponenPenilaianKelasResponse{

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}