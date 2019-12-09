<?php

namespace Siakad\Penilaian\Application;

class MelihatNilaiResponse
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
        if (isset($data)) {

        }
        foreach ($data as $d) {
            $buffer['id'] = $d->getId();
            $buffer['nilaiNumerik'] = $d->getNilaiNumerik();
            $buffer['nilaihuruf'] = $d->getNilaiHuruf();
            $buffer['batasBawah'] = $d->getBatasBawah();
            $buffer['batasAtas'] = $d->getBatasAtas();
            array_push($ret, $buffer);
        }

        return json_decode(json_encode($ret));
    }
}