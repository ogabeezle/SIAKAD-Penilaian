<?php
namespace Siakad\Penilaian\Domain\Model;

interface KelasRepository{
    public function all();
    public function byDosenAndSemseter(Dosen $dosen,Semester $semester);
}