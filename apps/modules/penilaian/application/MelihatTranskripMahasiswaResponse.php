<?php

namespace Siakad\Penilaian\Application;

class MelihatTranskripMahasiswaResponse{
    public $data;
    public function __construct($data)
    {
        $this->data=$data;
    }
}