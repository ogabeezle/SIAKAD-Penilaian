<?php

namespace Siakad\Penilaian\Domain\Model;

use Siakad\Penilaian\Domain\Model\Kelas;
use Siakad\Penilaian\Domain\Model\Mahasiswa;

class NilaiEvaluasiPembelajaran{
    private $mahasiswa;
    private $kelas;
    private $nilaiArray;
    private $nilaiAngka;
    private $nilaiHuruf;

    public function __construct(Mahasiswa $mahasiswa, Kelas $kelas, $nilaiArray, $nilaiAngka, $nilaiHuruf)
    {
        $this->mahasiswa=$mahasiswa;
        $this->kelas=$kelas;
        $this->nilaiAngka=$nilaiAngka;
        $this->nilaiArray=$nilaiArray;
        $this->nilaiHuruf=$nilaiHuruf;
    }

    /**
     * @return Mahasiswa
     */
    public function getMahasiswa()
    {
        return $this->mahasiswa;
    }

    /**
     * @param Mahasiswa $mahasiswa
     */
    public function setMahasiswa(Mahasiswa $mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }

    /**
     * @return Kelas
     */
    public function getKelas()
    {
        return $this->kelas;
    }

    /**
     * @param Kelas $kelas
     */
    public function setKelas(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    /**
     * @return mixed
     */
    public function getNilaiArray()
    {
        return $this->nilaiArray;
    }

    /**
     * @param mixed $nilaiArray
     */
    public function setNilaiArray($nilaiArray)
    {
        $this->nilaiArray = $nilaiArray;
    }

    /**
     * @return mixed
     */
    public function getNilaiAngka()
    {
        return $this->nilaiAngka;
    }

    /**
     * @param mixed $nilaiAngka
     */
    public function setNilaiAngka($nilaiAngka)
    {
        $this->nilaiAngka = $nilaiAngka;
    }

    /**
     * @return mixed
     */
    public function getNilaiHuruf()
    {
        return $this->nilaiHuruf;
    }

    /**
     * @param mixed $nilaiHuruf
     */
    public function setNilaiHuruf($nilaiHuruf)
    {
        $this->nilaiHuruf = $nilaiHuruf;
    }

}