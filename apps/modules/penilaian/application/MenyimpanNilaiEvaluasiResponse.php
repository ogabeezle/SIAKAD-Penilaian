<?php
namespace Siakad\Penilaian\Application;

class MenyimpanNilaiEvaluasiResponse{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}