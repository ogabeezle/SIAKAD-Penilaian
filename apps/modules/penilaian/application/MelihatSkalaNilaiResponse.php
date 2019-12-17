<?php

namespace Siakad\Penilaian\Application;

class MelihatSkalaNilaiResponse
{
    public $data;

    public function __construct($data)
    {
        $this->data = $this->serialize($data);
    }

    public function serialize($data)
    {
        $ret = [];
        $buffer = [];
        foreach ($data as $datum) {
            $buffer['id'] = $datum->getId();
            $buffer['nilaiNumerik'] = $datum->getNilaiNumerik();
            $buffer['nilaiHuruf'] = $datum->getNilaiHuruf();
            $buffer['batasBawah'] = $datum->getBatasBawah();
            $buffer['batasAtas'] = $datum->getBatasAtas();
            array_push($ret, $buffer);
        }

        return json_decode(json_encode($ret));
    }
}