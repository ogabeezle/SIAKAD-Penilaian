<?php

namespace Siakad\Penilaian\Domain\Model;

use Siakad\Common\Exception\SkalaNilaiException;

class SkalaNilai
{
    private $id;
    private $nilaiHuruf;
    private $nilaiNumerik;
    private $batasBawah;
    private $batasAtas;

    public function __construct($id, $nilaiNumerik, $nilaiHuruf, $batasAtas, $batasBawah)
    {
        if ($batasBawah >= $batasAtas) {
            throw new SkalaNilaiException("Nilai batas bawah melebihi atau sama dengan nilai batas atas");
        }

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
     * @return mixed
     */
    public function getNilaiHuruf()
    {
        return $this->nilaiHuruf;
    }

    /**
     * @param $nilaiHuruf
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
     * @param $nilaiNumerik
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
     * @param $batasBawah
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
     * @param $batasAtas
     */
    public function setBatasAtas($batasAtas)
    {
        $this->batasAtas = $batasAtas;
    }

    /**
     * @param SkalaNilai $that
     * @throws SkalaNilaiException
     */
    public function compare(SkalaNilai $that)
    {
        if (($this->batasBawah <= $that->getBatasAtas() && $that->getBatasAtas() <= $this->batasAtas) ||
            ($this->batasBawah <= $that->getBatasBawah() && $that->getBatasBawah() <= $this->batasAtas)) {
            throw new SkalaNilaiException("Batas nilai overlap");
        }
    }

}