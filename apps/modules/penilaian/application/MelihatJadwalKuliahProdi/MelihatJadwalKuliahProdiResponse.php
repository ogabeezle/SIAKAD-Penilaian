<?php

namespace Siakad\scheduling\application;

class MelihatJadwalKuliahProdiResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}