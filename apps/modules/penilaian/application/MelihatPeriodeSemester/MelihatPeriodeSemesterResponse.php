<?php

namespace Siakad\scheduling\application;

class MelihatPeriodeSemesterResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}