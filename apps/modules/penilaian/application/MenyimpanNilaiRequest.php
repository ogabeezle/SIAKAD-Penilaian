<?php
namespace Siakad\Penilaian\Application;

class MenyimpanNilaiRequest{
    public $nilai;
    public function __construct($nilai){
        $this->nilai=$nilai;
    }
}