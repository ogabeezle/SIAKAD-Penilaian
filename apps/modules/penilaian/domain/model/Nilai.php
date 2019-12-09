<?php

namespace Siakad\Penilaian\Domain\Model;

class Nilai{
    private $id;
    private $nilaiHuruf;
    private $nilaiNumerik;
    private $batasBawah;
    private $batasAtas;

    /**
     * Nilai constructor.
     * @param $id
     * @param $nilaiHuruf
     * @param $nilaiNumerik
     * @param $batasBawah
     * @param $batasAtas
     */
    public function __construct($id, $nilaiNumerik, $nilaiHuruf, $batasAtas, $batasBawah)
    {
        $this->id = $id;
        $this->nilaiHuruf = $nilaiHuruf;
        $this->nilaiNumerik = $nilaiNumerik;
        $this->batasBawah = $batasBawah;
        $this->batasAtas = $batasAtas;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    /**
     * @return mixed
     */
    public function getNilaiNumerik()
    {
        return $this->nilaiNumerik;
    }

    /**
     * @param mixed $nilaiNumerik
     */
    public function setNilaiNumerik($nilaiNumerik)
    {
        $this->nilaiNumerik = $nilaiNumerik;
    }

    /**
     * @return mixed
     */
    public function getBatasBawah()
    {
        return $this->batasBawah;
    }

    /**
     * @param mixed $batasBawah
     */
    public function setBatasBawah($batasBawah)
    {
        $this->batasBawah = $batasBawah;
    }

    /**
     * @return mixed
     */
    public function getBatasAtas()
    {
        return $this->batasAtas;
    }

    /**
     * @param mixed $batasAtas
     */
    public function setBatasAtas($batasAtas)
    {
        $this->batasAtas = $batasAtas;
    }

}