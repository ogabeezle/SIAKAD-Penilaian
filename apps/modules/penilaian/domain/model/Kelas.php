<?php

namespace Siakad\Scheduling\Domain\Model;

class Kelas
{
    private $id;
    private $semester;
    private $mataKuliah;
    private $nama;

    public function __construct($id, Semester $semester, MataKuliah $mataKuliah, $nama)
    {
        $this->id = $id;
        $this->semester = $semester;
        $this->mataKuliah = $mataKuliah;
        $this->nama = $nama;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSemester()
    {
        return $this->semester;
    }

    public function setSemester($semester)
    {
        $this->semester = $semester;
    }

    public function getMataKuliah()
    {
        return $this->mataKuliah;
    }

    public function setMataKuliah($mataKuliah)
    {
        $this->mataKuliah = $mataKuliah;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }
}