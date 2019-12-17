<?php
namespace Siakad\Penilaian\Application;

use Siakad\Penilaian\Domain\Model\Kelas;
use Siakad\Penilaian\Domain\Model\Mahasiswa;
use Siakad\Penilaian\Domain\Model\MataKuliah;
use Siakad\Penilaian\Domain\Model\NilaiEvaluasiPembelajaran;
use Siakad\Penilaian\Domain\Model\Semester;

class MenyimpanNilaiEvaluasiRequest{
    public $nilaiEvaluasi;
    public function __construct($nilaiEvaluasi){
        $this->nilaiEvaluasi=new NilaiEvaluasiPembelajaran(
            new Mahasiswa($nilaiEvaluasi['mahasiswaId'],null),
            new Kelas($nilaiEvaluasi['kelasId'],new Semester(null,null,null),new MataKuliah(null,null,null,null),null),
            $nilaiEvaluasi['nilaiArray'],
            $nilaiEvaluasi['nilaiAngka'],
            $nilaiEvaluasi['nilaiHuruf']
        );
    }
}