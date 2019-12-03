<?php

namespace Siakad\Penilaian\Domain\Model;

class MataKuliah
{
    private $id;
    private $kodeMatkul;
    private $nama;
    private $SKS;
    private $deskripsi;

    public function __construct($id, $kodeMatkul, $nama, $SKS, $deskripsi)
    {
        $this->id = $id;
        $this->kodeMatkul = $kodeMatkul;
        $this->nama = $nama;
        $this->SKS = $SKS;
        $this->deskripsi = $deskripsi;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getKodeMatkul()
    {
        return $this->kodeMatkul;
    }

    public function setKodeMatkul($kodeMatkul)
    {
        $this->kodeMatkul = $kodeMatkul;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getSKS()
    {
        return $this->SKS;
    }

    public function setSKS($SKS)
    {
        $this->SKS = $SKS;
    }

    public function getDeskripsi()
    {
        return $this->deskripsi;
    }

    public function setDeskripsi($deskripsi)
    {
        $this->deskripsi = $deskripsi;
    }


}