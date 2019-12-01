<?php

namespace Siakad\scheduling\application;

class MelihatPeriodeKuliahResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}