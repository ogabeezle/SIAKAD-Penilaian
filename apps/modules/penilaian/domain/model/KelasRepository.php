<?php
namespace Siakad\Penilaian\Domain\Model;

interface KelasRepository{
    public function byDosenAndSemseter($dosenId,$semesterId);
    public function getKomponen($kelasId);
    public function getNilai($kelasId);
}