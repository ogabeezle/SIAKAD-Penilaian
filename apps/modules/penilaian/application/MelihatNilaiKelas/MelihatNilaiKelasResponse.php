<?php
namespace Siakad\Penilaian\Application;

class MelihatNilaiKelasResponse{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}