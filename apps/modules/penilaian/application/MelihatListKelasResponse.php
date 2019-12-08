<?php
namespace Siakad\Penilaian\Application;
class MelihatListKelasResponse{
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
            $buffer['id'] = $d->getId();
            $buffer['nama'] = $d->getNama();
            $buffer['semester']['id'] = $d->getSemester()->getId();
            $buffer['semester']['tahunAjaran'] = $d->getSemester()->getTahunAjaran();
            $buffer['semester']['semester'] = $d->getSemester()->getSemester();
            $buffer['mataKuliah']['id'] = $d->getMataKuliah()->getId();
            $buffer['mataKuliah']['kodeMatkul'] = $d->getMataKuliah()->getKodeMatkul();
            $buffer['mataKuliah']['nama'] = $d->getMataKuliah()->getNama();
            $buffer['mataKuliah']['SKS'] = $d->getMataKuliah()->getSks();

            array_push($ret, $buffer);

        }

        return json_decode(json_encode($ret));
    }

}