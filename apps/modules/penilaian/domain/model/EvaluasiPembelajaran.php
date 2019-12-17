<?php
namespace Siakad\Penilaian\Domain\Model;

use Siakad\Common\Exception\NilaiKomponenMahasiswaException;
use Siakad\Common\Exception\PersentaseKomponenNilaiException;
use Siakad\Penilaian\Domain\Model\Dosen;
use Siakad\Penilaian\Domain\Model\Kelas;
class EvaluasiPembelajaran{
    private $kelas;
    private $dosen;
    private $jumlahPenilaian;
    private $komponenArray;
    private $isFixed;

    /**
     * EvaluasiPembelajaran constructor.
     * @param $kelas
     * @param $dosen
     * @param $jumlahPenilaian
     * @param $komponenArray
     * @param $isFixed
     */
    public function __construct(Kelas $kelas, Dosen $dosen, $jumlahPenilaian, $komponenArray, $isFixed)
    {
        $this->kelas = $kelas;
        $this->dosen = $dosen;
        $this->jumlahPenilaian = $jumlahPenilaian;
        $this->komponenArray=$komponenArray;
        $this->isFixed = $isFixed;
    }

    public function validate(){
        $total=0;
        foreach($this->komponenArray as $item){
            $total+=$item->getBobot();
            if($item->getBobot()<0) throw new NilaiKomponenMahasiswaException("ada komponen bernilai negative");
        }
        if($total!=100) throw new PersentaseKomponenNilaiException("jumlah nilai tidak 100");
        $this->jumlahPenilaian=$total;
    }

    /**
     * @return mixed
     */
    public function getKelas()
    {
        return $this->kelas;
    }
    /**
     * @return mixed
     */
    public function getDosen()
    {
        return $this->dosen;
    }
    /**
     * @return mixed
     */
    public function getJumlahPenilaian()
    {
        return $this->jumlahPenilaian;
    }

    /**
     * @return mixed
     */
    public function getNamaEvaluasiArray()
    {
        return $this->namaEvaluasiArray;
    }

    /**
     * @return mixed
     */
    public function getBobotEvaluasiArray()
    {
        return $this->bobotEvaluasiArray;
    }

    /**
     * @return mixed
     */
    public function getIsFixed()
    {
        return $this->isFixed;
    }
}