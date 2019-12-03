<?php

namespace Siakad\Penilaian\Domain\Model;

class Dosen
{
    private $id;
    private $nama;

    /**
     * Dosen constructor.
     * @param $id
     * @param $nama
     */
    public function __construct($id, $nama)
    {
        $this->id = $id;
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

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

}