<?php

namespace Siakad\Penilaian\Application;

class MelihatTranskripMahasiswaResponse{
    public $data;
    public function __construct($data)
    {
        $data = $this->serialize($data);
        $this->data=$data;
    }

    public function serialize($data)
    {
        $ret = [];
        $buffer = [];
        if(isset($data)){
            
        }
        foreach($data as $d){
            $buffer['mahasiswa']['nrp'] = $d->getMahasiswa()->getNrp();
            $buffer['mahasiswa']['nama'] = $d->getMahasiswa()->getNama();
            $buffer['kelas']['mataKuliah']['kodeMatkul'] = $d->getKelas()->getMataKuliah()->getKodeMatkul();
            $buffer['kelas']['mataKuliah']['nama'] = $d->getKelas()->getMataKuliah()->getNama();
            $buffer['kelas']['mataKuliah']['SKS'] = $d->getKelas()->getMataKuliah()->getSks();
            $buffer['kelas']['nama'] = $d->getKelas()->getNama();
            $buffer['nilaiAngka'] = $d->getNilaiAngka();
            $buffer['nilaiHuruf'] = $d->getNilaiHuruf();

            array_push($ret, $buffer);
        }

        return json_decode(json_encode($ret));
    }

}