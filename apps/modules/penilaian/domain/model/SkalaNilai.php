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
        if (0.0 > $nilaiNumerik || $nilaiNumerik > 4.0) {
            throw new SkalaNilaiException("Rentang nilai numerik antara 0.00 hingga 4.00");
        }

        if ($batasBawah >= $batasAtas) {
            throw new SkalaNilaiException("Nilai batas bawah melebihi atau sama dengan nilai batas atas");
        }

        $this->id = $id;
        $this->nilaiHuruf = $nilaiHuruf;
        $this->nilaiNumerik = $nilaiNumerik;
        $this->batasBawah = $batasBawah;
        $this->batasAtas = $batasAtas;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNilaiHuruf()
    {
        return $this->nilaiHuruf;
    }

    public function setNilaiHuruf($nilaiHuruf)
    {
        $this->nilaiHuruf = $nilaiHuruf;
    }

    public function getNilaiNumerik()
    {
        return $this->nilaiNumerik;
    }

    public function setNilaiNumerik($nilaiNumerik)
    {
        $this->nilaiNumerik = $nilaiNumerik;
    }

    public function getBatasBawah()
    {
        return $this->batasBawah;
    }

    public function setBatasBawah($batasBawah)
    {
        $this->batasBawah = $batasBawah;
    }

    public function getBatasAtas()
    {
        return $this->batasAtas;
    }

    public function setBatasAtas($batasAtas)
    {
        $this->batasAtas = $batasAtas;
    }

    public function compare(SkalaNilai $that)
    {
        if ($this->nilaiHuruf === $that->getNilaiHuruf()) {
            throw new SkalaNilaiException("Nilai huruf identik");
        }
        if ($this->nilaiNumerik === $that->getNilaiNumerik()) {
            throw new SkalaNilaiException("Nilai numerik identik");
        }
        if (($this->batasBawah <= $that->getBatasAtas() && $that->getBatasAtas() <= $this->batasAtas) ||
            ($this->batasBawah <= $that->getBatasBawah() && $that->getBatasBawah() <= $this->batasAtas)) {
            throw new SkalaNilaiException("Batas nilai overlap");
        }

        return true;
    }

}