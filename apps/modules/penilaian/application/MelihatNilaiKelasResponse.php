<?php
namespace Siakad\Penilaian\Application;

class MelihatNilaiKelasResponse{
    public $data;

    public function __construct($data)
    {
        $data = $this->serialize($data);
        $this->data = $data;
    }

    public function serialize($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
        $ret = [];
        $buffer = [];
        foreach($data as $d){
            $buffer['mahasiswa']['nrp'] = $d->getMahasiswa()->getNrp();
            $buffer['mahasiswa']['nama'] = $d->getMahasiswa()->getNama();
            $buffer['nilaiArray'] = $d->getNilaiArray();
            $buffer['nilaiAngka'] = $d->getNilaiAngka();
            $buffer['nilaiHuruf'] = $d->getNilaiHuruf();

            array_push($ret, $buffer);
        }

        return json_decode(json_encode($ret));
    }

}