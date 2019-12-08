<?php
namespace Siakad\Penilaian\Application;

class MelihatKomponenPenilaianKelasResponse{

    public $data;

    public function __construct($data)
    {
        $data = $this->serialize($data);
        $this->data = $data;
    }

    public function serialize($data)
    {
        $ret = [];
        $buffer = [];
        foreach($data as $d){
            $buffer['namaEvaluasiArray'] = $d->getNamaEvaluasiArray();
            $buffer['bobotEvaluasiArray'] = $d->getBobotEvaluasiArray();
            $buffer['isFixed'] = $d->getIsFixed();
            array_push($ret, $buffer);

        }

        return json_decode(json_encode($ret));
    }

}