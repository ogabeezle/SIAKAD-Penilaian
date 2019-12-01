<?php

namespace Siakad\Prasarana\Domain\Model;

class SatuanKerja
{
    private $id;
    private $nama;
    private $kodeSatker;
    private $email;

    public function __construct($id, $nama, $kodeSatker, $email)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->kodeSatker = $kodeSatker;
        $this->email = $email;
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

    public function getKodeSatker()
    {
        return $this->kodeSatker;
    }

    public function setKodeSatker($kodeSatker)
    {
        $this->kodeSatker = $kodeSatker;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

}