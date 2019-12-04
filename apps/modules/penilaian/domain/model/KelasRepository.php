<?php
namespace Siakad\Penilaian\Domain\Model;

interface KelasRepository{
    public function all();
    public function byDosenAndSemseter(Dosen $dosen,Semester $semester);
    public function getKomponen(Kelas $kelas);
    public function getNilai(Kelas $kelas);
}