<?php

namespace Siakad\Penilaian\Application;

use Siakad\Common\Exception\NilaiKomponenMahasiswaException;
use Siakad\Common\Exception\SkalaNilaiException;
use Siakad\Penilaian\Domain\Model\NilaiRepository;

class MenyimpanNilaiService{
    private $nilaiRepository;

    public function __construct(NilaiRepository $nilaiRepository)
    {
        $this->nilaiRepository=$nilaiRepository;
    }

    public function execute(MenyimpanNilaiRequest $menyimpanNilaiRequest){
        $mini=100;
        $dataArray=array();
        for($i=0;$i<7;$i++){
            $data=[];
            $data['id']=$menyimpanNilaiRequest->nilai['id'][$i];
            $data['batasBawah']=$menyimpanNilaiRequest->nilai['batasBawah'][$i];
            $data['batasAtas']=$menyimpanNilaiRequest->nilai['batasAtas'][$i];
            if($data['batasAtas']<$data['batasBawah']) throw new SkalaNilaiException("batas atas kurang dati batas bawah");
            if($data['batasAtas']>$mini) throw new SkalaNilaiException("batas overlap");
            $mini=$data['batasBawah'];
            array_push($dataArray,$data);
        }
        foreach($dataArray as $data){
            $result = $this->nilaiRepository->save(
                $data
            );
        }
    }
}