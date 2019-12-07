<?php
namespace Siakad\Penilaian\Application;

class MenyimpanKomponenPenilaianResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

}