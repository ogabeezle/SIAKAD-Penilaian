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
            $buffer['dosenId'] = $d->getDosen()->getId();
            $namaEvaluasiArray=array();
            $bobotEvaluasiArray=array();
            for($i=0;$i<8;$i++){
                array_push($namaEvaluasiArray,$d->getKomponenArray()[$i]->getNama());
                array_push($bobotEvaluasiArray,$d->getKomponenArray()[$i]->getBobot());

            }
            $buffer['namaEvaluasiArray'] = $namaEvaluasiArray;
            $buffer['bobotEvaluasiArray'] = $bobotEvaluasiArray;
            $buffer['isFixed'] = $d->getIsFixed();
            array_push($ret, $buffer);

        }

        return json_decode(json_encode($ret));
    }

}