<?php
namespace Siakad\Penilaian\Domain\Model;

use Siakad\Scheduling\Domain\Model\Dosen;

class EvaluasiPembelajaran{
    private $kelas;
    private $dosen;
    private $jumlahPenilaian;
    private $namaEvaluasiArray;
    private $bobotEvaluasiArray;
    private $isFixed;

    /**
     * EvaluasiPembelajaran constructor.
     * @param $kelas
     * @param $dosen
     * @param $jumlahPenilaian
     * @param $namaevaluasiArray
     * @param $bobotEvaluasiArray
     * @param $isFixed
     */
    public function __construct(Kelas $kelas, Dosen $dosen, $jumlahPenilaian, $namaevaluasiArray, $bobotEvaluasiArray, $isFixed)
    {
        $this->kelas = $kelas;
        $this->dosen = $dosen;
        $this->jumlahPenilaian = $jumlahPenilaian;
        $this->namaEvaluasiArray = $namaevaluasiArray;
        $this->bobotEvaluasiArray = $bobotEvaluasiArray;
        $this->isFixed = $isFixed;
    }


    /**
     * @return mixed
     */
    public function getKelas()
    {
        return $this->kelas;
    }

    /**
     * @param mixed $kelas
     */
    public function setKelas(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    /**
     * @return mixed
     */
    public function getDosen()
    {
        return $this->dosen;
    }

    /**
     * @param mixed $dosen
     */
    public function setDosen(Dosen $dosen)
    {
        $this->dosen = $dosen;
    }

    /**
     * @return mixed
     */
    public function getJumlahPenilaian()
    {
        return $this->jumlahPenilaian;
    }

    /**
     * @param mixed $jumlahPenilaian
     */
    public function setJumlahPenilaian($jumlahPenilaian)
    {
        $this->jumlahPenilaian = $jumlahPenilaian;
    }

    /**
     * @return mixed
     */
    public function getNamaEvaluasiArray()
    {
        return $this->namaEvaluasiArray;
    }

    /**
     * @param mixed $namaEvaluasiArray
     */
    public function setNamaEvaluasiArray($namaevaluasiArray)
    {
        $this->namaEvaluasiArray = $namaevaluasiArray;
    }

    /**
     * @return mixed
     */
    public function getBobotEvaluasiArray()
    {
        return $this->bobotEvaluasiArray;
    }

    /**
     * @param mixed $bobotEvaluasiArray
     */
    public function setBobotEvaluasiArray($bobotEvaluasiArray)
    {
        $this->bobotEvaluasiArray = $bobotEvaluasiArray;
    }

    /**
     * @return mixed
     */
    public function getIsFixed()
    {
        return $this->isFixed;
    }

    /**
     * @param mixed $isFixed
     */
    public function setIsFixed($isFixed)
    {
        $this->isFixed = $isFixed;
    }

}