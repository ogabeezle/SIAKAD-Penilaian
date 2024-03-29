<?php

namespace Siakad\Penilaian\Domain\Model;
use Siakad\Penilaian\Domain\Model\Mahasiswa;
use Siakad\Penilaian\Domain\Model\Kelas;
class Kuliah
{
    private $mahasiswa;
    private $kelas;

    public function __construct(Mahasiswa $mahasiswa, Kelas $kelas)
    {
        $this->mahasiswa = $mahasiswa;
        $this->kelas = $kelas;
    }

    public function getMahasiswa()
    {
        return $this->mahasiswa;
    }

    public function setMahasiswa(Mahasiswa $mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }

    public function getKelas()
    {
        return $this->kelas;
    }

    public function setKelas($kelas)
    {
        $this->kelas = $kelas;
    }
}