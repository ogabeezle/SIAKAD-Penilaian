<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Dosen;
use Siakad\Penilaian\Domain\Model\EvaluasiPembelajaran;
use Siakad\Penilaian\Domain\Model\Kelas;
use Siakad\Penilaian\Domain\Model\KomponenPenilaian;
use Siakad\Penilaian\Domain\Model\MataKuliah;
use Siakad\Penilaian\Domain\Model\Semester;

class MenyimpanKomponenPenilaianRequest{
    public $komponenEvaluasi;
    public function __construct($komponenEvaluasi){
        $komponenEvaluasiArray=array();
        for($i=0;$i<sizeof($komponenEvaluasi['namaEvaluasiArray']);$i++){
            array_push($komponenEvaluasiArray,new KomponenPenilaian(
                $komponenEvaluasi['namaEvaluasiArray'][$i],
                $komponenEvaluasi['bobotEvaluasiArray'][$i]
            ));
        }
        $this->komponenEvaluasi=new EvaluasiPembelajaran(
            new Kelas($komponenEvaluasi['kelasId'],new Semester(null,null,null),new MataKuliah(null,null,null,null),null),
            new Dosen($komponenEvaluasi['dosenId'],null),
            0,
            $komponenEvaluasiArray,
            $komponenEvaluasi['isFixed']
        );
    }

}