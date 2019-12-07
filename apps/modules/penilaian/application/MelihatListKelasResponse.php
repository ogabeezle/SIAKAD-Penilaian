<?php
namespace Siakad\Penilaian\Application;

class MelihatListKelasResponse{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}