<?php
namespace Siakad\Penilaian\Application;

class MenyimpanSkalaNilaiRequest{
    public $nilai;
    public function __construct($nilai){
        $this->nilai=$nilai;
    }
}