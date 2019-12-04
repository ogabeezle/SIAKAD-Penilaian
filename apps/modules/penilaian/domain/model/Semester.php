<?php

namespace Siakad\Penilaian\Domain\Model;

class Semester
{
    private $id;
    private $tahunAjaran;
    private $semester;

    public function __construct($id, $tahunAjaran, $semester)
    {
        $this->id = $id;
        $this->tahunAjaran = $tahunAjaran;
        $this->semester = $semester;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTahunAjaran()
    {
        return $this->tahunAjaran;
    }

    public function setTahunAjaran($tahunAjaran)
    {
        $this->tahunAjaran = $tahunAjaran;
    }

    public function getSemester()
    {
        return $this->semester;
    }

    public function setSemester($semester)
    {
        $this->semester = $semester;
    }

}